<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permissions\Guard;
use Redirect;
use Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Division55;
use App\Http\Requests\CreateDivision55Request;
use App\Http\Requests\UpdateDivision55Request;
use Illuminate\Http\Request;
//use App\Permissions\Guard;




class Division55Controller extends Controller {


	/**
	 * Display a listing of division55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
    	if(!Guard::allows('division55_access')){
    		return abort(404);
    	}

        $division55 = Division55::query();
        $division55 = $division55->get();


        ///filter fields
        

		return view('admin.division55.index', compact('division55'));
	}

	/**
	 * Show the form for creating a new division55
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
		if(!Guard::allows('division55_create')){
			return abort(404);
		}
	    
	    
	    return view('admin.division55.create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(!Guard::allows('division55_view')){
			return abort(404);
		}

		$division55 = Division55::find(decrypt($id));
		
		
		$view = "view";
		return view('admin.division55.show', compact('division55', 'view' ));
	}


	/**
	 * Store a newly created division55 in storage.
	 *
     * @param CreateDivision55Request|Request $request
     * @return mixed
	 */
	public function store(CreateDivision55Request $request)
	{
		if(!Guard::allows('division55_create')){
			return abort(404);
		}

	    
	    
	    
		Division55::create($request->all());
		Session::flash('created', "A record has been created");
		return redirect()->route('admin'.'.division55.index');
	}

	/**
	 * Show the form for editing the specified division55.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		if(!Guard::allows('division55_edit')){
   			return abort(404);
   		}
		$division55 = Division55::find(decrypt($id));
	    
	    
		return view('admin.division55.edit', compact('division55'));
	}

	/**
	 * Update the specified division55 in storage.
     * @param UpdateDivision55Request|Request $request
     *
	 * @param  int  $id
     * @return mixed
	 */
	public function update($id, UpdateDivision55Request $request)
	{
		if(!Guard::allows('division55_edit')){
   			return abort(404);
   		}
		$division55 = Division55::findOrFail(decrypt($id));

        
		
		
		$division55->update($request->all());
		Session::flash('updated', "A record has been updated");
		return redirect()->route('admin'.'.division55.index');
	}

	/**
	 * Remove the specified division55 from storage.
	 *
	 * @param  int  $id
     * @return mixed
	 */
	public function destroy($id)
	{
		if(!Guard::allows('division55_delete')){
   			return abort(404);
   		}
		Division55::destroy(decrypt($id));
		Session::flash('deleted', "A record has been deleted");
		return redirect()->route('admin'.'.division55.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
   		if(!Guard::allows('division55_delete')){
      		return abort(404);
      	}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            if (!$toDelete){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.division55.index');
            }

            foreach($toDelete as $row){
            	$toDelete[$row] = decrypt($row);
            }
            Division55::destroy($toDelete);
        } else {
            $toDelete =  Division55::all();
            if ($toDelete->isEmpty()){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.division55.index');
            }
            Division55::whereNotNull('id')->delete();
        }

        Session::flash('deleted', "Records has been deleted");
        return redirect()->route('admin'.'.division55.index');
    }

}
