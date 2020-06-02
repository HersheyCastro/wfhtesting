<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Permissions\Guard;
use Redirect;
use Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\TasksUsers55;
use App\Http\Requests\CreateTasksUsers55Request;
use App\Http\Requests\UpdateTasksUsers55Request;
use Illuminate\Http\Request;
//use App\Permissions\Guard;

use App\Tasks55;
use App\Users55;


class TasksUsers55Controller extends Controller {

	/**
	 * Display a listing of tasksusers55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
    //		if(!Guard::allows('tasksusers55_access')){
    //			return abort(404);
    //		}

        $tasksusers55 = TasksUsers55::with("tasks55")->with("users55");

		if(Input::has('ftasks55_id')) { //relationship
		    $tasks55_data =  Input::get('ftasks55_id');

		    if(!$tasks55_data == ''){
		        $tasksusers55 = $tasksusers55->whereHas('tasks55', function ($query) use($tasks55_data)  {
		            return $query->where('tasks55_id', $tasks55_data);
		        });
		    }

		}
		if(Input::has('fusers55_id')) { //relationship
		    $users55_data =  Input::get('fusers55_id');

		    if(!$users55_data == ''){
		        $tasksusers55 = $tasksusers55->whereHas('users55', function ($query) use($users55_data)  {
		            return $query->where('users55_id', $users55_data);
		        });
		    }

		}


        $tasksusers55 = $tasksusers55->get();


        ///filter fields
        $tasks55 = Tasks55::pluck("name", "id");
$users55 = Users55::pluck("name", "id");



	   $aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Success',
		'aData'	=> compact('tasksusers55', "tasks55", "users55")
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
//		if(!Guard::allows('tasksusers55_view')){
//			return abort(404);
//		}

		$tasksusers55 = TasksUsers55::find($id);
		$tasks55 = Tasks55::pluck("name", "id");
$users55 = Users55::pluck("name", "id");

		
		$view = "view";


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Success',
			'aData'	=> compact('tasksusers55', "tasks55", "users55", 'view' )
		);

		return response()->json($aReturn);
	}


	/**
	 * Store a newly created tasksusers55 in storage.
	 *
     * @param CreateTasksUsers55Request|Request $request
     *
     * @return json response
	 */
	public function store(CreateTasksUsers55Request $request)
	{
//		if(!Guard::allows('tasksusers55_create')){
//			return abort(404);
//		}

	    
	    
		
		TasksUsers55::create($request->all());
		Session::flash('created', "A record has been created");

		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Added Successfully'
		);

		return response()->json($aReturn);
	}

	/**
	 * Update the specified tasksusers55 in storage.
     * @param UpdateTasksUsers55Request|Request $request
     *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function update($id, UpdateTasksUsers55Request $request)
	{
	//		if(!Guard::allows('tasksusers55_edit')){
    //			return abort(404);
    //		}
		$tasksusers55 = TasksUsers55::findOrFail($id);

        
		
		
		$tasksusers55->update($request->all());
		Session::flash('updated', "A record has been updated");


		$aReturn	= array(
			'iErr'	=> 0,
			'sMsg'	=> 'Updated Successfully'
		);

		return $aReturn;
	}

	/**
	 * Remove the specified tasksusers55 from storage.
	 *
	 * @param  int  $id
     *
     * @return json response
	 */
	public function destroy($id)
	{
	//		if(!Guard::allows('tasksusers55_delete')){
    //			return abort(404);
    //		}

		TasksUsers55::destroy($id);
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

	//		if(!Guard::allows('tasksusers55_delete')){
	//			return abort(404);
	//		}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));

            foreach($toDelete as $row){
            	$toDelete[$row] = $row;
            }
            TasksUsers55::destroy($toDelete);
        } else {
            TasksUsers55::whereNotNull('id')->delete();
        }
	Session::flash('deleted', "Records has been deleted");

	$aReturn	= array(
		'iErr'	=> 0,
		'sMsg'	=> 'Records has been deleted'
	);

	return response()->json($aReturn);
    }

}
