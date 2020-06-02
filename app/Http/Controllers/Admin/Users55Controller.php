<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permissions\Guard;
use Redirect;
use Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Users55;
use App\Http\Requests\CreateUsers55Request;
use App\Http\Requests\UpdateUsers55Request;
use Illuminate\Http\Request;
//use App\Permissions\Guard;


use App\Roles55;


class Users55Controller extends Controller {


	/**
	 * Display a listing of users55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
    	if(!Guard::allows('users55_access')){
    		return abort(404);
    	}

        $users55 = Users55::with("roles55");

		if(Input::has('froles55_id')) { //relationship
		    $roles55_data =  Input::get('froles55_id');

		    if(!$roles55_data == ''){
		        $users55 = $users55->whereHas('roles55', function ($query) use($roles55_data)  {
		            return $query->where('roles55_id', $roles55_data);
		        });
		    }

		}

        $users55 = $users55->get();


        ///filter fields
        $roles55 = Roles55::pluck("sRoleName", "id");


		return view('admin.users55.index', compact('users55', "roles55"));
	}

	/**
	 * Show the form for creating a new users55
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
		if(!Guard::allows('users55_create')){
			return abort(404);
		}
	    $roles55 = Roles55::pluck("sRoleName", "id");

	    
	    return view('admin.users55.create', compact("roles55"));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(!Guard::allows('users55_view')){
			return abort(404);
		}

		$users55 = Users55::find(decrypt($id));
		$roles55 = Roles55::pluck("sRoleName", "id");

		
		$view = "view";
		return view('admin.users55.show', compact('users55', "roles55", 'view' ));
	}


	/**
	 * Store a newly created users55 in storage.
	 *
     * @param CreateUsers55Request|Request $request
     * @return mixed
	 */
	public function store(CreateUsers55Request $request)
	{
		if(!Guard::allows('users55_create')){
			return abort(404);
		}

	    
	    
	    
		Users55::create($request->all());
		Session::flash('created', "A record has been created");
		return redirect()->route('admin'.'.users55.index');
	}

	/**
	 * Show the form for editing the specified users55.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		if(!Guard::allows('users55_edit')){
   			return abort(404);
   		}
		$users55 = Users55::find(decrypt($id));
	    $roles55 = Roles55::pluck("sRoleName", "id");

	    
		return view('admin.users55.edit', compact('users55', "roles55"));
	}

	/**
	 * Update the specified users55 in storage.
     * @param UpdateUsers55Request|Request $request
     *
	 * @param  int  $id
     * @return mixed
	 */
	public function update($id, UpdateUsers55Request $request)
	{
		if(!Guard::allows('users55_edit')){
   			return abort(404);
   		}
		$users55 = Users55::findOrFail(decrypt($id));

        
		
		
		$users55->update($request->all());
		Session::flash('updated', "A record has been updated");
		return redirect()->route('admin'.'.users55.index');
	}

	/**
	 * Remove the specified users55 from storage.
	 *
	 * @param  int  $id
     * @return mixed
	 */
	public function destroy($id)
	{
		if(!Guard::allows('users55_delete')){
   			return abort(404);
   		}
		Users55::destroy(decrypt($id));
		Session::flash('deleted', "A record has been deleted");
		return redirect()->route('admin'.'.users55.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
   		if(!Guard::allows('users55_delete')){
      		return abort(404);
      	}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            if (!$toDelete){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.users55.index');
            }

            foreach($toDelete as $row){
            	$toDelete[$row] = decrypt($row);
            }
            Users55::destroy($toDelete);
        } else {
            $toDelete =  Users55::all();
            if ($toDelete->isEmpty()){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.users55.index');
            }
            Users55::whereNotNull('id')->delete();
        }

        Session::flash('deleted', "Records has been deleted");
        return redirect()->route('admin'.'.users55.index');
    }

    public function sync(){
        $api_username = 'trace';
        $api_password = 'tr@p1k3y';

        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, "http://apps.pcieerd.dost.gov.ph/hrmis/api/employees.php" );
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt( $ch, CURLOPT_ENCODING, "utf8" );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch,CURLOPT_USERPWD, "$api_username:$api_password");
        $a = curl_exec( $ch );
        $response = curl_getinfo( $ch );
        $status=curl_getinfo($ch,CURLINFO_HTTP_CODE);
        //echo $response;
        //var_dump($a);
        //echo $status."<br/>";
        curl_close($ch);

        $arrayResult = json_decode($a, true);



        for($i = 0; $i < count($arrayResult["Result"])-1  ; $i++){

            if($arrayResult["Result"][$i]["empNumber"] != null){
                $group = Group::where('group_name', '=',  $arrayResult["Result"][$i]["group2"])->first();

                $external_link = "http://apps.pcieerd.dost.gov.ph/hrmis/images/employeeImages/".$arrayResult["Result"][$i]["empNumber"].".jpg";
                if (@getimagesize($external_link)) {
                    $image  = $external_link;
                } else {
                    $image = "http://apps.pcieerd.dost.gov.ph/hrmis/images/employeeImages/logo.png"  ;
                }

                $user = Users55::firstOrNew([
                        'u_username' => ($arrayResult["Result"][$i]["userName"]!= null ? $arrayResult["Result"][$i]["userName"] : " "),
                        'empNumber' => $arrayResult["Result"][$i]["empNumber"],
                    ]
                );

                if ($user->exists) {
            
                    $usr = Users55::where('empNumber', '=',  $arrayResult["Result"][$i]["empNumber"])->update([
                            'u_username' => ($arrayResult["Result"][$i]["userName"]!= null ? $arrayResult["Result"][$i]["userName"] : " "),
                            'empNumber' => $arrayResult["Result"][$i]["empNumber"],
                            'u_email' => $arrayResult["Result"][$i]["email"],
                            'u_password' =>bcrypt('password'),
                            'u_fname' => ($arrayResult["Result"][$i]["firstname"]!= null ? $arrayResult["Result"][$i]["firstname"] : "none"),
                            'u_mname' => ($arrayResult["Result"][$i]["middlename"]!= null ? $arrayResult["Result"][$i]["middlename"] : " ") ,
                            'u_lname' => ($arrayResult["Result"][$i]["surname"]!= null ? $arrayResult["Result"][$i]["surname"] : ""),
                            'u_mobile'=> $arrayResult["Result"][$i]["mobile"],
                            'u_head' => $this->positionToUH($arrayResult["Result"][$i]["positionDesc"]),

                            'group_id'=> $group->group_id,


                            'u_position' => $arrayResult["Result"][$i]["positionDesc"],

                            'u_picture'=> $image,
                            'u_active' => 1,
                        ]
                    );

                } else {

                
                    $usr = Users55::create([
                            'u_username' => ($arrayResult["Result"][$i]["userName"]!= null ? $arrayResult["Result"][$i]["userName"] : " "),
                            'empNumber' => $arrayResult["Result"][$i]["empNumber"],
                            'u_email' => $arrayResult["Result"][$i]["email"],
                            'u_password' =>bcrypt('password'),
                            'u_fname' => ($arrayResult["Result"][$i]["firstname"]!= null ? $arrayResult["Result"][$i]["firstname"] : "none"),
                            'u_mname' => ($arrayResult["Result"][$i]["middlename"]!= null ? $arrayResult["Result"][$i]["middlename"] : " ") ,
                            'u_lname' => ($arrayResult["Result"][$i]["surname"]!= null ? $arrayResult["Result"][$i]["surname"] : ""),
                            'u_mobile'=> $arrayResult["Result"][$i]["mobile"],

                            'ug_id' => $this->positionToUG($arrayResult["Result"][$i]["positionDesc"]), //ordinary
                            'u_head' => $this->positionToUH($arrayResult["Result"][$i]["positionDesc"]),

                            'group_id'=> $group->group_id,

                            'u_position' => $arrayResult["Result"][$i]["positionDesc"],

                            'u_picture'=> $image,
                            'u_active' => 1,
                            'u_administrator'=> 0

                        ]
                    );
                        //Assign to group
                          $gm                     = new GroupMember;
                          $gm->group_id         = $group->group_id;
                          $gm->u_id             = Users55::orderBy('u_id', 'desc')->pluck('u_id');
                          $gm->created_at         = Carbon\Carbon::now();
                          $gm->save();
                }

            }

        }

        return redirect()->back()->with('success', 'Account has been synced with HRMIS.');
	}

}
