<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permissions\Guard;
use Redirect;
use Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\StrategicObjectives55;
use App\Http\Requests\CreateStrategicObjectives55Request;
use App\Http\Requests\UpdateStrategicObjectives55Request;
use Illuminate\Http\Request;
//use App\Permissions\Guard;




class StrategicObjectives55Controller extends Controller {


	/**
	 * Display a listing of strategicobjectives55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
    	if(!Guard::allows('strategicobjectives55_access')){
    		return abort(404);
    	}

        $strategicobjectives55 = StrategicObjectives55::query();
        $strategicobjectives55 = $strategicobjectives55->get();


        ///filter fields
        

		return view('admin.strategicobjectives55.index', compact('strategicobjectives55'));
	}

	/**
	 * Show the form for creating a new strategicobjectives55
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
		if(!Guard::allows('strategicobjectives55_create')){
			return abort(404);
		}
	    
	    
	    return view('admin.strategicobjectives55.create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(!Guard::allows('strategicobjectives55_view')){
			return abort(404);
		}

		$strategicobjectives55 = StrategicObjectives55::find(decrypt($id));
		
		
		$view = "view";
		return view('admin.strategicobjectives55.show', compact('strategicobjectives55', 'view' ));
	}


	/**
	 * Store a newly created strategicobjectives55 in storage.
	 *
     * @param CreateStrategicObjectives55Request|Request $request
     * @return mixed
	 */
	public function store(CreateStrategicObjectives55Request $request)
	{
		if(!Guard::allows('strategicobjectives55_create')){
			return abort(404);
		}

	    
	    
	    
		StrategicObjectives55::create($request->all());
		Session::flash('created', "A record has been created");
		return redirect()->route('admin'.'.strategicobjectives55.index');
	}

	/**
	 * Show the form for editing the specified strategicobjectives55.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		if(!Guard::allows('strategicobjectives55_edit')){
   			return abort(404);
   		}
		$strategicobjectives55 = StrategicObjectives55::find(decrypt($id));
	    
	    
		return view('admin.strategicobjectives55.edit', compact('strategicobjectives55'));
	}

	/**
	 * Update the specified strategicobjectives55 in storage.
     * @param UpdateStrategicObjectives55Request|Request $request
     *
	 * @param  int  $id
     * @return mixed
	 */
	public function update($id, UpdateStrategicObjectives55Request $request)
	{
		if(!Guard::allows('strategicobjectives55_edit')){
   			return abort(404);
   		}
		$strategicobjectives55 = StrategicObjectives55::findOrFail(decrypt($id));

        
		
		
		$strategicobjectives55->update($request->all());
		Session::flash('updated', "A record has been updated");
		return redirect()->route('admin'.'.strategicobjectives55.index');
	}

	/**
	 * Remove the specified strategicobjectives55 from storage.
	 *
	 * @param  int  $id
     * @return mixed
	 */
	public function destroy($id)
	{
		if(!Guard::allows('strategicobjectives55_delete')){
   			return abort(404);
   		}
		StrategicObjectives55::destroy(decrypt($id));
		Session::flash('deleted', "A record has been deleted");
		return redirect()->route('admin'.'.strategicobjectives55.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
   		if(!Guard::allows('strategicobjectives55_delete')){
      		return abort(404);
      	}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            if (!$toDelete){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.strategicobjectives55.index');
            }

            foreach($toDelete as $row){
            	$toDelete[$row] = decrypt($row);
            }
            StrategicObjectives55::destroy($toDelete);
        } else {
            $toDelete =  StrategicObjectives55::all();
            if ($toDelete->isEmpty()){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.strategicobjectives55.index');
            }
            StrategicObjectives55::whereNotNull('id')->delete();
        }

        Session::flash('deleted', "Records has been deleted");
        return redirect()->route('admin'.'.strategicobjectives55.index');
    }

}
