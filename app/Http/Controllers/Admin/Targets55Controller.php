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
use App\Files55;



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

	public function newaccomplishments()
	{
		if(!Guard::allows('targets55_create')){
			return abort(404);
		}
	    // $users55 = Users55::pluck("firstname", "id");
	    $divId = Auth::user()->division_id;
		$successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id");
		$strategicObj = StrategicObjectives55::pluck("strategic_objective_name", "id");
		


		$success_data =DB::select("SELECT DISTINCT 
										S1.success_indicator_name,
										S1.id,
										S2.division55_id
										FROM successindicators55 S1 LEFT JOIN divisionindicators55 S2 ON S1.id = S2.successindicators55_id 
										WHERE S2.division55_id = '$divId'");
		// $success = collect($success_data)->pluck("success_indicator_name","id");


	    
	    return view('admin.targets55.createaccomplishmentforchief', compact("successindicators55","strategicObj","success_data"));
	}

	public function createaccomplishments($id)
	{
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
		// $success = collect($success_data)->pluck("success_indicator_name","id");


	    
	    return view('admin.targets55.createaccomplishment', compact("successindicators55", "ipcr55","strategicObj","success_data","id","tasks","files"));
	}

	public function additionaldivisionaccomplishments($id)
	{
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
		// $success = collect($success_data)->pluck("success_indicator_name","id");


	    
	    return view('admin.targets55.additionaldivisionaccomplishment', compact("successindicators55", "ipcr55","strategicObj","success_data","id","tasks","files"));
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

	
        // $task_id = $request->input('task_id');
		$task = $request->input('task_name');
		$weight = $request->input('weight');
		$percent = $request->input('percent_completed');
		$verification = $request->input('means_verification');
		$startdate = $request->input('start_date');
		$enddate = $request->input('end_date');

	
        for ($i=0; $i < count($task); $i++) {
   //      	$week_year = $request->input('targetweek');
			// $week = substr($week_year[$i], strpos($week_year[$i], "W") + 1);   
			// $year = strtok($week_year[$i], '-');
			// $dto = new DateTime();
			// $start_date = $dto->setISODate($year, $week)->format('Y-m-d');
			// $start_end = $dto->modify('+4 days')->format('Y-m-d');

        	$newTask = new Tasks55();
	        $newTask->name = $task[$i];
	        $newTask->weight = $weight[$i];
	        $newTask->percent_completed = $percent[$i];
	        $newTask->means_verification = $verification[$i];
	        $newTask->targets55_id = $targets->id;
	        $newTask->duration_s = $startdate[$i];
	        $newTask->duration_e = $enddate[$i];
	        // $newTask->active = $week;
	        $newTask->save();

        }

		Session::flash('created', "A record has been created");
		return redirect()->route('admin'.'.ipcr55.show',array(encrypt($ipcr_id)));
	}

	public function additionalaccomplishments(Request $request)
	{

		// additional targets
		if(!Guard::allows('targets55_create')){
			return abort(404);
		}
		$ipcr_id = $request->input('ipcr55_id');
		// return $ipcr_id;
		
		$newipcr = new Ipcr55();
        $newipcr->ipcr_name = Auth::user()->lastname.'-additionalAccomplishment';
        $newipcr->status55_id = 2;
        $newipcr->user_id = Auth::user()->id;
        $newipcr->active = 1;
        $newipcr->origid = $ipcr_id;
        $newipcr->save();
		// return $request->input('name');
        $newtargets = new Targets55();
        $newtargets->name = $request->input('name');
        $newtargets->users55_id = Auth::user()->id;
        $newtargets->successindicators55_id = $request->input('successindicators');
        $newtargets->ipcr55_id = $newipcr->id;
        $newtargets->save();
           
		$task_accomplishments = $request->input('task_accomplishments');
		$percent_completed = $request->input('percent_completed');
		$targetstart = $request->input('target_start');
		$targetend = $request->input('target_end');
		$actualstart = $request->input('actual_start');
		$actualend = $request->input('actual_end');
		$actualverification = $request->input('actual_verification');
		

	
        for ($i=0; $i < count($task_accomplishments); $i++) {

        	$newTask = new Tasks55();
	        $newTask->name = $task_accomplishments[$i];
	       	
	       	$newTask->duration_s = date("Y-m-d H:i:s", strtotime($targetstart[$i]));
	        $newTask->duration_e = date("Y-m-d H:i:s", strtotime($targetend[$i]));
	        $newTask->targets55_id = $newtargets->id;
	        $newTask->actualdate_s = date("Y-m-d H:i:s", strtotime($actualstart[$i]));
	        $newTask->actualdate_e = date("Y-m-d H:i:s", strtotime($actualend[$i]));
	        $newTask->percent_completed = $percent_completed[$i];
	        
	        $newTask->actual_verification = $actualverification[$i];
	        $newTask->status_id = 4;
	        $newTask->save();

        }


		Session::flash('created', "A record has been created");
		// return redirect()->route('admin'.'.ipcr55.show',array(encrypt($ipcr_id)));
		return redirect()->route('admin'.'.indexaccomplishments');
	}

	public function additionalaccomplishmentsforchief(Request $request)
	{

		// additional targets
		if(!Guard::allows('targets55_create')){
			return abort(404);
		}
		$ipcr_id = $request->input('ipcr55_id');
		// return $ipcr_id;
		
		
        $newtargets = new Targets55();
        $newtargets->name = $request->input('name');
        $newtargets->users55_id = Auth::user()->id;
        $newtargets->successindicators55_id = $request->input('successindicators');
        $newtargets->ipcr55_id = $ipcr_id;
        $newtargets->save();
           
		$task_accomplishments = $request->input('task_accomplishments');
		$percent_completed = $request->input('percent_completed');
		$targetstart = $request->input('target_start');
		$targetend = $request->input('target_end');
		$actualstart = $request->input('actual_start');
		$actualend = $request->input('actual_end');
		$actualverification = $request->input('actual_verification');
		

	
        for ($i=0; $i < count($task_accomplishments); $i++) {

        	$newTask = new Tasks55();
	        $newTask->name = $task_accomplishments[$i];
	       	
	       	$newTask->duration_s = date("Y-m-d H:i:s", strtotime($targetstart[$i]));
	        $newTask->duration_e = date("Y-m-d H:i:s", strtotime($targetend[$i]));
	        $newTask->targets55_id = $newtargets->id;
	        $newTask->actualdate_s = date("Y-m-d H:i:s", strtotime($actualstart[$i]));
	        $newTask->actualdate_e = date("Y-m-d H:i:s", strtotime($actualend[$i]));
	        $newTask->percent_completed = $percent_completed[$i];
	        
	        $newTask->actual_verification = $actualverification[$i];
	        $newTask->status_id = 4;
	        $newTask->save();

        }


		Session::flash('created', "A record has been created");
		// return redirect()->route('admin'.'.ipcr55.show',array(encrypt($ipcr_id)));
		return redirect()->route('admin'.'.indexaccomplishments');
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
   		$divId = Auth::user()->division_id;
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
		$filelink = Files55::all();

		$success_data =DB::select("SELECT DISTINCT 
										S1.success_indicator_name,
										S1.id,
										S2.division55_id
										FROM successindicators55 S1 LEFT JOIN divisionindicators55 S2 ON S1.id = S2.successindicators55_id 
										WHERE S2.division55_id = '$divId'");
		$success = collect($success_data)->pluck("success_indicator_name","id");

		
		return view('admin.targets55.edit', compact('targets55', "users55", "successindicators55", "ipcr55","tasks","files","filelink","success"));
	}

	public function editsenior($id)
	{
		// return "hi";
		if(!Guard::allows('targets55_edit')){
   			return abort(404);
   		}
   		$divId = Auth::user()->division_id;
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
		$filelink = Files55::all();

		$success_data =DB::select("SELECT DISTINCT 
										S1.success_indicator_name,
										S1.id,
										S2.division55_id
										FROM successindicators55 S1 LEFT JOIN divisionindicators55 S2 ON S1.id = S2.successindicators55_id 
										WHERE S2.division55_id = '$divId'");
		$success = collect($success_data)->pluck("success_indicator_name","id");

		
		return view('admin.targets55.edittargetforsenior', compact('targets55', "users55", "successindicators55", "ipcr55","tasks","files","filelink","success"));
		
	    
		
	}

	public function editsenioraccomplishment($id)
	{
		// return "hi";
		if(!Guard::allows('targets55_edit')){
   			return abort(404);
   		}
   		$divId = Auth::user()->division_id;
		$targets55 = Targets55::find($id);
		// return $targets55;
	    $users55 = Users55::pluck("firstname", "id");
		$successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id");
		
		$ipcr55 = Ipcr55::pluck("ipcr_name", "id","origid");
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
		$filelink = Files55::all();

		$success_data =DB::select("SELECT DISTINCT 
										S1.success_indicator_name,
										S1.id,
										S2.division55_id
										FROM successindicators55 S1 LEFT JOIN divisionindicators55 S2 ON S1.id = S2.successindicators55_id 
										WHERE S2.division55_id = '$divId'");
		$success = collect($success_data)->pluck("success_indicator_name","id");

		
		return view('admin.targets55.editaccomplishmentforsenior', compact('targets55', "users55", "successindicators55", "ipcr55","tasks","files","filelink","success"));
		
	    
		
	}

	public function editchiefaccomplishment($id)
	{
		// return "hi";
		if(!Guard::allows('targets55_edit')){
   			return abort(404);
   		}
   		$divId = Auth::user()->division_id;
		$targets55 = Targets55::find($id);
		// return $targets55;
	    $users55 = Users55::pluck("firstname", "id");
		$successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id");
		
		$ipcr55 = Ipcr55::pluck("ipcr_name", "id","origid");
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
		$filelink = Files55::all();

		$success_data =DB::select("SELECT DISTINCT 
										S1.success_indicator_name,
										S1.id,
										S2.division55_id
										FROM successindicators55 S1 LEFT JOIN divisionindicators55 S2 ON S1.id = S2.successindicators55_id 
										WHERE S2.division55_id = '$divId'");
		$success = collect($success_data)->pluck("success_indicator_name","id");

		
		return view('admin.targets55.editaccomplishmentforchief', compact('targets55', "users55", "successindicators55", "ipcr55","tasks","files","filelink","success"));
		
	    
		
	}


	public function editdivisionhead($id)
	{
		// return "hi";
		if(!Guard::allows('targets55_edit')){
   			return abort(404);
   		}
   		$divId = Auth::user()->division_id;
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
		$filelink = Files55::all();

		$success_data =DB::select("SELECT DISTINCT 
										S1.success_indicator_name,
										S1.id,
										S2.division55_id
										FROM successindicators55 S1 LEFT JOIN divisionindicators55 S2 ON S1.id = S2.successindicators55_id 
										WHERE S2.division55_id = '$divId'");
		$success = collect($success_data)->pluck("success_indicator_name","id");

		
		return view('admin.targets55.edittargetsfordivisionhead', compact('targets55', "users55", "successindicators55", "ipcr55","tasks","files","filelink","success"));
		
	    
		
	}

	public function editaccomplishments($id){
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
		$filelink = Files55::all();

	    
		return view('admin.targets55.editaccomplishment', compact('targets55', "users55", "successindicators55", "ipcr55","tasks","files","filelink"));
	}

	public function editadditionalaccomplishmentsforchief($id){
		
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
		$filelink = Files55::all();

	    
		return view('admin.targets55.editadditionalaccomplishmentsforchief', compact('targets55', "users55", "successindicators55", "ipcr55","tasks","files","filelink"));
	}

	/**
	 * Update the specified targets55 in storage.
     * @param UpdateTargets55Request|Request $request
     *
	 * @param  int  $id
     * @return mixed
	 */
	public function updateaccomplishments($id,Request $request)
	{
		
		$ipcr = $request->input('ipcr55_id');
		// return $ipcr;

		$existTask = Tasks55::where('targets55_id',decrypt($id))->count();
		
		if(!Guard::allows('targets55_edit')){
   			return abort(404);
   		}

		//update or add task
		$task_id = $request->input('task_id');
		$weight = $request->input('weight');
		$task_name = $request->input('task_accomplishments');
		$percent = $request->input('percent_completed');
		$startdate = $request->input('actual_start');
		$enddate = $request->input('actual_end');
		$verification = $request->input('actual_verification');
		$rowcount = count($task_id);
		$taskcount = count($task_name);
		// return $taskcount;

		Targets55::where('id', decrypt($id))
	                            ->update([
									'efficiency' =>  $request->input('efficiency'), 
									'quality' =>  $request->input('quality'), 
									'timeliness' =>  $request->input('timeliness'), 
	                            ]);

		if($taskcount>$existTask)
		{
			// additional task
			// return "add";

			 for ($i=0; $i < $rowcount; $i++) {
	    		$taskId =  $task_id[$i];

	    		$taskpercentage = ($weight[$i]/100)*$percent[$i];

	    		Tasks55::where('id', $taskId)
	                        ->update([
	                            'percent_completed' =>  $percent[$i], 
	                            'actual_verification' => $verification[$i],
	                            'actualdate_s' => $startdate[$i],
	                            'actualdate_e' => $enddate[$i],
	                            'percent' =>  $taskpercentage, 
	                            
	                        ]);
	    	}

	        $gettask = Tasks55::where('targets55_id',decrypt($id))->get();
			$percenttarget = collect($gettask)->sum('percent');

	        Targets55::where('id', decrypt($id))
	                            ->update([
	                                'percent' =>  $percenttarget, 
	                            ]);

			$newipcr = new Ipcr55();
	        $newipcr->ipcr_name = Auth::user()->lastname.'-additionalAccomplishment';
	        $newipcr->status55_id = 2;
	        $newipcr->user_id = Auth::user()->id;
	        $newipcr->active = 1;
	        $newipcr->origid = $ipcr;
	        $newipcr->save();

	        $newtargets = new Targets55();
	        $newtargets->name = $request->input('name');
	        $newtargets->users55_id = Auth::user()->id;
	        $newtargets->successindicators55_id = $request->input('successindicators');
	        $newtargets->ipcr55_id = $newipcr->id;
	        $newtargets->origid = decrypt($id);
	        $newtargets->save();
	           // return  $request->input('successindicators');


	       
	  //       $request->request->add(['ipcr55_id' => $newipcr->id]);
			// $targets = Targets55::create($request->all());

		
	        // $task_id = $request->input('task_id');
			$task_accomplishments = $request->input('task_accomplishments');
			$percent_completed = $request->input('percent_completed');
			$targetstart = $request->input('target_start');
			$targetend = $request->input('target_end');
			$actualstart = $request->input('actual_start');
			$actualend = $request->input('actual_end');
			$actualverification = $request->input('actual_verification');
			$weight = $request->input('weight');
			// return $task_accomplishments[1];

		
	        for ($i=0; $i < count($task_accomplishments); $i++) {

	        	$newTask = new Tasks55();
		        $newTask->name = $task_accomplishments[$i];
		       	
		       	$newTask->duration_s = date("Y-m-d H:i:s", strtotime($targetstart[$i]));
		        $newTask->duration_e = date("Y-m-d H:i:s", strtotime($targetend[$i]));
		        $newTask->targets55_id = $newtargets->id;
		        $newTask->actualdate_s = date("Y-m-d H:i:s", strtotime($actualstart[$i]));
		        $newTask->actualdate_e = date("Y-m-d H:i:s", strtotime($actualend[$i]));
		        $newTask->percent_completed = $percent_completed[$i];
		        if ( !isset($weight[$i])) {
				  $weight[$i] = null;
				}
		       	$newTask->weight = $weight[$i];
		        $newTask->actual_verification = $actualverification[$i];
		        $newTask->status_id = 4;
		        $newTask->save();

	        }

	       




		}else 
		{
			//update task only
			// return "update";
			for ($i=0; $i < $rowcount; $i++) {
	    		$taskId =  $task_id[$i];

	    		$taskpercentage = ($weight[$i]/100)*$percent[$i];

	    		Tasks55::where('id', $taskId)
	                        ->update([
	                            'percent_completed' =>  $percent[$i], 
	                            'actual_verification' => $verification[$i],
	                            'actualdate_s' => $startdate[$i],
	                            'actualdate_e' => $enddate[$i],
	                            'percent' =>  $taskpercentage, 
	                            
	                        ]);
	    	}

	        $gettask = Tasks55::where('targets55_id',decrypt($id))->get();
			$percenttarget = collect($gettask)->sum('percent');

	        Targets55::where('id', decrypt($id))
	                            ->update([
	                                'percent' =>  $percenttarget, 
	                            ]);
		}
		
        	
		Session::flash('updated', "A record has been updated");
		// return redirect()->route('admin'.'.targets55.index');
		return redirect()->route('admin'.'.accomplishments/',encrypt($ipcr));

	}

	public function updateadditionalaccomplishmentsforchief($id,Request $request)
	{
		
		$ipcr = $request->input('ipcr55_id');
		$existTask = Tasks55::where('targets55_id',decrypt($id))->count();
		
		if(!Guard::allows('targets55_edit')){
   			return abort(404);
   		}

		//update or add task
		$task_id = $request->input('task_id');
		$task_name = $request->input('task_accomplishments');
		$percent = $request->input('percent_completed');
		$weight = $request->input('weight');
		$targetstart = $request->input('target_start');
		$targetend = $request->input('target_end');
		$actualstart = $request->input('actual_start');
		$actualend = $request->input('actual_end');
		$actualverification = $request->input('actual_verification');
		$rowcount = count($task_id);
		$taskcount = count($task_name);



		if($taskcount>$existTask)
		{
			// additional task
			
	        for ($i=$existTask; $i < $taskcount; $i++) {

	        	$newTask = new Tasks55();
		        $newTask->name = $task_name[$i];
		       	
		       	$newTask->duration_s = date("Y-m-d H:i:s", strtotime($targetstart[$i]));
		        $newTask->duration_e = date("Y-m-d H:i:s", strtotime($targetend[$i]));
		        $newTask->targets55_id = decrypt($id);
		        $newTask->actualdate_s = date("Y-m-d H:i:s", strtotime($actualstart[$i]));
		        $newTask->actualdate_e = date("Y-m-d H:i:s", strtotime($actualend[$i]));
		        $newTask->percent_completed = $percent_completed[$i];
		        if ( !isset($weight[$i])) {
				  $weight[$i] = null;
				}
		       	$newTask->weight = $weight[$i];
		        $newTask->actual_verification = $actualverification[$i];
		        $newTask->status_id = 2;
		        $newTask->save();

	        }

		}else 
		{
			//update task only
			for ($i=0; $i < $rowcount; $i++) {
	    		$taskId =  $task_id[$i];

	    		$taskpercentage = ($weight[$i]/100)*$percent[$i];

	    		Tasks55::where('id', $taskId)
	                        ->update([
	                            'percent_completed' =>  $percent[$i], 
	                            'actual_verification' => $verification[$i],
	                            'actualdate_s' => $startdate[$i],
	                            'actualdate_e' => $enddate[$i],
	                            'percent' =>  $taskpercentage, 
	                            
	                        ]);
	    	}

	        $gettask = Tasks55::where('targets55_id',decrypt($id))->get();
			$percenttarget = collect($gettask)->sum('percent');

	        Targets55::where('id', decrypt($id))
	                            ->update([
	                                'percent' =>  $percenttarget, 
	                            ]);
		}
		
        	
		Session::flash('updated', "A record has been updated");
		// return redirect()->route('admin'.'.targets55.index');
		return redirect()->route('admin'.'.accomplishments/',encrypt($ipcr));

	}

	public function update($id,Request $request)
	{
		// $task_id = $request->input('task_id');
		// $task = $request->input('weight');
		// return $task[0];
		// $ddate = "2020-03-20";
		// $date = new DateTime($ddate);
		// $week = $date->format("W");
		// $year = $date->format("Y");
		// $targetdate = $year.'-W'.$week;
		// return "update";

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
		$evaluation = $request->input('evaluation');
		
		// $percent = $request->input('percent_completed');
		$verification = $request->input('means_verification');
		$startdate = $request->input('start_date');
		$enddate = $request->input('end_date');
		// $targetweek = $request->input('targetweek');
		$rowcount = count($task);
		// return $rowcount;
		// return $targetweek[0];

		if ($rowcount >$existTask){
			//add
			for ($i=$existTask; $i < $rowcount; $i++) {
				// $week_year = $request->input('targetweek');
				// $week = substr($week_year[$i], strpos($week_year[$i], "W") + 1);   
				// $year = strtok($week_year[$i], '-');
				// $dto = new DateTime();
				// $start_date = $dto->setISODate($year, $week)->format('Y-m-d');
				// $start_end = $dto->modify('+4 days')->format('Y-m-d');

		  

	        	$newTask = new Tasks55();
		        $newTask->name = $task[$i];
		        if ( !isset($weight[$i])) {
				  $weight[$i] = null;
				}
		        $newTask->weight = $weight[$i];
		        // $newTask->percent_completed = $percent[$i];
		        $newTask->means_verification = $verification[$i];
		        $newTask->targets55_id = decrypt($id);
		        $newTask->duration_s = $startdate[$i];
		        $newTask->duration_e = $enddate[$i];
		        // $newTask->active = $week;
		        $newTask->save();
        	}

		}
		else {
			//update
			for ($i=0; $i < $rowcount; $i++) {
        		$taskId =  $task_id[$i];

	        	if($startdate[$i]=="" && $enddate[$i]==""){
	        		Tasks55::where('id', $taskId)
	                            ->update([
	                                'name' =>  $task[$i],
	                                // 'weight' => $weight[$i], 
	                                // 'evaluation' => $evaluation[$i], 
	                                // 'percent_completed' =>  $percent[$i], 
	                                'means_verification' => $verification[$i],
	                            ]);
	        	}else{
	    //     		$week_year = $request->input('targetweek');
					// $week = substr($week_year[$i], strpos($week_year[$i], "W") + 1);   
					// $year = strtok($week_year[$i], '-');
					// $dto = new DateTime();
					// $start_date = $dto->setISODate($year, $week)->format('Y-m-d');
					// $start_end = $dto->modify('+4 days')->format('Y-m-d');

					
	        		Tasks55::where('id', $taskId)
	                            ->update([
	                                'name' =>  $task[$i],
	                                // 'weight' => $weight[$i], 
	                                // 'percent_completed' =>  $percent[$i], 
	                                'means_verification' => $verification[$i],
	                                'duration_s' => $startdate[$i],
	                                'duration_e' => $enddate[$i],
	                                // 'active' => $week,
	                            ]);
	        	}

	        	

        	}
		}


		Session::flash('updated', "A record has been updated");
		// return redirect()->route('admin'.'.targets55.index');
		return redirect()->route('admin'.'.ipcr55.show',encrypt($ipcr));
	}

	public function updateverifysenior($id,Request $request)
	{
		
		$ipcr = $request->input('ipcr55_id');
		$existTask = Tasks55::where('targets55_id',decrypt($id))->count();
		// return $existTask;
		if(!Guard::allows('targets55_edit')){
   			return abort(404);
   		}
		$targets55 = Targets55::findOrFail(decrypt($id));

		//update or add task
		$task_id = $request->input('task_id');
		$task = $request->input('task_name');
		$weight = $request->input('weight');
		$evaluation = $request->input('evaluation');
		
		
		$verification = $request->input('means_verification');
		$startdate = $request->input('start_date');
		$enddate = $request->input('end_date');
		
		$rowcount = count($task);
	
		if ($rowcount >$existTask){
			//add
			for ($i=$existTask; $i < $rowcount; $i++) {
				

	        	$newTask = new Tasks55();
		        $newTask->name = $task[$i];
		        
		        $newTask->means_verification = $verification[$i];
		        $newTask->targets55_id = decrypt($id);
		        $newTask->duration_s = $startdate[$i];
		        $newTask->duration_e = $enddate[$i];
		        
		        $newTask->save();
        	}

		}
		else {
			//update
			for ($i=0; $i < $rowcount; $i++) {
        		$taskId =  $task_id[$i];

	        	if($startdate[$i]=="" && $enddate[$i]==""){
	        		Tasks55::where('id', $taskId)
	                            ->update([
	                                // 'name' =>  $task[$i],
	                                'weight' => $weight[$i], 
	                                'evaluation' => $evaluation[$i], 
	                                // 'percent_completed' =>  $percent[$i], 
	                                // 'means_verification' => $verification[$i],
	                            ]);
	        	}else{
	      		
	        		Tasks55::where('id', $taskId)
	                            ->update([
	                                 'weight' => $weight[$i], 
	                                'evaluation' => $evaluation[$i],
	                            ]);
	        	}

	        	

        	}
		}


		Session::flash('updated', "A record has been updated");
		// return redirect()->route('admin'.'.targets55.index');
		return redirect()->route('admin'.'.showdivision/',encrypt($ipcr));
	}

	public function updateverifysenioraccomplishments($id,Request $request)
	{
		// return "verify";
		
		
		$ipcr = $request->input('ipcr55_id');

		$existTask = Tasks55::where('targets55_id',decrypt($id))->count();
		
		if(!Guard::allows('targets55_edit')){
   			return abort(404);
   		}

		//update or add task
		$task_id = $request->input('task_id');
		
		$evaluation = $request->input('evaluation');
		$weight = $request->input('weight');
		$percent_completed = $request->input('percent_completed');
		$rowcount = count($evaluation);
		
		//update
		for ($i=0; $i < $rowcount; $i++) {
    		$taskId =  $task_id[$i];

    		if(Auth::user()->roles55_id=="4"){
    			Tasks55::where('id', $taskId)
                        ->update([
                            
                            'chief_accomplishmentremarks' =>  $evaluation[$i], 
                            
                        ]);

    		}else {

	    		$taskId =  $task_id[$i];

	    		$taskpercentage = ($weight[$i]/100)*$percent_completed[$i];

	    		Tasks55::where('id', $taskId)
                        ->update([
                            
                            'senior_accomplishmentremarks' =>  $evaluation[$i], 
                            'weight' =>  $weight[$i], 
                            'percent' =>  $taskpercentage, 
                            
                        ]);


		        $gettask = Tasks55::where('targets55_id',decrypt($id))->get();
				$percenttarget = collect($gettask)->sum('percent');

		        Targets55::where('id', decrypt($id))
		                            ->update([
		                                'percent' =>  $percenttarget, 
		                            ]);

	    		}

        	

    	}

		Session::flash('updated', "A record has been updated");
		// return redirect()->route('admin'.'.targets55.index');
		return redirect()->route('admin'.'.showaccomplishment_division/',encrypt($ipcr));
	}

	public function updateverifydivisionhead($id,Request $request)
	{
		
		$ipcr = $request->input('ipcr55_id');
		$existTask = Tasks55::where('targets55_id',decrypt($id))->count();
		// return $existTask;
		if(!Guard::allows('targets55_edit')){
   			return abort(404);
   		}
		$targets55 = Targets55::findOrFail(decrypt($id));

		//update or add task
		$task_id = $request->input('task_id');
		$task = $request->input('task_name');
		$weight = $request->input('weight');
		$evaluation = $request->input('evaluation');
		
		
		$verification = $request->input('means_verification');
		$startdate = $request->input('start_date');
		$enddate = $request->input('end_date');
		
		$rowcount = count($task);
	
		if ($rowcount >$existTask){
			//add
			for ($i=$existTask; $i < $rowcount; $i++) {
				

	        	$newTask = new Tasks55();
		        $newTask->name = $task[$i];
		        
		        $newTask->means_verification = $verification[$i];
		        $newTask->targets55_id = decrypt($id);
		        $newTask->duration_s = $startdate[$i];
		        $newTask->duration_e = $enddate[$i];
		        
		        $newTask->save();
        	}

		}
		else {
			//update
			for ($i=0; $i < $rowcount; $i++) {
        		$taskId =  $task_id[$i];

	        	if($startdate[$i]=="" && $enddate[$i]==""){
	        		Tasks55::where('id', $taskId)
	                            ->update([
	                                
	                                'evaluation_divhead' => $evaluation[$i], 
	                               
	                            ]);
	        	}else{
	      		
	        		Tasks55::where('id', $taskId)
	                            ->update([
	                                'evaluation_divhead' => $evaluation[$i], 
	                            ]);
	        	}

	        	

        	}
		}


		Session::flash('updated', "A record has been updated");
		// return redirect()->route('admin'.'.targets55.index');
		return redirect()->route('admin'.'.showdivision/',encrypt($ipcr));
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
