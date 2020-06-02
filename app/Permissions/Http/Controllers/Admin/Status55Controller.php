<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permissions\Guard;
use Redirect;
use Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Status55;
use App\Http\Requests\CreateStatus55Request;
use App\Http\Requests\UpdateStatus55Request;
use Illuminate\Http\Request;
//use App\Permissions\Guard;




class Status55Controller extends Controller {


	/**
	 * Display a listing of status55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
    	if(!Guard::allows('status55_access')){
    		return abort(404);
    	}

        $status55 = Status55::query();
        $status55 = $status55->get();


        ///filter fields
        

		return view('admin.status55.index', compact('status55'));
	}

	/**
	 * Show the form for creating a new status55
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
		if(!Guard::allows('status55_create')){
			return abort(404);
		}
	    
	    
	    return view('admin.status55.create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(!Guard::allows('status55_view')){
			return abort(404);
		}

		$status55 = Status55::find(decrypt($id));
		
		
		$view = "view";
		return view('admin.status55.show', compact('status55', 'view' ));
	}


	/**
	 * Store a newly created status55 in storage.
	 *
     * @param CreateStatus55Request|Request $request
     * @return mixed
	 */
	public function store(CreateStatus55Request $request)
	{
		if(!Guard::allows('status55_create')){
			return abort(404);
		}

	    
	    
	    
		Status55::create($request->all());
		Session::flash('created', "A record has been created");
		return redirect()->route('admin'.'.status55.index');
	}

	/**
	 * Show the form for editing the specified status55.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		if(!Guard::allows('status55_edit')){
   			return abort(404);
   		}
		$status55 = Status55::find(decrypt($id));
	    
	    
		return view('admin.status55.edit', compact('status55'));
	}

	/**
	 * Update the specified status55 in storage.
     * @param UpdateStatus55Request|Request $request
     *
	 * @param  int  $id
     * @return mixed
	 */
	public function update($id, UpdateStatus55Request $request)
	{
		if(!Guard::allows('status55_edit')){
   			return abort(404);
   		}
		$status55 = Status55::findOrFail(decrypt($id));

        
		
		
		$status55->update($request->all());
		Session::flash('updated', "A record has been updated");
		return redirect()->route('admin'.'.status55.index');
	}

	/**
	 * Remove the specified status55 from storage.
	 *
	 * @param  int  $id
     * @return mixed
	 */
	public function destroy($id)
	{
		if(!Guard::allows('status55_delete')){
   			return abort(404);
   		}
		Status55::destroy(decrypt($id));
		Session::flash('deleted', "A record has been deleted");
		return redirect()->route('admin'.'.status55.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
   		if(!Guard::allows('status55_delete')){
      		return abort(404);
      	}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            if (!$toDelete){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.status55.index');
            }

            foreach($toDelete as $row){
            	$toDelete[$row] = decrypt($row);
            }
            Status55::destroy($toDelete);
        } else {
            $toDelete =  Status55::all();
            if ($toDelete->isEmpty()){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.status55.index');
            }
            Status55::whereNotNull('id')->delete();
        }

        Session::flash('deleted', "Records has been deleted");
        return redirect()->route('admin'.'.status55.index');
    }

}
