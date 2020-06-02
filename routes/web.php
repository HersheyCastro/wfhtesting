<?php

use App\Ipcr55;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


// Portal Routes..
Route::get('/',['as' => 'portal.index', 'uses' => 'Portal\PortalController@index']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/uploads/{file}', function($file){
        $path=public_path("/uploads/".$file);
        if (file_exists($path)) {
           return  response()->download($path);
        }else{
           return 'File Does not Exist!';
        }
    });
});

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'Admin\\'.config('app.landing').'Controller@index');
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles/massDelete', ['uses' => 'Admin\RolesController@massDelete', 'as' => 'roles.massDelete']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users/massDelete', ['uses' => 'Admin\UsersController@massDelete', 'as' => 'users.massDelete']);

    Route::post('permissions55/massDelete', ['as' => 'permissions55.massDelete','uses' => 'Admin\Permissions55Controller@massDelete',]);
    Route::resource('permissions55','Admin\Permissions55Controller');
    Route::post('modules55/massDelete', ['as' => 'modules55.massDelete','uses' => 'Admin\Modules55Controller@massDelete',]);
    Route::resource('modules55','Admin\Modules55Controller');
    Route::post('roles55/massDelete', ['as' => 'roles55.massDelete','uses' => 'Admin\Roles55Controller@massDelete',]);
    Route::resource('roles55','Admin\Roles55Controller');
    Route::post('users55/massDelete', ['as' => 'users55.massDelete','uses' => 'Admin\Users55Controller@massDelete',]);
    Route::resource('users55','Admin\Users55Controller');
    Route::get('dashboard55', ['as' => 'dashboard55.index','uses' => 'Admin\Dashboard55Controller@index',]);
    Route::post('strategicobjectives55/massDelete', ['as' => 'strategicobjectives55.massDelete','uses' => 'Admin\StrategicObjectives55Controller@massDelete',]);
    Route::resource('strategicobjectives55','Admin\StrategicObjectives55Controller');
    Route::post('successindicators55/massDelete', ['as' => 'successindicators55.massDelete','uses' => 'Admin\SuccessIndicators55Controller@massDelete',]);
    Route::resource('successindicators55','Admin\SuccessIndicators55Controller');
    Route::post('ipcr55/massDelete', ['as' => 'ipcr55.massDelete','uses' => 'Admin\Ipcr55Controller@massDelete',]);


    // Route::get('ipcr55/indexdivision','Admin\Ipcr55Controller@indexdivision')->name("indexdivision");
    Route::get('showdivision/{id}', ['as' => 'showdivision/','uses' => 'Admin\Ipcr55Controller@showDivision',]);
    Route::get('showaccomplishment_division/{id}', ['as' => 'showaccomplishment_division/','uses' => 'Admin\Ipcr55Controller@showaccomplishment_division',]);
    // Route::get('showaccomplishmentforsenior/{id}', ['as' => 'showaccomplishmentforsenior','uses' => 'Admin\Ipcr55Controller@showaccomplishmentforsenior',]);
    Route::patch('verifyaccomplishment/{id}', ['as' => 'verifyaccomplishment/','uses' => 'Admin\Ipcr55Controller@verifyaccomplishment',]);
    Route::get('accomplishments/{id}', ['as' => 'accomplishments/','uses' => 'Admin\Ipcr55Controller@accomplishments',]);
    Route::patch('updateStatus/{id}', ['as' => 'updateStatus/','uses' => 'Admin\Ipcr55Controller@updateStatus',]);
    Route::patch('updatetaskStatus/{id}', ['as' => 'updatetaskStatus/','uses' => 'Admin\Ipcr55Controller@updatetaskStatus',]);
    Route::get('indexaccomplishments', ['as' => 'indexaccomplishments','uses' => 'Admin\Ipcr55Controller@indexaccomplishments',]);
    Route::get('indexdivision', ['as' => 'indexdivision','uses' => 'Admin\Ipcr55Controller@indexdivision',]);
    Route::get('divisionaccomplishment', ['as' => 'divisionaccomplishment','uses' => 'Admin\Ipcr55Controller@divisionaccomplishment',]);
    Route::post('storedivisionaccomplishments', ['as' => 'storedivisionaccomplishments','uses' => 'Admin\Ipcr55Controller@storedivisionaccomplishments',]);
    Route::resource('ipcr55','Admin\Ipcr55Controller');

    Route::post('targets55/massDelete', ['as' => 'targets55.massDelete','uses' => 'Admin\Targets55Controller@massDelete',]);
    Route::post('/getfile','Admin\Targets55Controller@getFiles');
   
    Route::patch('updateverifydivisionhead/{id}', ['as' => 'updateverifydivisionhead','uses' => 'Admin\Targets55Controller@updateverifydivisionhead',]);
    Route::patch('updateverifysenioraccomplishments/{id}', ['as' => 'updateverifysenioraccomplishments','uses' => 'Admin\Targets55Controller@updateverifysenioraccomplishments',]);
    Route::patch('updateverifysenior/{id}', ['as' => 'updateverifysenior','uses' => 'Admin\Targets55Controller@updateverifysenior',]);
    Route::patch('updateaccomplishments/{id}', ['as' => 'updateaccomplishments','uses' => 'Admin\Targets55Controller@updateaccomplishments',]);
    Route::patch('updateadditionalaccomplishmentsforchief/{id}', ['as' => 'updateadditionalaccomplishmentsforchief','uses' => 'Admin\Targets55Controller@updateadditionalaccomplishmentsforchief',]);
    Route::post('additionalaccomplishments', ['as' => 'additionalaccomplishments','uses' => 'Admin\Targets55Controller@additionalaccomplishments',]);
    Route::post('additionalaccomplishmentsforchief', ['as' => 'additionalaccomplishmentsforchief','uses' => 'Admin\Targets55Controller@additionalaccomplishmentsforchief',]);
    Route::get('editdivisionhead/{id}', ['as' => 'editdivisionhead','uses' => 'Admin\Targets55Controller@editdivisionhead',]);
    Route::get('editsenioraccomplishment/{id}', ['as' => 'editsenioraccomplishment','uses' => 'Admin\Targets55Controller@editsenioraccomplishment',]);
    Route::get('editchiefaccomplishment/{id}', ['as' => 'editchiefaccomplishment','uses' => 'Admin\Targets55Controller@editchiefaccomplishment',]);
    Route::get('editsenior/{id}', ['as' => 'editsenior','uses' => 'Admin\Targets55Controller@editsenior',]);
    Route::get('editaccomplishments/{id}', ['as' => 'editaccomplishments','uses' => 'Admin\Targets55Controller@editaccomplishments',]);
    Route::get('editadditionalaccomplishmentsforchief/{id}', ['as' => 'editadditionalaccomplishmentsforchief','uses' => 'Admin\Targets55Controller@editadditionalaccomplishmentsforchief',]);
    Route::get('additionaldivisionaccomplishments/{id}', ['as' => 'additionaldivisionaccomplishments','uses' => 'Admin\Targets55Controller@additionaldivisionaccomplishments',]);
    Route::get('createaccomplishments/{id}', ['as' => 'createaccomplishments','uses' => 'Admin\Targets55Controller@createaccomplishments',]);
    Route::get('newaccomplishments', ['as' => 'newaccomplishments','uses' => 'Admin\Targets55Controller@newaccomplishments',]);
    Route::get('targets55/create/{id}','Admin\Targets55Controller@create');
    Route::resource('targets55','Admin\Targets55Controller');
    
    // Route::get('targets55/create/{div}', 'Admin\Targets55Controller@create');
    // Route::get('targets55/{division}', ['as' => 'targets55.create','uses' => 'Admin\Targets55Controller@create',]);

    Route::post('tasks55/massDelete', ['as' => 'tasks55.massDelete','uses' => 'Admin\Tasks55Controller@massDelete',]);

    
    Route::resource('tasks55','Admin\Tasks55Controller');
    Route::post('files55/massDelete', ['as' => 'files55.massDelete','uses' => 'Admin\Files55Controller@massDelete',]);

    // Route::post('files55/store/{id}','Admin\Files55Controller@store');
    Route::resource('files55','Admin\Files55Controller');

    Route::post('division55/massDelete', ['as' => 'division55.massDelete','uses' => 'Admin\Division55Controller@massDelete',]);
    Route::resource('division55','Admin\Division55Controller');
    Route::post('status55/massDelete', ['as' => 'status55.massDelete','uses' => 'Admin\Status55Controller@massDelete',]);
    Route::resource('status55','Admin\Status55Controller');
    Route::post('divisionindicators55/massDelete', ['as' => 'divisionindicators55.massDelete','uses' => 'Admin\DivisionIndicators55Controller@massDelete',]);
    Route::resource('divisionindicators55','Admin\DivisionIndicators55Controller');
    Route::post('tasksusers55/massDelete', ['as' => 'tasksusers55.massDelete','uses' => 'Admin\TasksUsers55Controller@massDelete',]);
    Route::resource('tasksusers55','Admin\TasksUsers55Controller');


    Route::get('query/{division_id}',function($division_id){

        //for Division Chief
            $division_id =  Auth::user()->division->id;

               $ipcr = Ipcr55::whereHas('users55', function($query) use($division_id){
                   $query->where('division_id', $division_id);
               })->get();
        $ipcr = Ipcr55::with('users55')->get();
        return $ipcr;
    });

});
