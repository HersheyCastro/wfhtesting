<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\PermissionTrait;
use App\Modules55;
use App\Modules55Permissions55;
use App\Roles55Modules55;
use Redirect;
use Schema;
use Illuminate\Support\Facades\Session;
use App\Permissions55;
use App\Http\Requests\CreatePermissions55Request;
use App\Http\Requests\UpdatePermissions55Request;
use Illuminate\Http\Request;
use App\Permissions\Guard;


class Permissions55Controller extends Controller {
	use PermissionTrait;

	/**
	 * Display a listing of permissions55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        if(!Guard::allows('permissions55_access')){
            return abort(404);
        }

        $permissions55 = Permissions55::all();


		return view('admin.permissions55.index', compact('permissions55'));
	}

	/**
	 * Show the form for creating a new permissions55
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
        if(!Guard::allows('permissions55_create')){
            return abort(404);
        }
	    
	    return view('admin.permissions55.create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
        if(!Guard::allows('permissions55_view')){
            return abort(404);
        }
		$permissions55 = Permissions55::find(decrypt($id));
		
		
		$view = "view";
		return view('admin.permissions55.show', compact('permissions55', 'view' ));
	}


	/**
	 * Store a newly created permissions55 in storage.
	 *
     * @param CreatePermissions55Request|Request $request
	 */
	public function store(CreatePermissions55Request $request)
	{
        if(!Guard::allows('permissions55_create')){
            return abort(404);
        }
		Permissions55::create($request->all());
		Session::flash('created', "A record has been created");
		return redirect()->route('admin'.'.permissions55.index');
	}

	/**
	 * Show the form for editing the specified permissions55.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
        if(!Guard::allows('permissions55_edit')){
            return abort(404);
        }

		$permissions55 = Permissions55::find(decrypt($id));
	    
	    
		return view('admin.permissions55.edit', compact('permissions55'));
	}

	/**
	 * Update the specified permissions55 in storage.
     * @param UpdatePermissions55Request|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePermissions55Request $request)
	{
        if(!Guard::allows('permissions55_edit')){
            return abort(404);
        }

		$permissions55 = Permissions55::findOrFail(decrypt($id));

		$permissions55->update($request->all());
		Session::flash('updated', "A record has been updated");
		return redirect()->route('admin'.'.permissions55.index');
	}

	/**
	 * Remove the specified permissions55 from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
        if(!Guard::allows('permissions55_delete')){
            return abort(404);
        }
//		$this->unlinkPermission($id);
        $permission_id = decrypt($id);

        $this->unlinkPermission($permission_id); //delete permission and recalculate permission

		Permissions55::destroy($permission_id);
		Session::flash('deleted', "A record has been deleted");
		return redirect()->route('admin'.'.permissions55.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if(!Guard::allows('permissions55_delete')){
            return abort(404);
        }
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));

            foreach($toDelete as $row){
            	$toDelete[$row] = decrypt($row);
                $this->unlinkPermission(decrypt($row)); //delete permission and recalculate permission
            }
            Permissions55::destroy($toDelete);


        } else {
            Permissions55::whereNotNull('id')->delete();
        }
		Session::flash('deleted', "Records has been deleted");
        return redirect()->route('admin'.'.permissions55.index');
    }

}
