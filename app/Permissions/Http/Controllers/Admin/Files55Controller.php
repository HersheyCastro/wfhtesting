<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permissions\Guard;
use Redirect;
use Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Files55;
use App\Http\Requests\CreateFiles55Request;
use App\Http\Requests\UpdateFiles55Request;
use Illuminate\Http\Request;
//use App\Permissions\Guard;


use App\Tasks55;


class Files55Controller extends Controller {


	/**
	 * Display a listing of files55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
    	
    	if(!Guard::allows('files55_access')){
    		return abort(404);
    	}

        $files55 = Files55::with("tasks55");

		if(Input::has('ftasks55_id')) { //relationship
		    $tasks55_data =  Input::get('ftasks55_id');

		    if(!$tasks55_data == ''){
		        $files55 = $files55->whereHas('tasks55', function ($query) use($tasks55_data)  {
		            return $query->where('tasks55_id', $tasks55_data);
		        });
		    }

		}

        $files55 = $files55->get();


        ///filter fields
        $tasks55 = Tasks55::pluck("name", "id");


		return view('admin.files55.index', compact('files55', "tasks55"));
	}

	/**
	 * Show the form for creating a new files55
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
		
		if(!Guard::allows('files55_create')){
			return abort(404);
		}
	    $tasks55 = Tasks55::pluck("name", "id");

	    
	    return view('admin.files55.create', compact("tasks55"));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(!Guard::allows('files55_view')){
			return abort(404);
		}

		$files55 = Files55::find(decrypt($id));
		$tasks55 = Tasks55::pluck("name", "id");

		
		$view = "view";
		return view('admin.files55.show', compact('files55', "tasks55", 'view' ));
	}


	/**
	 * Store a newly created files55 in storage.
	 *
     * @param CreateFiles55Request|Request $request
     * @return mixed
	 */
	public function store(Request $request)
	{
		// return "file store";
		if(!Guard::allows('files55_create')){
			return abort(404);
		}
		
		$target = $request->input('target_Id');
		// return $target;
		$files = $request->file('task_file');
		// return count($files);
      
        for ($i=0; $i < count($files); $i++) {
                //<< Save File to Public->upload folder   
	      $filenameWithExt = $files[$i]->getClientOriginalName();

	      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

	      $extension = $files[$i]->getClientOriginalExtension();

	      $filenameToStore = $filename.'_'.time().'.'.$extension;

                $files[$i]->move(public_path().'/uploads/files/',$filenameToStore);
                
                $filetask = new Files55;
                $filetask->filename = $filename;
                $filetask->link = $filenameToStore;
                $filetask->tasks55_id = $request->taskFile ;
        
                $filetask->save();
            }



	    
	    
	    
		// Files55::create($request->all());
		// Session::flash('created', "A record has been created");
		return redirect()->route('admin'.'.targets55.edit',$target);
	}

	/**
	 * Show the form for editing the specified files55.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		if(!Guard::allows('files55_edit')){
   			return abort(404);
   		}
		$files55 = Files55::find(decrypt($id));
	    $tasks55 = Tasks55::pluck("name", "id");

	    
		return view('admin.files55.edit', compact('files55', "tasks55"));
	}

	/**
	 * Update the specified files55 in storage.
     * @param UpdateFiles55Request|Request $request
     *
	 * @param  int  $id
     * @return mixed
	 */
	public function update($id, UpdateFiles55Request $request)
	{
		if(!Guard::allows('files55_edit')){
   			return abort(404);
   		}
		$files55 = Files55::findOrFail(decrypt($id));

        
		
		
		$files55->update($request->all());
		Session::flash('updated', "A record has been updated");
		return redirect()->route('admin'.'.files55.index');
	}

	/**
	 * Remove the specified files55 from storage.
	 *
	 * @param  int  $id
     * @return mixed
	 */
	public function destroy($id)
	{
		if(!Guard::allows('files55_delete')){
   			return abort(404);
   		}
		Files55::destroy(decrypt($id));
		Session::flash('deleted', "A record has been deleted");
		return redirect()->route('admin'.'.files55.index');

	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
   		if(!Guard::allows('files55_delete')){
      		return abort(404);
      	}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            if (!$toDelete){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.files55.index');
            }

            foreach($toDelete as $row){
            	$toDelete[$row] = decrypt($row);
            }
            Files55::destroy($toDelete);
        } else {
            $toDelete =  Files55::all();
            if ($toDelete->isEmpty()){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.files55.index');
            }
            Files55::whereNotNull('id')->delete();
        }

        Session::flash('deleted', "Records has been deleted");
        return redirect()->route('admin'.'.files55.index');
    }

}
