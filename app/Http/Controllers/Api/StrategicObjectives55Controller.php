<?php

namespace App\Http\Controllers\Api;

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
    //		if(!Guard::allows('strategicobjectives55_access')){
    //			return abort(404);
    //		}

        $strategicobjectives55 = StrategicObjectives55::query();
        $strategicobjectives55 = $strategicobjectives55->get();


        ///filter fields
        


	   $aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Success',
		'aData'	=> compact('strategicobjectives55')
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
//		if(!Guard::allows('strategicobjectives55_view')){
//			return abort(404);
//		}

		$strategicobjectives55 = StrategicObjectives55::find($id);
		
		
		$view = "view";


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Success',
			'aData'	=> compact('strategicobjectives55', 'view' )
		);

		return response()->json($aReturn);
	}


	/**
	 * Store a newly created strategicobjectives55 in storage.
	 *
     * @param CreateStrategicObjectives55Request|Request $request
     *
     * @return json response
	 */
	public function store(CreateStrategicObjectives55Request $request)
	{
//		if(!Guard::allows('strategicobjectives55_create')){
//			return abort(404);
//		}

	    
	    
		
		StrategicObjectives55::create($request->all());
		Session::flash('created', "A record has been created");

		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Added Successfully'
		);

		return response()->json($aReturn);
	}

	/**
	 * Update the specified strategicobjectives55 in storage.
     * @param UpdateStrategicObjectives55Request|Request $request
     *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function update($id, UpdateStrategicObjectives55Request $request)
	{
	//		if(!Guard::allows('strategicobjectives55_edit')){
    //			return abort(404);
    //		}
		$strategicobjectives55 = StrategicObjectives55::findOrFail($id);

        
		
		
		$strategicobjectives55->update($request->all());
		Session::flash('updated', "A record has been updated");


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Updated Successfully'
		);

		return $aReturn;
	}

	/**
	 * Remove the specified strategicobjectives55 from storage.
	 *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function destroy($id)
	{
	//		if(!Guard::allows('strategicobjectives55_delete')){
    //			return abort(404);
    //		}

		StrategicObjectives55::destroy($id);
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

	//		if(!Guard::allows('strategicobjectives55_delete')){
	//			return abort(404);
	//		}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));

            foreach($toDelete as $row){
            	$toDelete[$row] = $row;
            }
            StrategicObjectives55::destroy($toDelete);
        } else {
            StrategicObjectives55::whereNotNull('id')->delete();
        }
	Session::flash('deleted', "Records has been deleted");

	$aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Records has been deleted'
	);

	return response()->json($aReturn);
    }

}
