<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\PermissionTrait;
use App\Roles55Modules55;
use Illuminate\Support\Facades\DB;
use Redirect;
use Schema;
use Illuminate\Support\Facades\Session;
use App\Modules55;
use App\Http\Requests\CreateModules55Request;
use App\Http\Requests\UpdateModules55Request;
use Illuminate\Http\Request;
use App\Permissions\Guard;
use App\Permissions55;
use App\Modules55Permissions55;


class Modules55Controller extends Controller {
	use PermissionTrait;
	/**
	 * Display a listing of modules55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
	    if(!Guard::allows('modules55_access')){
    		return abort(404);
    	}

        $modules55 = Modules55::get();


		return view('admin.modules55.index', compact('modules55'));
	}

	/**
	 * Show the form for creating a new modules55
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
        if(!Guard::allows('modules55_create')){
			return abort(404);
		}

	    $modules55 = Modules55::all();
 		$permissions55 = Permissions55::pluck("sPermissionName", "id");

        	    
        return view('admin.modules55.create', compact("permissions55"));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
	    if(!Guard::allows('modules55_view')){
    			return abort(404);
    	}

		$modules55 = Modules55::find(decrypt($id));

		$old_permissions55= array();

		foreach ($modules55->permissions55 as $key) {
					$old_permissions55[]= $key->permissions55_id;
		}

		$permissions55 = Permissions55::pluck("sPermissionName", "id");

		

		$view = "view";

		return view('admin.modules55.show', compact('modules55', "permissions55", "old_permissions55", 'view' ));

	}

	/**
	 * Store a newly created modules55 in storage.
	 *
     * @param CreateModules55Request|Request $request
	 */
	public function store(CreateModules55Request $request)
	{
        if(!Guard::allows('modules55_create')){
   			return abort(404);
   		}

		$model = Modules55::create($request->all());

		//save item
        for($i = 0; $i < sizeof($request->permissions55_id); $i++){
        	Modules55Permissions55::create([  'iBitIndex' => $i, 'modules55_id' => $model->id, 'permissions55_id' =>intval($request->permissions55_id[$i])]);
        }
		Session::flash('created', "A record has been created");
		return redirect()->route('admin'.'.modules55.index');
	}

	/**
	 * Show the form for editing the specified modules55.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
	    if(!Guard::allows('modules55_edit')){
       			return abort(404);
       	}

		$modules55 = Modules55::find(decrypt($id));

		$old_permissions55= array();

        foreach ($modules55->permissions55 as $key) {
        			$old_permissions55[]= $key->permissions55_id;
        }

	    $permissions55 = Permissions55::pluck("sPermissionName", "id");


		return view('admin.modules55.edit', compact('modules55', "permissions55", "old_permissions55"));
	}

	/**
	 * Update the specified modules55 in storage.
     * @param UpdateModules55Request|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateModules55Request $request)
	{
         if(!Guard::allows('modules55_edit')){
            return abort(404);
         }

		$modules55 = Modules55::findOrFail(decrypt($id));
		$modules55->update($request->all());


		$this->syncModulePermissions($request->permissions55_id, $modules55->id);

		Session::flash('updated', "A record has been updated");
		return redirect()->route('admin'.'.modules55.index');
	}

	/**
	 * Remove the specified modules55 from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
        if(!Guard::allows('modules55_delete')){
            return abort(404);
        }
		Modules55::destroy(decrypt($id));
		Session::flash('deleted', "A record has been deleted");
		return redirect()->route('admin'.'.modules55.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if(!Guard::allows('modules55_delete')){
            return abort(404);
        }
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));

            foreach($toDelete as $row){
            	$toDelete[$row] = decrypt($row);
            }
            Modules55::destroy($toDelete);
        } else {
            Modules55::whereNotNull('id')->delete();
        }
		Session::flash('deleted', "Records has been deleted");
        return redirect()->route('admin'.'.modules55.index');
    }

}
