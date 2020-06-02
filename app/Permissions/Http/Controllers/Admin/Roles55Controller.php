<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\PermissionTrait;
use Redirect;
use Schema;
use Illuminate\Support\Facades\Session;
use App\Roles55;
use App\Http\Requests\CreateRoles55Request;
use App\Http\Requests\UpdateRoles55Request;
use Illuminate\Http\Request;
use App\Permissions\Guard;
use App\Modules55;
use App\Roles55Modules55;


class Roles55Controller extends Controller {
	use PermissionTrait;
	/**
	 * Display a listing of roles55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        if(!Guard::allows('roles55_access')){
            return abort(404);
        }
        $roles55 = Roles55::get();

		return view('admin.roles55.index', compact('roles55'));
	}

	/**
	 * Show the form for creating a new roles55
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
        if(!Guard::allows('roles55_create')){
            return abort(404);
        }
	    $roles55 = Roles55::all();
		$modules55 = Modules55::pluck("sModuleName", "id");

		$role_modules = [];
		$modules = Modules55::all();

        	    
        return view('admin.roles55.create', compact("modules55", 'role_modules', 'modules'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
        if(!Guard::allows('roles55_view')){
            return abort(404);
        }
		$roles55 = Roles55::find(decrypt($id));

		$old_modules55= array();

		foreach ($roles55->modules55 as $key) {
			$old_modules55[]= $key->modules55_id;
		}

		$modules55 = Modules55::pluck("sModuleName", "id");

		$role_modules = $roles55->modules55;

		$remaining = $role_modules->pluck('modules55_id');
		$modules = Modules55::wherenotIn('id', $remaining)->get();


		$allowed_modules = Modules55::with('permissions55')->whereIn('id',$old_modules55)->get(); //get
//
//		return $allowed_modules;


		$permissions = array(
			'permissions' => [],
		);


		foreach($allowed_modules as $row){
//			$len = $row->permissions55()->max('iBitIndex') + 1;
			$len = $row->permissions55()->count();
			$bin = decbin($roles55->modules55()->where('modules55_id', $row->id)->pluck('iPermission')->first());
			$bin_padded = str_pad($bin, $len , '0', STR_PAD_LEFT);
			$arr = array_reverse(str_split($bin_padded));

			foreach($arr as $bit){
				$permissions['permissions'][$row->id][] = $bit ;
			}

		}
		$view = "view";

//		return $permissions;

		return view('admin.roles55.show', compact('roles55', "modules55", "old_modules55", 'role_modules', 'modules', 'permissions', 'view'));

	}

	/**
	 * Store a newly created roles55 in storage.
	 *
     * @param CreateRoles55Request|Request $request
	 */
	public function store(CreateRoles55Request $request)
	{
        if(!Guard::allows('roles55_create')){
            return abort(404);
        }
		$model = Roles55::create($request->all());

		//save item
        for($i = 0; $i < sizeof($request->modules55_id); $i++){
        	Roles55Modules55::create([ 'roles55_id' => $model->id, 'iPermission' => bindec(implode("",array_reverse($request->permissions[$request->modules55_id[$i]]))), 'modules55_id' =>intval($request->modules55_id[$i])]);
        }
		Session::flash('created', "A record has been created");
		return redirect()->route('admin'.'.roles55.index');
	}

	/**
	 * Show the form for editing the specified roles55.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
        if(!Guard::allows('roles55_edit')){
            return abort(404);
        }
		$roles55 = Roles55::find(decrypt($id));

		$old_modules55= array();

        foreach ($roles55->modules55 as $key) {
        			$old_modules55[]= $key->modules55_id;
        }



	    $modules55 = Modules55::pluck("sModuleName", "id");

		$role_modules = $roles55->modules55;

		$remaining = $role_modules->pluck('modules55_id');
		$modules = Modules55::wherenotIn('id', $remaining)->get();


		$allowed_modules = Modules55::with('permissions55')->whereIn('id',$old_modules55)->get(); //get
//
//		return $allowed_modules;


		$permissions = array(
			'permissions' => [],
		);


		foreach($allowed_modules as $row){

//			$len = $row->permissions55()->max('iBitIndex') + 1;
			$len = $row->permissions55()->count();
			$bin = decbin($roles55->modules55()->where('modules55_id', $row->id)->pluck('iPermission')->first());
			$bin_padded = str_pad($bin, $len , '0', STR_PAD_LEFT);
			$arr = array_reverse(str_split($bin_padded));

			foreach($arr as $bit){
				$permissions['permissions'][$row->id][] = $bit ;
			}

		}


//		return $permissions;

		return view('admin.roles55.edit', compact('roles55', "modules55", "old_modules55", 'role_modules', 'modules', 'permissions'));
	}

	/**
	 * Update the specified roles55 in storage.
     * @param UpdateRoles55Request|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRoles55Request $request)
	{
        if(!Guard::allows('roles55_edit')){
            return abort(404);
        }
		$roles55 = Roles55::findOrFail(decrypt($id));

		$roles55->update($request->all());

		$aModules = array();
		$aPermissions = array();

		foreach($request->modules55_id as $value) {
			$aModules[] = $value;
			$aPermissions[] = $request->permissions[$value];
		}


		$this->syncRoleModulePermissions($aModules, $aPermissions, decrypt($id));


		Session::flash('updated', "A record has been updated");

		return redirect()->route('admin'.'.roles55.index');
	}

	/**
	 * Remove the specified roles55 from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
        if(!Guard::allows('roles55_delete')){
            return abort(404);
        }
		Roles55::destroy(decrypt($id));
		Session::flash('deleted', "A record has been deleted");
		return redirect()->route('admin'.'.roles55.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if(!Guard::allows('roles55_delete')){
            return abort(404);
        }
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));

            foreach($toDelete as $row){
            	$toDelete[$row] = decrypt($row);
            }
            Roles55::destroy($toDelete);
        } else {
            Roles55::whereNotNull('id')->delete();
        }
		Session::flash('deleted', "Records has been deleted");
        return redirect()->route('admin'.'.roles55.index');
    }

}
