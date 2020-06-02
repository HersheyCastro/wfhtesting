<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Permissions\Guard;
use Redirect;
use Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Tasks55;
use App\Http\Requests\CreateTasks55Request;
use App\Http\Requests\UpdateTasks55Request;
use Illuminate\Http\Request;
//use App\Permissions\Guard;

use App\Targets55;


class Tasks55Controller extends Controller {

	/**
	 * Display a listing of tasks55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
    //		if(!Guard::allows('tasks55_access')){
    //			return abort(404);
    //		}

        $tasks55 = Tasks55::with("targets55");

		if(Input::has('ftargets55_id')) { //relationship
		    $targets55_data =  Input::get('ftargets55_id');

		    if(!$targets55_data == ''){
		        $tasks55 = $tasks55->whereHas('targets55', function ($query) use($targets55_data)  {
		            return $query->where('targets55_id', $targets55_data);
		        });
		    }

		}

        $tasks55 = $tasks55->get();


        ///filter fields
        $targets55 = Targets55::pluck("name", "id");



	   $aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Success',
		'aData'	=> compact('tasks55', "targets55")
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
//		if(!Guard::allows('tasks55_view')){
//			return abort(404);
//		}

		$tasks55 = Tasks55::find($id);
		$targets55 = Targets55::pluck("name", "id");

		
		$view = "view";


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Success',
			'aData'	=> compact('tasks55', "targets55", 'view' )
		);

		return response()->json($aReturn);
	}


	/**
	 * Store a newly created tasks55 in storage.
	 *
     * @param CreateTasks55Request|Request $request
     *
     * @return json response
	 */
	public function store(CreateTasks55Request $request)
	{
//		if(!Guard::allows('tasks55_create')){
//			return abort(404);
//		}

	    
	    
        $duration_s = Carbon::parse(substr($request->duration, 0 , 19));
        $duration_e = Carbon::parse(substr($request->duration, -22));
        $request->request->add(['duration_s' => $duration_s, 'duration_e'=> $duration_e]);

		
		Tasks55::create($request->all());
		Session::flash('created', "A record has been created");

		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Added Successfully'
		);

		return response()->json($aReturn);
	}

	/**
	 * Update the specified tasks55 in storage.
     * @param UpdateTasks55Request|Request $request
     *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function update($id, UpdateTasks55Request $request)
	{
	//		if(!Guard::allows('tasks55_edit')){
    //			return abort(404);
    //		}
		$tasks55 = Tasks55::findOrFail($id);

        
		
        $duration_s = Carbon::parse(substr($request->duration, 0 , 19));
        $duration_e = Carbon::parse(substr($request->duration, -22));
        $request->request->add(['duration_s' => $duration_s, 'duration_e'=> $duration_e]);

		
		$tasks55->update($request->all());
		Session::flash('updated', "A record has been updated");


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Updated Successfully'
		);

		return $aReturn;
	}

	/**
	 * Remove the specified tasks55 from storage.
	 *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function destroy($id)
	{
	//		if(!Guard::allows('tasks55_delete')){
    //			return abort(404);
    //		}

		Tasks55::destroy($id);
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

	//		if(!Guard::allows('tasks55_delete')){
	//			return abort(404);
	//		}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));

            foreach($toDelete as $row){
            	$toDelete[$row] = $row;
            }
            Tasks55::destroy($toDelete);
        } else {
            Tasks55::whereNotNull('id')->delete();
        }
	Session::flash('deleted', "Records has been deleted");

	$aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Records has been deleted'
	);

	return response()->json($aReturn);
    }

}
