<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Permissions\Guard;
use Redirect;
use Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\SuccessIndicators55;
use App\Http\Requests\CreateSuccessIndicators55Request;
use App\Http\Requests\UpdateSuccessIndicators55Request;
use Illuminate\Http\Request;
//use App\Permissions\Guard;

use App\StrategicObjectives55;


class SuccessIndicators55Controller extends Controller {

	/**
	 * Display a listing of successindicators55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
    //		if(!Guard::allows('successindicators55_access')){
    //			return abort(404);
    //		}

        $successindicators55 = SuccessIndicators55::with("strategicobjectives55");

		if(Input::has('fstrategicobjectives55_id')) { //relationship
		    $strategicobjectives55_data =  Input::get('fstrategicobjectives55_id');

		    if(!$strategicobjectives55_data == ''){
		        $successindicators55 = $successindicators55->whereHas('strategicobjectives55', function ($query) use($strategicobjectives55_data)  {
		            return $query->where('strategicobjectives55_id', $strategicobjectives55_data);
		        });
		    }

		}

        $successindicators55 = $successindicators55->get();


        ///filter fields
        $strategicobjectives55 = StrategicObjectives55::pluck("strategic_objective_name", "id");



	   $aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Success',
		'aData'	=> compact('successindicators55', "strategicobjectives55")
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
//		if(!Guard::allows('successindicators55_view')){
//			return abort(404);
//		}

		$successindicators55 = SuccessIndicators55::find($id);
		$strategicobjectives55 = StrategicObjectives55::pluck("strategic_objective_name", "id");

		
		$view = "view";


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Success',
			'aData'	=> compact('successindicators55', "strategicobjectives55", 'view' )
		);

		return response()->json($aReturn);
	}


	/**
	 * Store a newly created successindicators55 in storage.
	 *
     * @param CreateSuccessIndicators55Request|Request $request
     *
     * @return json response
	 */
	public function store(CreateSuccessIndicators55Request $request)
	{
//		if(!Guard::allows('successindicators55_create')){
//			return abort(404);
//		}

	    
	    
		
		SuccessIndicators55::create($request->all());
		Session::flash('created', "A record has been created");

		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Added Successfully'
		);

		return response()->json($aReturn);
	}

	/**
	 * Update the specified successindicators55 in storage.
     * @param UpdateSuccessIndicators55Request|Request $request
     *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function update($id, UpdateSuccessIndicators55Request $request)
	{
	//		if(!Guard::allows('successindicators55_edit')){
    //			return abort(404);
    //		}
		$successindicators55 = SuccessIndicators55::findOrFail($id);

        
		
		
		$successindicators55->update($request->all());
		Session::flash('updated', "A record has been updated");


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Updated Successfully'
		);

		return $aReturn;
	}

	/**
	 * Remove the specified successindicators55 from storage.
	 *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function destroy($id)
	{
	//		if(!Guard::allows('successindicators55_delete')){
    //			return abort(404);
    //		}

		SuccessIndicators55::destroy($id);
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

	//		if(!Guard::allows('successindicators55_delete')){
	//			return abort(404);
	//		}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));

            foreach($toDelete as $row){
            	$toDelete[$row] = $row;
            }
            SuccessIndicators55::destroy($toDelete);
        } else {
            SuccessIndicators55::whereNotNull('id')->delete();
        }
	Session::flash('deleted', "Records has been deleted");

	$aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Records has been deleted'
	);

	return response()->json($aReturn);
    }

}
