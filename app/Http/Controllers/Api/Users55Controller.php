<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Permissions\Guard;
use Redirect;
use Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Users55;
use App\Http\Requests\CreateUsers55Request;
use App\Http\Requests\UpdateUsers55Request;
use Illuminate\Http\Request;
//use App\Permissions\Guard;

use App\Roles55;


class Users55Controller extends Controller {

	/**
	 * Display a listing of users55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
    //		if(!Guard::allows('users55_access')){
    //			return abort(404);
    //		}

        $users55 = Users55::with("roles55");

		if(Input::has('froles55_id')) { //relationship
		    $roles55_data =  Input::get('froles55_id');

		    if(!$roles55_data == ''){
		        $users55 = $users55->whereHas('roles55', function ($query) use($roles55_data)  {
		            return $query->where('roles55_id', $roles55_data);
		        });
		    }

		}

        $users55 = $users55->get();


        ///filter fields
        $roles55 = Roles55::pluck("sRoleName", "id");



	   $aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Success',
		'aData'	=> compact('users55', "roles55")
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
//		if(!Guard::allows('users55_view')){
//			return abort(404);
//		}

		$users55 = Users55::find($id);
		$roles55 = Roles55::pluck("sRoleName", "id");

		
		$view = "view";


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Success',
			'aData'	=> compact('users55', "roles55", 'view' )
		);

		return response()->json($aReturn);
	}


	/**
	 * Store a newly created users55 in storage.
	 *
     * @param CreateUsers55Request|Request $request
     *
     * @return json response
	 */
	public function store(CreateUsers55Request $request)
	{
//		if(!Guard::allows('users55_create')){
//			return abort(404);
//		}

	    
	    
		
		Users55::create($request->all());
		Session::flash('created', "A record has been created");

		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Added Successfully'
		);

		return response()->json($aReturn);
	}

	/**
	 * Update the specified users55 in storage.
     * @param UpdateUsers55Request|Request $request
     *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function update($id, UpdateUsers55Request $request)
	{
	//		if(!Guard::allows('users55_edit')){
    //			return abort(404);
    //		}
		$users55 = Users55::findOrFail($id);

        
		
		
		$users55->update($request->all());
		Session::flash('updated', "A record has been updated");


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Updated Successfully'
		);

		return $aReturn;
	}

	/**
	 * Remove the specified users55 from storage.
	 *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function destroy($id)
	{
	//		if(!Guard::allows('users55_delete')){
    //			return abort(404);
    //		}

		Users55::destroy($id);
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

	//		if(!Guard::allows('users55_delete')){
	//			return abort(404);
	//		}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));

            foreach($toDelete as $row){
            	$toDelete[$row] = $row;
            }
            Users55::destroy($toDelete);
        } else {
            Users55::whereNotNull('id')->delete();
        }
	Session::flash('deleted', "Records has been deleted");

	$aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Records has been deleted'
	);

	return response()->json($aReturn);
    }

}
