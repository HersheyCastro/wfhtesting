<?php

namespace App\Http\Controllers\Admin;

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
use App\StrategicObjectives55;
use Auth;
use DB;

use DateTime;
use App\Users55;
use App\SuccessIndicators55;
use App\Ipcr55;
use App\Tasks55;


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
    	if(!Guard::allows('targets55_access')){
    		return abort(404);
    	}

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
        $users55 = Users55::pluck("firstname", "id");
		$successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id");
		$ipcr55 = Ipcr55::pluck("ipcr_name", "id");


		return view('admin.targets55.index', compact('targets55', "users55", "successindicators55", "ipcr55"));
	}

	/**
	 * Show the form for creating a new targets55
	 *
     * @return \Illuminate\View\View
	 */
	public function create($id) {
		
		if(!Guard::allows('targets55_create')){
			return abort(404);
		}
	    // $users55 = Users55::pluck("firstname", "id");
	    $divId = Auth::user()->division_id;
		$successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id");
		$strategicObj = StrategicObjectives55::pluck("strategic_objective_name", "id");
		$ipcr55 = Ipcr55::pluck("ipcr_name", "id");

		$ipcr55 = Ipcr55::pluck("ipcr_name", "id");
		$tasks = Tasks55::where('targets55_id',$id)->get();
		// return $tasks;
		$files = DB::select("SELECT DISTINCT 
								T1.id as id,
								T2.name as tasks,
								T3.filename as filename,
								T3.link as link
								FROM targets55 T1 LEFT JOIN tasks55 T2 ON T1.id = T2.targets55_id 
								LEFT JOIN files55 T3 ON T2.id = T3.tasks55_id
								WHERE T1.id = '$id' ");
		
		
		// return $id;


		$success_data =DB::select("SELECT DISTINCT 
										S1.success_indicator_name,
										S1.id,
										S2.division55_id
										FROM successindicators55 S1 LEFT JOIN divisionindicators55 S2 ON S1.id = S2.successindicators55_id 
										WHERE S2.division55_id = '$divId'");
		$success = collect($success_data)->pluck("success_indicator_name","id");


	    
	    return view('admin.targets55.create', compact("successindicators55", "ipcr55","strategicObj","success","id","tasks","files"));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(!Guard::allows('targets55_view')){
			return abort(404);
		}

		$targets55 = Targets55::find(decrypt($id));
		$users55 = Users55::pluck("firstname", "id");
		$successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id");
		$ipcr55 = Ipcr55::pluck("ipcr_name", "id");

		
		$view = "view";
		return view('admin.targets55.show', compact('targets55', "users55", "successindicators55", "ipcr55", 'view' ));
	}


	/**
	 * Store a newly created targets55 in storage.
	 *
     * @param CreateTargets55Request|Request $request
     * @return mixed
	 */
	public function getFiles(){
		$msg = "sample.";
      return response()->json(array('msg'=> $msg), 200);
	}

	public function store(CreateTargets55Request $request)
	{
		// return "store";
		if(!Guard::allows('targets55_create')){
			return abort(404);
		}
		$ipcr_id = $request->input('ipcr55_id');

        // $duration_s = Carbon::parse(substr($request->duration, 0 , 19));
        // $duration_e = Carbon::parse(substr($request->duration, -22));
        // $request->request->add(['duration_s' => $duration_s, 'duration_e'=> $duration_e]);
		$targets = Targets55::create($request->all());

	
        $task_id = $request->input('task_id');
		$task = $request->input('task_name');
		$weight = $request->input('weight');
		$percent = $request->input('percent_completed');
		$verification = $request->input('means_verification');

	
        for ($i=0; $i < count($task); $i++) {
        	$week_year = $request->input('targetweek');
			$week = substr($week_year[$i], strpos($week_year[$i], "W") + 1);   
			$year = strtok($week_year[$i], '-');
			$dto = new DateTime();
			$start_date = $dto->setISODate($year, $week)->format('Y-m-d');
			$start_end = $dto->modify('+4 days')->format('Y-m-d');

        	$newTask = new Tasks55();
	        $newTask->name = $task[$i];
	        $newTask->weight = $weight[$i];
	        $newTask->percent_completed = $percent[$i];
	        $newTask->means_verification = $verification[$i];
	        $newTask->targets55_id = $targets->id;
	        $newTask->duration_s = $start_date;
	        $newTask->duration_e = $start_end;
	        $newTask->active = $week;
	        $newTask->save();

        }

		Session::flash('created', "A record has been created");
		return redirect()->route('admin'.'.ipcr55.show',array(encrypt($ipcr_id)));
	}

	/**
	 * Show the form for editing the specified targets55.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		// return $id;
		if(!Guard::allows('targets55_edit')){
   			return abort(404);
   		}
		$targets55 = Targets55::find($id);
		// return $targets55;
	    $users55 = Users55::pluck("firstname", "id");
		$successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id");
		
		$ipcr55 = Ipcr55::pluck("ipcr_name", "id");
		$tasks = Tasks55::where('targets55_id',$id)->get();
		// return $tasks;
		$files = DB::select("SELECT DISTINCT 
								T1.id as id,
								T2.name as tasks,
								T3.filename as filename,
								T3.link as link
								FROM targets55 T1 LEFT JOIN tasks55 T2 ON T1.id = T2.targets55_id 
								LEFT JOIN files55 T3 ON T2.id = T3.tasks55_id
								WHERE T1.id = '$id' ");

	    
		return view('admin.targets55.edit', compact('targets55', "users55", "successindicators55", "ipcr55","tasks","files"));
	}

	/**
	 * Update the specified targets55 in storage.
     * @param UpdateTargets55Request|Request $request
     *
	 * @param  int  $id
     * @return mixed
	 */
	public function update($id,Request $request)
	{
		// $ddate = "2020-03-20";
		// $date = new DateTime($ddate);
		// $week = $date->format("W");
		// $year = $date->format("Y");
		// $targetdate = $year.'-W'.$week;

		$ipcr = $request->input('ipcr55_id');
		$existTask = Tasks55::where('targets55_id',decrypt($id))->count();
		// return $existTask;
		if(!Guard::allows('targets55_edit')){
   			return abort(404);
   		}
		$targets55 = Targets55::findOrFail(decrypt($id));

		// update targets
        // $duration_s = Carbon::parse(substr($request->duration, 0 , 19));
        // $duration_e = Carbon::parse(substr($request->duration, -22));
        // $request->request->add(['duration_s' => $duration_s, 'duration_e'=> $duration_e]);
		$targets55->update($request->all());

		//update or add task
		$task_id = $request->input('task_id');
		$task = $request->input('task_name');
		$weight = $request->input('weight');
		$percent = $request->input('percent_completed');
		$verification = $request->input('means_verification');
		$targetweek = $request->input('targetweek');
		$rowcount = count($task);
		// return $targetweek[0];

		if ($rowcount >$existTask){
			//add
			for ($i=$existTask; $i < $rowcount; $i++) {
				$week_year = $request->input('targetweek');
				$week = substr($week_year[$i], strpos($week_year[$i], "W") + 1);   
				$year = strtok($week_year[$i], '-');
				$dto = new DateTime();
				$start_date = $dto->setISODate($year, $week)->format('Y-m-d');
				$start_end = $dto->modify('+4 days')->format('Y-m-d');

		  

	        	$newTask = new Tasks55();
		        $newTask->name = $task[$i];
		        $newTask->weight = $weight[$i];
		        $newTask->percent_completed = $percent[$i];
		        $newTask->means_verification = $verification[$i];
		        $newTask->targets55_id = decrypt($id);
		        $newTask->duration_s = $start_date;
		        $newTask->duration_e = $start_end;
		        $newTask->active = $week;
		        $newTask->save();
        	}

		}
		else {
			//update
			for ($i=0; $i < count($task); $i++) {
        		$taskId =  $task_id[$i];

	        	if($targetweek[$i]==""){
	        		Tasks55::where('id', $taskId)
	                            ->update([
	                                'name' =>  $task[$i],
	                                'weight' => $weight[$i], 
	                                'percent_completed' =>  $percent[$i], 
	                                'means_verification' => $verification[$i],
	                            ]);
	        	}else{
	        		$week_year = $request->input('targetweek');
					$week = substr($week_year[$i], strpos($week_year[$i], "W") + 1);   
					$year = strtok($week_year[$i], '-');
					$dto = new DateTime();
					$start_date = $dto->setISODate($year, $week)->format('Y-m-d');
					$start_end = $dto->modify('+4 days')->format('Y-m-d');

					
	        		Tasks55::where('id', $taskId)
	                            ->update([
	                                'name' =>  $task[$i],
	                                'weight' => $weight[$i], 
	                                'percent_completed' =>  $percent[$i], 
	                                'means_verification' => $verification[$i],
	                                'duration_s' => $start_date,
	                                'duration_e' => $start_end,
	                                'active' => $week,
	                            ]);
	        	}

	        	

        	}
		}


		Session::flash('updated', "A record has been updated");
		// return redirect()->route('admin'.'.targets55.index');
		return redirect()->route('admin'.'.ipcr55.show',encrypt($ipcr));
	}

	/**
	 * Remove the specified targets55 from storage.
	 *
	 * @param  int  $id
     * @return mixed
	 */
	public function destroy($id,Request $request)
	{
		
		
		if(!Guard::allows('targets55_delete')){
   			return abort(404);
   		}

		// Tasks55::destroy(decrypt($id));
		// Session::flash('deleted', "A record has been deleted");
		// return view('admin.targets55.edit',decrypt($id));


		Targets55::destroy(decrypt($id));
		Session::flash('deleted', "A record has been deleted");
		return redirect()->route('admin'.'.targets55.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
   		if(!Guard::allows('targets55_delete')){
      		return abort(404);
      	}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            if (!$toDelete){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.targets55.index');
            }

            foreach($toDelete as $row){
            	$toDelete[$row] = decrypt($row);
            }
            Targets55::destroy($toDelete);
        } else {
            $toDelete =  Targets55::all();
            if ($toDelete->isEmpty()){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.targets55.index');
            }
            Targets55::whereNotNull('id')->delete();
        }

        Session::flash('deleted', "Records has been deleted");
        return redirect()->route('admin'.'.targets55.index');
    }

}
