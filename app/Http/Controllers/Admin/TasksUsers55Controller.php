<?php

namespace App\Http\Controllers\Admin;

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
    	if(!Guard::allows('tasksusers55_access')){
    		return abort(404);
    	}

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


		return view('admin.tasksusers55.index', compact('tasksusers55', "tasks55", "users55"));
	}

	/**
	 * Show the form for creating a new tasksusers55
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
		if(!Guard::allows('tasksusers55_create')){
			return abort(404);
		}
	    $tasks55 = Tasks55::pluck("name", "id");
		$users55 = Users55::pluck("name", "id");

	    
	    return view('admin.tasksusers55.create', compact("tasks55", "users55"));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(!Guard::allows('tasksusers55_view')){
			return abort(404);
		}

		$tasksusers55 = TasksUsers55::find(decrypt($id));
		$tasks55 = Tasks55::pluck("name", "id");
		$users55 = Users55::pluck("name", "id");

		
		$view = "view";
		return view('admin.tasksusers55.show', compact('tasksusers55', "tasks55", "users55", 'view' ));
	}


	/**
	 * Store a newly created tasksusers55 in storage.
	 *
     * @param CreateTasksUsers55Request|Request $request
     * @return mixed
	 */
	public function store(CreateTasksUsers55Request $request)
	{
		if(!Guard::allows('tasksusers55_create')){
			return abort(404);
		}

	    
	    
	    
		TasksUsers55::create($request->all());
		Session::flash('created', "A record has been created");
		return redirect()->route('admin'.'.tasksusers55.index');
	}

	/**
	 * Show the form for editing the specified tasksusers55.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		if(!Guard::allows('tasksusers55_edit')){
   			return abort(404);
   		}
		$tasksusers55 = TasksUsers55::find(decrypt($id));
	    $tasks55 = Tasks55::pluck("name", "id");
		$users55 = Users55::pluck("name", "id");

	    
		return view('admin.tasksusers55.edit', compact('tasksusers55', "tasks55", "users55"));
	}

	/**
	 * Update the specified tasksusers55 in storage.
     * @param UpdateTasksUsers55Request|Request $request
     *
	 * @param  int  $id
     * @return mixed
	 */
	public function update($id, UpdateTasksUsers55Request $request)
	{
		if(!Guard::allows('tasksusers55_edit')){
   			return abort(404);
   		}
		$tasksusers55 = TasksUsers55::findOrFail(decrypt($id));

        
		
		
		$tasksusers55->update($request->all());
		Session::flash('updated', "A record has been updated");
		return redirect()->route('admin'.'.tasksusers55.index');
	}

	/**
	 * Remove the specified tasksusers55 from storage.
	 *
	 * @param  int  $id
     * @return mixed
	 */
	public function destroy($id)
	{
		if(!Guard::allows('tasksusers55_delete')){
   			return abort(404);
   		}
		TasksUsers55::destroy(decrypt($id));
		Session::flash('deleted', "A record has been deleted");
		return redirect()->route('admin'.'.tasksusers55.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
   		if(!Guard::allows('tasksusers55_delete')){
      		return abort(404);
      	}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            if (!$toDelete){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.tasksusers55.index');
            }

            foreach($toDelete as $row){
            	$toDelete[$row] = decrypt($row);
            }
            TasksUsers55::destroy($toDelete);
        } else {
            $toDelete =  TasksUsers55::all();
            if ($toDelete->isEmpty()){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.tasksusers55.index');
            }
            TasksUsers55::whereNotNull('id')->delete();
        }

        Session::flash('deleted', "Records has been deleted");
        return redirect()->route('admin'.'.tasksusers55.index');
    }

}
