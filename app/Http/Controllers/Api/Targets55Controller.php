<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Permissions\Guard;
use Redirect;
use Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Targets55;
use App\Http\Requests\CreateTargets55Request;
use App\Http\Requests\UpdateTargets55Request;
use Illuminate\Http\Request;
//use App\Permissions\Guard;

use App\Users55;
use App\SuccessIndicators55;
use App\Ipcr55;


class Targets55Controller extends Controller {

	/**
	 * Display a listing of targets55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
    //		if(!Guard::allows('targets55_access')){
    //			return abort(404);
    //		}

        $targets55 = Targets55::with("users55")->with("successindicators55")->with("ipcr55");

		if(Input::has('fusers55_id')) { //relationship
		    $users55_data =  Input::get('fusers55_id');

		    if(!$users55_data == ''){
		        $targets55 = $targets55->whereHas('users55', function ($query) use($users55_data)  {
		            return $query->where('users55_id', $users55_data);
		        });
		    }

		}
		if(Input::has('fsuccessindicators55_id')) { //relationship
		    $successindicators55_data =  Input::get('fsuccessindicators55_id');

		    if(!$successindicators55_data == ''){
		        $targets55 = $targets55->whereHas('successindicators55', function ($query) use($successindicators55_data)  {
		            return $query->where('successindicators55_id', $successindicators55_data);
		        });
		    }

		}
		if(Input::has('fipcr55_id')) { //relationship
		    $ipcr55_data =  Input::get('fipcr55_id');

		    if(!$ipcr55_data == ''){
		        $targets55 = $targets55->whereHas('ipcr55', function ($query) use($ipcr55_data)  {
		            return $query->where('ipcr55_id', $ipcr55_data);
		        });
		    }

		}



        $targets55 = $targets55->get();


        ///filter fields
        $users55 = Users55::pluck("name", "id");
$successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id");
$ipcr55 = Ipcr55::pluck("ipcr_name", "id");



	   $aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Success',
		'aData'	=> compact('targets55', "users55", "successindicators55", "ipcr55")
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
//		if(!Guard::allows('targets55_view')){
//			return abort(404);
//		}

		$targets55 = Targets55::find($id);
		$users55 = Users55::pluck("name", "id");
$successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id");
$ipcr55 = Ipcr55::pluck("ipcr_name", "id");

		
		$view = "view";


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Success',
			'aData'	=> compact('targets55', "users55", "successindicators55", "ipcr55", 'view' )
		);

		return response()->json($aReturn);
	}


	/**
	 * Store a newly created targets55 in storage.
	 *
     * @param CreateTargets55Request|Request $request
     *
     * @return json response
	 */
	public function store(CreateTargets55Request $request)
	{
//		if(!Guard::allows('targets55_create')){
//			return abort(404);
//		}

	    
	    
        $duration_s = Carbon::parse(substr($request->duration, 0 , 19));
        $duration_e = Carbon::parse(substr($request->duration, -22));
        $request->request->add(['duration_s' => $duration_s, 'duration_e'=> $duration_e]);

		
		Targets55::create($request->all());
		Session::flash('created', "A record has been created");

		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Added Successfully'
		);

		return response()->json($aReturn);
	}

	/**
	 * Update the specified targets55 in storage.
     * @param UpdateTargets55Request|Request $request
     *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function update($id, UpdateTargets55Request $request)
	{
	//		if(!Guard::allows('targets55_edit')){
    //			return abort(404);
    //		}
		$targets55 = Targets55::findOrFail($id);

        
		
        $duration_s = Carbon::parse(substr($request->duration, 0 , 19));
        $duration_e = Carbon::parse(substr($request->duration, -22));
        $request->request->add(['duration_s' => $duration_s, 'duration_e'=> $duration_e]);

		
		$targets55->update($request->all());
		Session::flash('updated', "A record has been updated");


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Updated Successfully'
		);

		return $aReturn;
	}

	/**
	 * Remove the specified targets55 from storage.
	 *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function destroy($id)
	{
	//		if(!Guard::allows('targets55_delete')){
    //			return abort(404);
    //		}

		Targets55::destroy($id);
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

	//		if(!Guard::allows('targets55_delete')){
	//			return abort(404);
	//		}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));

            foreach($toDelete as $row){
            	$toDelete[$row] = $row;
            }
            Targets55::destroy($toDelete);
        } else {
            Targets55::whereNotNull('id')->delete();
        }
	Session::flash('deleted', "Records has been deleted");

	$aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Records has been deleted'
	);

	return response()->json($aReturn);
    }

}
