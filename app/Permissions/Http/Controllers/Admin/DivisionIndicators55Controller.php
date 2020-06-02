<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permissions\Guard;
use Redirect;
use Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\DivisionIndicators55;
use App\Http\Requests\CreateDivisionIndicators55Request;
use App\Http\Requests\UpdateDivisionIndicators55Request;
use Illuminate\Http\Request;
//use App\Permissions\Guard;


use App\SuccessIndicators55;
use App\Division55;


class DivisionIndicators55Controller extends Controller {


	/**
	 * Display a listing of divisionindicators55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
    	if(!Guard::allows('divisionindicators55_access')){
    		return abort(404);
    	}

        $divisionindicators55 = DivisionIndicators55::with("successindicators55")->with("division55");

		if(Input::has('fsuccessindicators55_id')) { //relationship
		    $successindicators55_data =  Input::get('fsuccessindicators55_id');

		    if(!$successindicators55_data == ''){
		        $divisionindicators55 = $divisionindicators55->whereHas('successindicators55', function ($query) use($successindicators55_data)  {
		            return $query->where('successindicators55_id', $successindicators55_data);
		        });
		    }

		}
		if(Input::has('fdivision55_id')) { //relationship
		    $division55_data =  Input::get('fdivision55_id');

		    if(!$division55_data == ''){
		        $divisionindicators55 = $divisionindicators55->whereHas('division55', function ($query) use($division55_data)  {
		            return $query->where('division55_id', $division55_data);
		        });
		    }

		}


        $divisionindicators55 = $divisionindicators55->get();


        ///filter fields
        $successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id");
$division55 = Division55::pluck("division_name", "id");


		return view('admin.divisionindicators55.index', compact('divisionindicators55', "successindicators55", "division55"));
	}

	/**
	 * Show the form for creating a new divisionindicators55
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
		if(!Guard::allows('divisionindicators55_create')){
			return abort(404);
		}
	    $successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id");
$division55 = Division55::pluck("division_name", "id");

	    
	    return view('admin.divisionindicators55.create', compact("successindicators55", "division55"));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(!Guard::allows('divisionindicators55_view')){
			return abort(404);
		}

		$divisionindicators55 = DivisionIndicators55::find(decrypt($id));
		$successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id");
$division55 = Division55::pluck("division_name", "id");

		
		$view = "view";
		return view('admin.divisionindicators55.show', compact('divisionindicators55', "successindicators55", "division55", 'view' ));
	}


	/**
	 * Store a newly created divisionindicators55 in storage.
	 *
     * @param CreateDivisionIndicators55Request|Request $request
     * @return mixed
	 */
	public function store(CreateDivisionIndicators55Request $request)
	{
		if(!Guard::allows('divisionindicators55_create')){
			return abort(404);
		}

	    
	    
	    
		DivisionIndicators55::create($request->all());
		Session::flash('created', "A record has been created");
		return redirect()->route('admin'.'.divisionindicators55.index');
	}

	/**
	 * Show the form for editing the specified divisionindicators55.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		if(!Guard::allows('divisionindicators55_edit')){
   			return abort(404);
   		}
		$divisionindicators55 = DivisionIndicators55::find(decrypt($id));
	    $successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id");
$division55 = Division55::pluck("division_name", "id");

	    
		return view('admin.divisionindicators55.edit', compact('divisionindicators55', "successindicators55", "division55"));
	}

	/**
	 * Update the specified divisionindicators55 in storage.
     * @param UpdateDivisionIndicators55Request|Request $request
     *
	 * @param  int  $id
     * @return mixed
	 */
	public function update($id, UpdateDivisionIndicators55Request $request)
	{
		if(!Guard::allows('divisionindicators55_edit')){
   			return abort(404);
   		}
		$divisionindicators55 = DivisionIndicators55::findOrFail(decrypt($id));

        
		
		
		$divisionindicators55->update($request->all());
		Session::flash('updated', "A record has been updated");
		return redirect()->route('admin'.'.divisionindicators55.index');
	}

	/**
	 * Remove the specified divisionindicators55 from storage.
	 *
	 * @param  int  $id
     * @return mixed
	 */
	public function destroy($id)
	{
		if(!Guard::allows('divisionindicators55_delete')){
   			return abort(404);
   		}
		DivisionIndicators55::destroy(decrypt($id));
		Session::flash('deleted', "A record has been deleted");
		return redirect()->route('admin'.'.divisionindicators55.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
   		if(!Guard::allows('divisionindicators55_delete')){
      		return abort(404);
      	}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            if (!$toDelete){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.divisionindicators55.index');
            }

            foreach($toDelete as $row){
            	$toDelete[$row] = decrypt($row);
            }
            DivisionIndicators55::destroy($toDelete);
        } else {
            $toDelete =  DivisionIndicators55::all();
            if ($toDelete->isEmpty()){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.divisionindicators55.index');
            }
            DivisionIndicators55::whereNotNull('id')->delete();
        }

        Session::flash('deleted', "Records has been deleted");
        return redirect()->route('admin'.'.divisionindicators55.index');
    }

}
