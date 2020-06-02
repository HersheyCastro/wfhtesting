<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Users55;
use Socialite;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        // if ($this->hasTooManyLoginAttempts($request)) {
        //     $this->fireLockoutEvent($request);

        //     return $this->sendLockoutResponse($request);
        // }

        // if ($this->attemptLogin($request)) {
        //     return $this->sendLoginResponse($request);
        // }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        // $this->incrementLoginAttempts($request);

        // return $this->sendFailedLoginResponse($request);
      $uname = $request->email;
      $pword = $request->password;

      $api_username = 'trace';
      $api_password = 'tr@p1k3y';

      $ch = curl_init();

       curl_setopt( $ch, CURLOPT_URL, "http://apps.pcieerd.dost.gov.ph/hrmis/api/login.php");
       curl_setopt($ch,CURLOPT_POST,1);
       curl_setopt($ch,CURLOPT_HEADER,0);
       curl_setopt($ch,CURLOPT_POSTFIELDS,"username={$uname}&password={$pword}");
       curl_setopt( $ch, CURLOPT_ENCODING, "utf8" );
       curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
       curl_setopt($ch,CURLOPT_USERPWD, "$api_username:$api_password");
       $a = curl_exec( $ch );
       $response = curl_getinfo( $ch );
       $status=curl_getinfo($ch,CURLINFO_HTTP_CODE);

       curl_close($ch);


       $arrayResult = json_decode($a, true);

        // return $arrayResult;

       if($arrayResult["Result"]["record"]== "1"){ //if there are results

         // if($arrayResult["Result"]["0"]["email"]==''){
         //    return 'no email';
         //  }

           $empNumber =  $arrayResult["Result"]["0"]["empNumber"];

           if (Users55::where('employee_id', '=', $empNumber)->count() > 0) { //check if the returned matched

               $user = Users55::where('employee_id', '=', $empNumber)->first();



               
               if(Auth::loginUsingId($user->id)) {
                  
                   return redirect('/admin/home');
               }else{

                   return redirect('/admin/home');
               }


           }else{
               //add to the database then login

               $user = new Users55();

               $user->employee_id = $arrayResult["Result"]["0"]["empNumber"];
               // $user->name = $arrayResult["Result"]["0"]["firstname"].' '.$arrayResult["Result"]["0"]["surname"];
               $user->firstname = $arrayResult["Result"]["0"]["firstname"];
               $user->lastname = $arrayResult["Result"]["0"]["surname"];

               $user->username = $arrayResult["Result"]["0"]["userName"];
               $user->email = $arrayResult["Result"]["0"]["email"];
               $user->password = bcrypt($request->sPassword);
               
               if($arrayResult["Result"]["0"]["group2"]=="PCMD"){
                  $user->division_id = 1;
               }elseif($arrayResult["Result"]["0"]["group2"]=="FAD"){
                  $user->division_id = 2;
               }elseif($arrayResult["Result"]["0"]["group2"]=="ETDD"){
                  $user->division_id = 3;
               }elseif($arrayResult["Result"]["0"]["group2"]=="EUSTDD"){
                  $user->division_id = 4;
               }elseif($arrayResult["Result"]["0"]["group2"]=="ITDD"){
                  $user->division_id = 5;
               }elseif($arrayResult["Result"]["0"]["group2"]=="RITTD"){
                  $user->division_id = 6;
               }elseif($arrayResult["Result"]["0"]["group2"]=="HRIDD"){
                  $user->division_id = 7;
               }elseif($arrayResult["Result"]["0"]["group2"]=="IG"){
                  $user->division_id = 8;
               }else{
                  $user->division_id = 9;
               }

              if($arrayResult["Result"]["0"]["salaryGradeNumber"]==18 || $arrayResult["Result"]["0"]["salaryGradeNumber"]==19 || $arrayResult["Result"]["0"]["salaryGradeNumber"]==22){
                  $user->roles55_id = 7;
               }elseif($arrayResult["Result"]["0"]["salaryGradeNumber"]==24){
                  $user->roles55_id = 4;
               }else {
                  $user->roles55_id = 3;
               }

               
               $user->created_at = Carbon::now();
               $user->save();

              
              // $role_user = new Role_user();
              // $role_user->user_id = $user->id;
              // $role_user->role_id = 2;
              // $role_user->save();

               if(Auth::loginUsingId($user->id)) {

                   return redirect('/admin/home');
               }else{

                   return redirect('/admin/home');
               }
           }


       }else{

           return redirect()->back()->withErrors(['Invalid HRMIS username or password']);
       }

       return redirect('/admin/home');
    }

    
}
