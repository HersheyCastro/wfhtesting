<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Permissions\Guard;
use Redirect;
use Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Ipcr55;
use App\Http\Requests\CreateIpcr55Request;
use App\Http\Requests\UpdateIpcr55Request;
use Illuminate\Http\Request;
//use App\Permissions\Guard;

use App\Status55;


class Ipcr55Controller extends Controller {

	/**
	 * Display a listing of ipcr55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
    //		if(!Guard::allows('ipcr55_access')){
    //			return abort(404);
    //		}

        $ipcr55 = Ipcr55::with("status55");

		if(Input::has('fstatus55_id')) { //relationship
		    $status55_data =  Input::get('fstatus55_id');

		    if(!$status55_data == ''){
		        $ipcr55 = $ipcr55->whereHas('status55', function ($query) use($status55_data)  {
		            return $query->where('status55_id', $status55_data);
		        });
		    }

		}

        $ipcr55 = $ipcr55->get();


        ///filter fields
        $status55 = Status55::pluck("status_name", "id");



	   $aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Success',
		'aData'	=> compact('ipcr55', "status55")
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
//		if(!Guard::allows('ipcr55_view')){
//			return abort(404);
//		}

		$ipcr55 = Ipcr55::find($id);
		$status55 = Status55::pluck("status_name", "id");

		
		$view = "view";


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Success',
			'aData'	=> compact('ipcr55', "status55", 'view' )
		);

		return response()->json($aReturn);
	}


	/**
	 * Store a newly created ipcr55 in storage.
	 *
     * @param CreateIpcr55Request|Request $request
     *
     * @return json response
	 */
	public function store(CreateIpcr55Request $request)
	{
//		if(!Guard::allows('ipcr55_create')){
//			return abort(404);
//		}

	    
	    
		
		Ipcr55::create($request->all());
		Session::flash('created', "A record has been created");

		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Added Successfully'
		);

		return response()->json($aReturn);
	}

	/**
	 * Update the specified ipcr55 in storage.
     * @param UpdateIpcr55Request|Request $request
     *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function update($id, UpdateIpcr55Request $request)
	{
	//		if(!Guard::allows('ipcr55_edit')){
    //			return abort(404);
    //		}
		$ipcr55 = Ipcr55::findOrFail($id);

        
		
		
		$ipcr55->update($request->all());
		Session::flash('updated', "A record has been updated");


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Updated Successfully'
		);

		return $aReturn;
	}

	/**
	 * Remove the specified ipcr55 from storage.
	 *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function destroy($id)
	{
	//		if(!Guard::allows('ipcr55_delete')){
    //			return abort(404);
    //		}

		Ipcr55::destroy($id);
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

	//		if(!Guard::allows('ipcr55_delete')){
	//			return abort(404);
	//		}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));

            foreach($toDelete as $row){
            	$toDelete[$row] = $row;
            }
            Ipcr55::destroy($toDelete);
        } else {
            Ipcr55::whereNotNull('id')->delete();
        }
	Session::flash('deleted', "Records has been deleted");

	$aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Records has been deleted'
	);

	return response()->json($aReturn);
    }

}
