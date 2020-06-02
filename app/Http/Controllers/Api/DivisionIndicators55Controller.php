<?php

namespace App\Http\Controllers\Api;

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
    //		if(!Guard::allows('divisionindicators55_access')){
    //			return abort(404);
    //		}

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



	   $aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Success',
		'aData'	=> compact('divisionindicators55', "successindicators55", "division55")
	   );

	   return response()->json($aReturn);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
//		if(!Guard::allows('divisionindicators55_view')){
//			return abort(404);
//		}

		$divisionindicators55 = DivisionIndicators55::find($id);
		$successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id");
$division55 = Division55::pluck("division_name", "id");

		
		$view = "view";


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Success',
			'aData'	=> compact('divisionindicators55', "successindicators55", "division55", 'view' )
		);

		return response()->json($aReturn);
	}


	/**
	 * Store a newly created divisionindicators55 in storage.
	 *
     * @param CreateDivisionIndicators55Request|Request $request
     *
     * @return json response
	 */
	public function store(CreateDivisionIndicators55Request $request)
	{
//		if(!Guard::allows('divisionindicators55_create')){
//			return abort(404);
//		}

	    
	    
		
		DivisionIndicators55::create($request->all());
		Session::flash('created', "A record has been created");

		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Added Successfully'
		);

		return response()->json($aReturn);
	}

	/**
	 * Update the specified divisionindicators55 in storage.
     * @param UpdateDivisionIndicators55Request|Request $request
     *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function update($id, UpdateDivisionIndicators55Request $request)
	{
	//		if(!Guard::allows('divisionindicators55_edit')){
    //			return abort(404);
    //		}
		$divisionindicators55 = DivisionIndicators55::findOrFail($id);

        
		
		
		$divisionindicators55->update($request->all());
		Session::flash('updated', "A record has been updated");


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Updated Successfully'
		);

		return $aReturn;
	}

	/**
	 * Remove the specified divisionindicators55 from storage.
	 *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function destroy($id)
	{
	//		if(!Guard::allows('divisionindicators55_delete')){
    //			return abort(404);
    //		}

		DivisionIndicators55::destroy($id);
		Session::flash('deleted', "A record has been deleted");

        $aReturn	= array(
            'iErr'	=> 0,
            'sMsg'	=> 'A record has been deleted'
        );

        return response()->json($aReturn);
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {

	//		if(!Guard::allows('divisionindicators55_delete')){
	//			return abort(404);
	//		}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));

            foreach($toDelete as $row){
            	$toDelete[$row] = $row;
            }
            DivisionIndicators55::destroy($toDelete);
        } else {
            DivisionIndicators55::whereNotNull('id')->delete();
        }
	Session::flash('deleted', "Records has been deleted");

	$aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Records has been deleted'
	);

	return response()->json($aReturn);
    }

}
