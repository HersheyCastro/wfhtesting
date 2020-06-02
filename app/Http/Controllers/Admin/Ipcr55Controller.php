<?php

namespace App\Http\Controllers\Admin;

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
use Auth;

use App\Targets55;
use App\Http\Requests\CreateTargets55Request;
use App\Http\Requests\UpdateTargets55Request;
use App\Users55;
use App\SuccessIndicators55;
use App\Tasks55;
use DB;
use App\StrategicObjectives55;
use App\Ipcr_users;
use DateTime;



class Ipcr55Controller extends Controller {


	/**
	 * Display a listing of ipcr55
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function indexdivision(Request $request)
    {
    	// return "hi";
    		if(!Guard::allows('ipcr55_access')){
    		return abort(404);
    	}
    
    	$division_id = Auth::user()->division_id;
    	$mytime = Carbon::now();
		$ddate =$mytime;
		$date = new DateTime($ddate);
		$week = $date->format("W");

    	if(Auth::user()->roles55_id=="6"){
        	

        	$ipcr55= DB::select("SELECT DISTINCT 
								I1.id as id,
                                I1.ipcr_name as ipcr_name,
								I1.semester as semester,
								I1.year as year,
								I1.updated_at as updated_at,
								I1.active as active,
								I1.created_at as created_at,
								I5.status_name as status_name
								FROM ipcr55 I1 LEFT JOIN users55 I2 ON I1.user_id = I2.id 
								LEFT JOIN targets55 I3 ON I3.ipcr55_id = I1.id
								LEFT JOIN tasks55 I4 ON I4.targets55_id = I3.id 
								LEFT JOIN status55 I5 ON  I1.status55_id = I5.id
								WHERE I1.status55_id = 6 and I2.roles55_id = 4 and I3.deleted_at IS NULL");
        }elseif(Auth::user()->roles55_id=="4") {

        	$ipcr55= DB::select("SELECT DISTINCT 
								I1.id as id,
                                I1.ipcr_name as ipcr_name,
								I1.semester as semester,
								I1.year as year,
								I1.updated_at as updated_at,
								I1.active as active,
								I1.created_at as created_at,
								I5.status_name as status_name
								FROM ipcr55 I1 LEFT JOIN users55 I2 ON I1.user_id = I2.id 
								LEFT JOIN targets55 I3 ON I3.ipcr55_id = I1.id
								LEFT JOIN tasks55 I4 ON I4.targets55_id = I3.id 
								LEFT JOIN status55 I5 ON  I1.status55_id = I5.id
								WHERE I2.division_id = $division_id  and I1.status55_id = 1 and I2.roles55_id != 4 and I3.deleted_at IS NULL");

        }elseif(Auth::user()->roles55_id=="7"){
        	$ipcr55= DB::select("SELECT DISTINCT 
								I1.id as id,
                                I1.ipcr_name as ipcr_name,
								I1.semester as semester,
								I1.year as year,
								I1.updated_at as updated_at,
								I1.active as active,
								I1.created_at as created_at,
								I5.status_name as status_name
								FROM ipcr55 I1 LEFT JOIN users55 I2 ON I1.user_id = I2.id 
								LEFT JOIN targets55 I3 ON I3.ipcr55_id = I1.id
								LEFT JOIN tasks55 I4 ON I4.targets55_id = I3.id 
								LEFT JOIN status55 I5 ON  I1.status55_id = I5.id
								WHERE I2.division_id = $division_id  and I1.status55_id = 4 and I2.roles55_id != 4 and I2.roles55_id != 7 and I3.deleted_at IS NULL");

        }

    	

       
       // return $ipcr55;
        

		if(Input::has('fstatus55_id')) { //relationship
		    $status55_data =  Input::get('fstatus55_id');

		    if(!$status55_data == ''){
		        $ipcr55 = $ipcr55->whereHas('status55', function ($query) use($status55_data)  {
		            return $query->where('status55_id', $status55_data);
		        });
		    }

		}


        ///filter fields
        $status55 = Status55::pluck("status_name", "id");

        
		return view('admin.ipcr55.ipcrIndex', compact('ipcr55', "status55"));
		// return view('admin.ipcr55.index', compact('ipcr55', "status55"));
    }

    public function divisionaccomplishment(Request $request)
    {
    	// return "hi";

    		if(!Guard::allows('ipcr55_access')){
    		return abort(404);
    	}
    	$monday = date( 'Y-m-d', strtotime( 'monday this week' ) );
		$friday = date( 'Y-m-d', strtotime( 'friday this week' ) );

		
    
    	$division_id = Auth::user()->division_id;
    	$mytime = Carbon::now();
		$ddate =$mytime;
		$date = new DateTime($ddate);
		$week = $date->format("W");

    	if(Auth::user()->roles55_id=="6"){
        	

        	$ipcr55= DB::select("SELECT DISTINCT 
								I1.id as id,
                                I1.ipcr_name as ipcr_name,
								I1.semester as semester,
								I1.year as year,
								I1.updated_at as updated_at,
								I1.active as active,
								I1.created_at as created_at,
								I5.status_name as status_name
								FROM ipcr55 I1 LEFT JOIN users55 I2 ON I1.user_id = I2.id 
								LEFT JOIN targets55 I3 ON I3.ipcr55_id = I1.id
								LEFT JOIN tasks55 I4 ON I4.targets55_id = I3.id 
								LEFT JOIN status55 I5 ON  I1.status55_id = I5.id
								WHERE I1.status55_id = 1 and I2.roles55_id = 4 and I4.active=$week and I3.deleted_at IS NULL");
        }elseif(Auth::user()->roles55_id=="4") {

        	$ipcr55= DB::select("SELECT DISTINCT 
        						I1.id as id,
                                I1.ipcr_name as ipcr_name,
                                I1.semester as semester,
								I1.year as year,
								I1.updated_at as updated_at,
								I1.active as active,
								I1.created_at as created_at
								FROM ipcr55 I1 LEFT JOIN users55 I2 ON I1.user_id = I2.id 
								LEFT JOIN targets55 I3 ON I3.ipcr55_id = I1.id
								LEFT JOIN tasks55 I4 ON I4.targets55_id = I3.id 
								WHERE I2.division_id = $division_id  and I4.status_id = 1 and I2.roles55_id != 4 and I3.deleted_at IS NULL and I4.deleted_at IS NULL");

        }elseif(Auth::user()->roles55_id=="7"){
        	$ipcr55= DB::select("SELECT DISTINCT 
        						I1.id as id,
                                I1.ipcr_name as ipcr_name,
                                I1.semester as semester,
								I1.year as year,
								I1.updated_at as updated_at,
								I1.active as active,
								I1.created_at as created_at
								FROM ipcr55 I1 LEFT JOIN users55 I2 ON I1.user_id = I2.id 
								LEFT JOIN targets55 I3 ON I3.ipcr55_id = I1.id
								LEFT JOIN tasks55 I4 ON I4.targets55_id = I3.id 
								WHERE I2.division_id = $division_id  and I4.status_id = 4 and I2.roles55_id != 4 and I2.roles55_id != 7 and I3.deleted_at IS NULL and I4.deleted_at IS NULL");

        	// return $ipcr55;

        }

    	

       
       // return $ipcr55;
        

		if(Input::has('fstatus55_id')) { //relationship
		    $status55_data =  Input::get('fstatus55_id');

		    if(!$status55_data == ''){
		        $ipcr55 = $ipcr55->whereHas('status55', function ($query) use($status55_data)  {
		            return $query->where('status55_id', $status55_data);
		        });
		    }

		}


        ///filter fields
        $status55 = Status55::pluck("status_name", "id");

        
		return view('admin.ipcr55.indexdivisionaccomplishment', compact('ipcr55', "status55"));
    }

	public function index(Request $request)
    {
    	if(!Guard::allows('ipcr55_access')){
    		return abort(404);
    	}
    	// $division_id = Auth::user()->division_id;
    	

        
        	$ipcr55 = Ipcr55::where("user_id",Auth::user()->id);
  			$ipcr55 = $ipcr55->get();
  
        

		if(Input::has('fstatus55_id')) { //relationship
		    $status55_data =  Input::get('fstatus55_id');

		    if(!$status55_data == ''){
		        $ipcr55 = $ipcr55->whereHas('status55', function ($query) use($status55_data)  {
		            return $query->where('status55_id', $status55_data);
		        });
		    }

		}


        ///filter fields
        $status55 = Status55::pluck("status_name", "id");

        // if(Auth::user()->roles55_id=="4" || Auth::user()->roles55_id=="6"){
        // 	return view('admin.ipcr55.ipcrIndex', compact('ipcr55', "status55"));
        // }
		return view('admin.ipcr55.index', compact('ipcr55', "status55"));
	}

	public function indexaccomplishments(Request $request)
    {
    	if(!Guard::allows('ipcr55_access')){
    		return abort(404);
    	}
    	// $division_id = Auth::user()->division_id;
    	

        
     //    	$ipcr55 = Ipcr55::where("user_id",Auth::user()->id);
  			// $ipcr55 = $ipcr55->get();

		$ipcr55 = Ipcr55::where([
				       'user_id' => Auth::user()->id,
				       'status55_id' => 2,
				      
				])->get();
  
        

		if(Input::has('fstatus55_id')) { //relationship
		    $status55_data =  Input::get('fstatus55_id');

		    if(!$status55_data == ''){
		        $ipcr55 = $ipcr55->whereHas('status55', function ($query) use($status55_data)  {
		            return $query->where('status55_id', $status55_data);
		        });
		    }

		}


        ///filter fields
        $status55 = Status55::pluck("status_name", "id");

        // if(Auth::user()->roles55_id=="4" || Auth::user()->roles55_id=="6"){
        // 	return view('admin.ipcr55.ipcrIndex', compact('ipcr55', "status55"));
        // }
		return view('admin.ipcr55.indexaccomplishments', compact('ipcr55', "status55"));
	}

	public function accomplishments($id,Request $request)
    {
    	if(!Guard::allows('ipcr55_view')){
			return abort(404);
		}
		// ---------------
		if(!Guard::allows('targets55_create')){
			return abort(404);
		}
	    $users55 = Users55::pluck("firstname", "id");
		// $successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id",);
		$successindicators55 = SuccessIndicators55::all();
		$strategicobjectives = StrategicObjectives55::all();
		

		$ipcr55 = Ipcr55::find(decrypt($id));
		$status55 = Status55::pluck("status_name", "id");
		$targets = Targets55::where('ipcr55_id',decrypt($id))->orderBy('successindicators55_id')->get();
		
		$id = decrypt($id);
		// return $id;

		$mytime = Carbon::now();
		$ddate =$mytime;
		$date = new DateTime($ddate);
		$weekfromform = $date->format("W");
		// return $week;
		if($request->input('targetweekform')==""){
			// return "null";
			$weekfromform = $weekfromform;
			$tasks =DB::select("SELECT  
								T4.strategicobjectives55_id as SO,
                                T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.id as tasks_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
			 					T2.actual_verification as actual_verification,
			 					T2.evaluation as evaluation,
								T3.id as ipcr_id,
								T2.active as week,
                                T5.strategic_objective_name as SOname,
                                T4.success_indicator_name as SIname
								FROM tasks55 T2 LEFT JOIN targets55 T1 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
                                LEFT JOIN successindicators55 T4 ON
                                T1.successindicators55_id = T4.id
                                LEFT JOIN strategicobjectives55 T5 ON T4.strategicobjectives55_id = T5.id
								WHERE T1.ipcr55_id = $id and T2.deleted_at IS NULL and T1.deleted_at IS NULL order by SO, SI, targets
								");
			$tasks = collect($tasks);

			$rowSOcount = DB::select("select count(so) as so_count, so as so_id from (SELECT  
								T4.strategicobjectives55_id as SO,
                                T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.id as tasks_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
			 					T2.actual_verification as actual_verification,
			 					T2.evaluation as evaluation,
								T3.id as ipcr_id,
								T2.active as week
								FROM tasks55 T2 LEFT JOIN targets55 T1 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
                                LEFT JOIN successindicators55 T4 ON T1.successindicators55_id = T4.id
								WHERE T1.ipcr55_id = $id and T2.deleted_at IS NULL and T1.deleted_at IS NULL order by SO, SI, targets) ipcrtable group by SO
								");



			$rowSOcount = collect($rowSOcount);

			foreach($rowSOcount as $rowso) {
				$so_row[$rowso->so_id] = $rowso->so_count;
			}


			$rowSIcount = DB::select("select count(SI) as si_count, SI as si_id from (SELECT  
								T4.strategicobjectives55_id as SO,
                                T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.id as tasks_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
			 					T2.actual_verification as actual_verification,
			 					T2.evaluation as evaluation,
								T3.id as ipcr_id,
								T2.active as week
								FROM tasks55 T2 LEFT JOIN targets55 T1 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
                                LEFT JOIN successindicators55 T4 ON T1.successindicators55_id = T4.id
								WHERE T1.ipcr55_id = $id and T2.deleted_at IS NULL and T1.deleted_at IS NULL order by SO, SI, targets) ipcrtable group by SI
								");



			$rowSIcount = collect($rowSIcount);

			foreach($rowSIcount as $rowsi) {
				$si_row[$rowsi->si_id] = $rowsi->si_count;
			}

			// return $so_row;

		}else {
			// return "not null";
			$week_year = $request->input('targetweekform');
			$week = substr($week_year, strpos($week_year, "W") + 1);   
			$weekfromform = $week;
			// return $week;
			$tasks =DB::select("SELECT  
								T4.strategicobjectives55_id as SO,
                                T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.id as tasks_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
			 					T2.actual_verification as actual_verification,
			 					T2.evaluation as evaluation,
								T3.id as ipcr_id,
								T2.active as week,
                                T5.strategic_objective_name as SOname,
                                T4.success_indicator_name as SIname
								FROM tasks55 T2 LEFT JOIN targets55 T1 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
                                LEFT JOIN successindicators55 T4 ON
                                T1.successindicators55_id = T4.id
                                LEFT JOIN strategicobjectives55 T5 ON T4.strategicobjectives55_id = T5.id
								WHERE T1.ipcr55_id = $id and T2.deleted_at IS NULL and T1.deleted_at IS NULL and T2.active=$weekfromform order by SO, SI, targets

								");
			$tasks = collect($tasks);

			$rowSOcount = DB::select("select count(so) as so_count, so as so_id from (SELECT  
								T4.strategicobjectives55_id as SO,
                                T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.id as tasks_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
			 					T2.actual_verification as actual_verification,
			 					T2.evaluation as evaluation,
								T3.id as ipcr_id,
								T2.active as week
								FROM tasks55 T2 LEFT JOIN targets55 T1 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
                                LEFT JOIN successindicators55 T4 ON T1.successindicators55_id = T4.id
								WHERE T1.ipcr55_id = $id and T2.deleted_at IS NULL and T1.deleted_at IS NULL and T2.active=$weekfromform order by SO, SI, targets) ipcrtable group by SO
								");



			$rowSOcount = collect($rowSOcount);

			foreach($rowSOcount as $rowso) {
				$so_row[$rowso->so_id] = $rowso->so_count;
			}


			$rowSIcount = DB::select("select count(SI) as si_count, SI as si_id from (SELECT  
								T4.strategicobjectives55_id as SO,
                                T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.id as tasks_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
			 					T2.actual_verification as actual_verification,
			 					T2.evaluation as evaluation,
								T3.id as ipcr_id,
								T2.active as week
								FROM tasks55 T2 LEFT JOIN targets55 T1 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
                                LEFT JOIN successindicators55 T4 ON T1.successindicators55_id = T4.id
								WHERE T1.ipcr55_id = $id and T2.deleted_at IS NULL and T1.deleted_at IS NULL and T2.active=$weekfromform order by SO, SI, targets) ipcrtable group by SI
								");



			$rowSIcount = collect($rowSIcount);

			foreach($rowSIcount as $rowsi) {
				$si_row[$rowsi->si_id] = $rowsi->si_count;
			}


		}
		// return $weekfromform;



		
		

		
		// $view = "view";
		return view('admin.ipcr55.accomplishments', compact('ipcr55', "status55","users55","successindicators55","targets","tasks","strategicobjectives","so_row","si_row"));
	}

	/**
	 * Show the form for creating a new ipcr55
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
		// return "create";

		if(!Guard::allows('ipcr55_create')){
			return abort(404);
		}
	    $status55 = Status55::pluck("status_name", "id");

	    if(Auth::user()->roles55_id=="4"){
        	return view('admin.ipcr55.ipcrCreate', compact("status55"));
        }

        if(Auth::user()->roles55_id=="6"){
        	return view('admin.ipcr55.opcrCreate', compact("status55"));
        }

	    return view('admin.ipcr55.create', compact("status55"));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id,Request $request)
	{
		// return decrypt($id);
		
		if(!Guard::allows('ipcr55_view')){
			return abort(404);
		}
		// ---------------
		if(!Guard::allows('targets55_create')){
			return abort(404);
		}
	    $users55 = Users55::pluck("firstname", "id");
		// $successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id",);
		$successindicators55 = SuccessIndicators55::all();
		$strategicobjectives = StrategicObjectives55::all();
		


		$ipcr55 = Ipcr55::find(decrypt($id));
		// return $ipcr55;
		$status55 = Status55::pluck("status_name", "id");
		$targets = Targets55::where('ipcr55_id',decrypt($id))->orderBy('successindicators55_id')->get();
		
		$id = decrypt($id);
		// return $id;

		$mytime = Carbon::now();
		$ddate =$mytime;
		$date = new DateTime($ddate);
		$weekfromform = $date->format("W");
		
			
			$tasks =DB::select("SELECT  
								T4.strategicobjectives55_id as SO,
                                T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.id as tasks_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
			 					T2.evaluation as evaluation,
								T3.id as ipcr_id,
								T2.active as week,
                                T5.strategic_objective_name as SOname,
                                T4.success_indicator_name as SIname,
                                T2.evaluation_divhead as evaluation_divhead
								FROM tasks55 T2 LEFT JOIN targets55 T1 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
                                LEFT JOIN successindicators55 T4 ON T1.successindicators55_id = T4.id
                                LEFT JOIN strategicobjectives55 T5 ON T4.strategicobjectives55_id = T5.id
								WHERE T1.ipcr55_id = $id and T2.deleted_at IS NULL and T1.deleted_at IS NULL order by SO, SI, targets
								");
			$tasks = collect($tasks);

			

			$rowSOcount = DB::select("select count(so) as so_count, so as so_id from (SELECT  
								T4.strategicobjectives55_id as SO,
                                T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.id as tasks_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
			 					T2.evaluation as evaluation,
								T3.id as ipcr_id,
								T2.active as week,
                                T2.evaluation_divhead as evaluation_divhead
								FROM tasks55 T2 LEFT JOIN targets55 T1 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
                                LEFT JOIN successindicators55 T4 ON T1.successindicators55_id = T4.id
								WHERE T1.ipcr55_id = $id and T2.deleted_at IS NULL and T1.deleted_at IS NULL order by SO, SI, targets) ipcrtable group by SO
								");



			$rowSOcount = collect($rowSOcount);

			if($rowSOcount->count()==0){
				$so_row=0;
			}

			foreach($rowSOcount as $rowso) {
				$so_row[$rowso->so_id] = $rowso->so_count;
			}




			$rowSIcount = DB::select("select count(SI) as si_count, SI as si_id from (SELECT  
								T4.strategicobjectives55_id as SO,
                                T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.id as tasks_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
			 					T2.evaluation as evaluation,
								T3.id as ipcr_id,
								T2.active as week,
                                T2.evaluation_divhead as evaluation_divhead
								FROM tasks55 T2 LEFT JOIN targets55 T1 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
                                LEFT JOIN successindicators55 T4 ON T1.successindicators55_id = T4.id
								WHERE T1.ipcr55_id = $id and T2.deleted_at IS NULL and T1.deleted_at IS NULL order by SO, SI, targets) ipcrtable group by SI
								");



			$rowSIcount = collect($rowSIcount);

			if($rowSIcount->count()==0){
				$si_row=0;
			}

			foreach($rowSIcount as $rowsi) {
				$si_row[$rowsi->si_id] = $rowsi->si_count;
			}

			// return $so_row;


		// $view = "view";
		return view('admin.ipcr55.show', compact('ipcr55', "status55","users55","successindicators55","targets","tasks","strategicobjectives","so_row","si_row","id"));
	}




	/**
	 * Store a newly created ipcr55 in storage.
	 *
     * @param CreateIpcr55Request|Request $request
     * @return mixed
	 */
	public function store(CreateIpcr55Request $request)
	{
		// return "hello";
		
		
		if(!Guard::allows('ipcr55_create')){
			return abort(404);
		} 
	    
		// $ipcr=Ipcr55::create($request->all());
		$ipcr = new Ipcr55();
        $ipcr->ipcr_name = $request->input('ipcr_name');
        $ipcr->semester = $request->input('semester');
        $ipcr->status55_id = 5;
        $ipcr->user_id = Auth::user()->id;
        $ipcr->year = $request->year;
        $ipcr->active = $request->active;
        $ipcr->save();

       	$division_id = Auth::user()->division_id;

    	$mytime = Carbon::now();
		$ddate =$mytime;
		$date = new DateTime($ddate);
		$week = $date->format("W");

        if(Auth::user()->roles55_id=="4" || Auth::user()->roles55_id=="6" ){

        	if(Auth::user()->roles55_id=="4"){
			$targets =DB::select("SELECT DISTINCT 
		                                T3.id,
		                                T3.name,
		                                T3.users55_id,
		                                T3.duration_s,
		                                T3.duration_e,
		                                T3.active,
		                                T3.successindicators55_id,
		                                T3.ipcr55_id
										FROM ipcr55 T1 LEFT JOIN users55 T2 ON T1.user_id = T2.id 
		                                LEFT JOIN targets55 T3 ON T3.ipcr55_id = T1.id
		                                LEFT JOIN tasks55 T4 ON T4.targets55_id = T3.id
										WHERE T2.division_id = $division_id  and T1.status55_id = 2 and T3.deleted_at IS NULL and T2.roles55_id != 4 and T1.year = 2020 and T1.semester = 1
										");
			}else{
				$targets =DB::select("SELECT DISTINCT 
		                                T3.id,
		                                T3.name,
		                                T3.users55_id,
		                                T3.duration_s,
		                                T3.duration_e,
		                                T3.active,
		                                T3.successindicators55_id,
		                                T3.ipcr55_id
										FROM ipcr55 T1 LEFT JOIN users55 T2 ON T1.user_id = T2.id 
		                                LEFT JOIN targets55 T3 ON T3.ipcr55_id = T1.id
		                                LEFT JOIN tasks55 T4 ON T4.targets55_id = T3.id
										WHERE T1.status55_id = 6 and T3.deleted_at IS NULL and T2.roles55_id = 4 and T1.year = 2020 and T1.semester = 1
								");
			}

        	$rowtargets = count($targets);
        	

        	for($i=0;$i<$rowtargets;$i++){
        		$targetChief = new Targets55();
		        $targetChief->name = $targets[$i]->name;
		        $targetChief->users55_id = Auth::user()->employee_id;
		        $targetChief->duration_s = $targets[$i]->duration_s;
		        $targetChief->duration_e = $targets[$i]->duration_e;
		        // $targetChief->active = $targets[$i]->active;
		        $targetChief->successindicators55_id = $targets[$i]->successindicators55_id;
		        $targetChief->ipcr55_id = $ipcr->id;
		        $targetChief->save();


		        $tasks = Tasks55::where("targets55_id",$targets[$i]->id)->get();

		        $rowtasks = count($tasks);

		        for($j=0;$j<$rowtasks;$j++){
		        	$taskChief = new Tasks55();
			        $taskChief->name = $tasks[$j]->name;
			        $taskChief->targets55_id = $targetChief->id;
			        $taskChief->duration_s = $tasks[$j]->duration_s;
			        $taskChief->duration_e = $tasks[$j]->duration_e;
			        $taskChief->percent_completed = $tasks[$j]->percent_completed;
			        $taskChief->active = $tasks[$j]->active;
			        $taskChief->weight = $tasks[$j]->weight;
			        $taskChief->means_verification = $tasks[$j]->means_verification;
			        $taskChief->evaluation = $tasks[$j]->evaluation;
			        $taskChief->save();
		        }
        	}



        }


		Session::flash('created', "A record has been created");
		return redirect()->route('admin'.'.ipcr55.index');
	}

	public function storedivisionaccomplishments(Request $request)
	{
		// return "hello";
		
		
		if(!Guard::allows('ipcr55_create')){
			return abort(404);
		} 
	    
		// $ipcr=Ipcr55::create($request->all());
		$ipcr = new Ipcr55();
        $ipcr->ipcr_name = $request->input('ipcr_name');
        $ipcr->semester = $request->input('semester');
        $ipcr->status55_id = 2;
        $ipcr->user_id = Auth::user()->id;
        $ipcr->year = $request->year;
        $ipcr->active = $request->active;
        $ipcr->save();

       	$division_id = Auth::user()->division_id;

    	$mytime = Carbon::now();
		$ddate =$mytime;
		$date = new DateTime($ddate);
		$week = $date->format("W");

        if(Auth::user()->roles55_id=="4" || Auth::user()->roles55_id=="6" ){

        	if(Auth::user()->roles55_id=="4"){
			$targets =DB::select("SELECT DISTINCT 
		                                T3.id,
		                                T3.name,
		                                T3.users55_id,
		                                T3.duration_s,
		                                T3.duration_e,
		                                T3.active,
		                                T3.successindicators55_id,
		                                T3.ipcr55_id,
		                                T3.percent
										FROM ipcr55 T1 LEFT JOIN users55 T2 ON T1.user_id = T2.id 
		                                LEFT JOIN targets55 T3 ON T3.ipcr55_id = T1.id
		                                LEFT JOIN tasks55 T4 ON T4.targets55_id = T3.id
										WHERE T2.division_id = $division_id  and T4.status_id = 2 and T3.deleted_at IS NULL and T2.roles55_id != 4 and T1.year = 2020 and T1.semester = 1
										");
			}else{
				$targets =DB::select("SELECT DISTINCT 
		                                T3.id,
		                                T3.name,
		                                T3.users55_id,
		                                T3.duration_s,
		                                T3.duration_e,
		                                T3.active,
		                                T3.successindicators55_id,
		                                T3.ipcr55_id,
		                                T3.percent
										FROM ipcr55 T1 LEFT JOIN users55 T2 ON T1.user_id = T2.id 
		                                LEFT JOIN targets55 T3 ON T3.ipcr55_id = T1.id
		                                LEFT JOIN tasks55 T4 ON T4.targets55_id = T3.id
										WHERE T1.status55_id = 6 and T3.deleted_at IS NULL and T2.roles55_id = 4 and T1.year = 2020 and T1.semester = 1
								");
			}

        	$rowtargets = count($targets);
        	

        	for($i=0;$i<$rowtargets;$i++){
        		$targetChief = new Targets55();
		        $targetChief->name = $targets[$i]->name;
		        $targetChief->users55_id = Auth::user()->employee_id;
		        $targetChief->duration_s = $targets[$i]->duration_s;
		        $targetChief->duration_e = $targets[$i]->duration_e;
		        // $targetChief->active = $targets[$i]->active;
		        $targetChief->successindicators55_id = $targets[$i]->successindicators55_id;
		        $targetChief->ipcr55_id = $ipcr->id;
		        $targetChief->percent = $targets[$i]->percent;
		        $targetChief->save();


		        $tasks = Tasks55::where("targets55_id",$targets[$i]->id)->get();

		        $rowtasks = count($tasks);

		        for($j=0;$j<$rowtasks;$j++){
		        	$taskChief = new Tasks55();
			        $taskChief->name = $tasks[$j]->name;
			        $taskChief->targets55_id = $targetChief->id;
			        $taskChief->duration_s = $tasks[$j]->duration_s;
			        $taskChief->duration_e = $tasks[$j]->duration_e;
			        $taskChief->percent_completed = $tasks[$j]->percent_completed;
			        $taskChief->active = $tasks[$j]->active;
			        $taskChief->weight = $tasks[$j]->weight;
			        $taskChief->means_verification = $tasks[$j]->means_verification;
			        $taskChief->actual_verification = $tasks[$j]->actual_verification;
			        $taskChief->evaluation = $tasks[$j]->evaluation;
			        $taskChief->save();

			        Tasks55::where('id', $tasks[$j]->id)
	                            ->update([
	                                'status_id' =>7,
	                                
	                            ]);
		        }
        	}



        }


		Session::flash('created', "A record has been created");
		// return redirect()->route('admin'.'.ipcr55.index');
		return redirect()->route('admin'.'.indexaccomplishments');
	}

	public function showDivision($id,Request $request)
	{
		// return "hi";
		if(!Guard::allows('ipcr55_view')){
			return abort(404);
		}
		// ---------------
		if(!Guard::allows('targets55_create')){
			return abort(404);
		}
	    $users55 = Users55::pluck("firstname", "id");
		// $successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id",);
		$successindicators55 = SuccessIndicators55::all();
		$strategicobjectives = StrategicObjectives55::all();
		


		$ipcr55 = Ipcr55::find(decrypt($id));
		// return $ipcr55;
		$status55 = Status55::pluck("status_name", "id");
		$targets = Targets55::where('ipcr55_id',decrypt($id))->orderBy('successindicators55_id')->get();
		
		$id = decrypt($id);
		// return $id;

		$mytime = Carbon::now();
		$ddate =$mytime;
		$date = new DateTime($ddate);
		$weekfromform = $date->format("W");
		// return $week;
		if($request->input('targetweekform')==""){
			// return "null";
			$weekfromform = $weekfromform;
			$tasks =DB::select("SELECT  
								T4.strategicobjectives55_id as SO,
                                T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.id as tasks_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
			 					T2.evaluation as evaluation,
								T3.id as ipcr_id,
								T2.active as week,
								T2.evaluation_divhead as evaluation_divhead,
                                T5.strategic_objective_name as SOname,
                                T4.success_indicator_name as SIname
								FROM tasks55 T2 LEFT JOIN targets55 T1 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
                                LEFT JOIN successindicators55 T4 ON
                                T1.successindicators55_id = T4.id
                                LEFT JOIN strategicobjectives55 T5 ON T4.strategicobjectives55_id = T5.id
								WHERE T1.ipcr55_id = $id and T2.deleted_at IS NULL and T1.deleted_at IS NULL order by SO, SI, targets
								");
			$tasks = collect($tasks);

			$rowSOcount = DB::select("select count(so) as so_count, so as so_id from (SELECT  
								T4.strategicobjectives55_id as SO,
                                T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.id as tasks_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
			 					T2.evaluation as evaluation,
								T3.id as ipcr_id,
								T2.active as week,
								T2.evaluation_divhead as evaluation_divhead
								FROM tasks55 T2 LEFT JOIN targets55 T1 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
                                LEFT JOIN successindicators55 T4 ON T1.successindicators55_id = T4.id
								WHERE T1.ipcr55_id = $id and T2.deleted_at IS NULL and T1.deleted_at IS NULL order by SO, SI, targets) ipcrtable group by SO
								");



			$rowSOcount = collect($rowSOcount);

			foreach($rowSOcount as $rowso) {
				$so_row[$rowso->so_id] = $rowso->so_count;
			}


			$rowSIcount = DB::select("select count(SI) as si_count, SI as si_id from (SELECT  
								T4.strategicobjectives55_id as SO,
                                T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.id as tasks_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
			 					T2.evaluation as evaluation,
								T3.id as ipcr_id,
								T2.active as week,
								T2.evaluation_divhead as evaluation_divhead
								FROM tasks55 T2 LEFT JOIN targets55 T1 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
                                LEFT JOIN successindicators55 T4 ON T1.successindicators55_id = T4.id
								WHERE T1.ipcr55_id = $id and T2.deleted_at IS NULL and T1.deleted_at IS NULL order by SO, SI, targets) ipcrtable group by SI
								");



			$rowSIcount = collect($rowSIcount);

			foreach($rowSIcount as $rowsi) {
				$si_row[$rowsi->si_id] = $rowsi->si_count;
			}

			// return $so_row;

		}else {
			// return "not null";
			$week_year = $request->input('targetweekform');
			$week = substr($week_year, strpos($week_year, "W") + 1);   
			$weekfromform = $week;
			// return $week;
			$tasks =DB::select("SELECT  
								T4.strategicobjectives55_id as SO,
                                T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.id as tasks_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
			 					T2.evaluation as evaluation,
								T3.id as ipcr_id,
								T2.active as week,
								T2.evaluation_divhead as evaluation_divhead,
                                T5.strategic_objective_name as SOname,
                                T4.success_indicator_name as SIname
								FROM tasks55 T2 LEFT JOIN targets55 T1 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
                                LEFT JOIN successindicators55 T4 ON
                                T1.successindicators55_id = T4.id
                                LEFT JOIN strategicobjectives55 T5 ON T4.strategicobjectives55_id = T5.id
								WHERE T1.ipcr55_id = $id and T2.deleted_at IS NULL and T1.deleted_at IS NULL and T2.active=$weekfromform order by SO, SI, targets

								");
			$tasks = collect($tasks);

			$rowSOcount = DB::select("select count(so) as so_count, so as so_id from (SELECT  
								T4.strategicobjectives55_id as SO,
                                T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.id as tasks_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
			 					T2.evaluation as evaluation,
								T3.id as ipcr_id,
								T2.active as week,
								T2.evaluation_divhead as evaluation_divhead
								FROM tasks55 T2 LEFT JOIN targets55 T1 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
                                LEFT JOIN successindicators55 T4 ON T1.successindicators55_id = T4.id
								WHERE T1.ipcr55_id = $id and T2.deleted_at IS NULL and T1.deleted_at IS NULL and T2.active=$weekfromform order by SO, SI, targets) ipcrtable group by SO
								");



			$rowSOcount = collect($rowSOcount);

			foreach($rowSOcount as $rowso) {
				$so_row[$rowso->so_id] = $rowso->so_count;
			}


			$rowSIcount = DB::select("select count(SI) as si_count, SI as si_id from (SELECT  
								T4.strategicobjectives55_id as SO,
                                T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.id as tasks_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
			 					T2.evaluation as evaluation,
								T3.id as ipcr_id,
								T2.active as week,
								T2.evaluation_divhead as evaluation_divhead
								FROM tasks55 T2 LEFT JOIN targets55 T1 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
                                LEFT JOIN successindicators55 T4 ON T1.successindicators55_id = T4.id
								WHERE T1.ipcr55_id = $id and T2.deleted_at IS NULL and T1.deleted_at IS NULL and T2.active=$weekfromform order by SO, SI, targets) ipcrtable group by SI
								");



			$rowSIcount = collect($rowSIcount);

			foreach($rowSIcount as $rowsi) {
				$si_row[$rowsi->si_id] = $rowsi->si_count;
			}


		}

		if(Auth::user()->roles55_id=="7"){
			return view('admin.ipcr55.showipcrforsenior', compact('ipcr55', "status55","users55","successindicators55","targets","tasks","strategicobjectives","so_row","si_row","id"));
		}
		return view('admin.ipcr55.ipcrShow', compact('ipcr55', "status55","users55","successindicators55","targets","tasks","strategicobjectives"));
	}

	public function showaccomplishment_division($id,Request $request)
	{
		// return "hi";
		if(!Guard::allows('ipcr55_view')){
			return abort(404);
		}
		// ---------------
		if(!Guard::allows('targets55_create')){
			return abort(404);
		}
	    $users55 = Users55::pluck("firstname", "id");
		// $successindicators55 = SuccessIndicators55::pluck("success_indicator_name", "id",);
		$successindicators55 = SuccessIndicators55::all();
		$strategicobjectives = StrategicObjectives55::all();
		


		$ipcr55 = Ipcr55::find(decrypt($id));
		// return $ipcr55;
		$status55 = Status55::pluck("status_name", "id");
		$targets = Targets55::where('ipcr55_id',decrypt($id))->orderBy('successindicators55_id')->get();
		
		$id = decrypt($id);
		// return $id;

		$monday = date( 'Y-m-d', strtotime( 'monday this week' ) );
		$friday = date( 'Y-m-d', strtotime( 'friday this week' ) );

		

		if(Auth::user()->roles55_id=="7")
		{
			$taskstatus = 4;
		}elseif(Auth::user()->roles55_id=="4")
		{
			// return "cheif";
			$taskstatus = 1;
		}


		
		$tasks =DB::select("SELECT
								I6.strategicobjectives55_id as SO,
                                I3.successindicators55_id as SI,
								I3.name as targets,
								I3.id as targets_id,
								I4.id as tasks_id,
								I4.name as tasks,
								I4.weight as weight,
			 					I4.percent_completed as percent,
			 					I4.actual_verification as actual_verification,
			 					I4.senior_accomplishmentremarks as senior_accomplishmentremarks,
			 					I4.chief_accomplishmentremarks as chief_accomplishmentremarks,
								I1.id as ipcr_id,
								I4.evaluation_divhead as evaluation_divhead
								FROM ipcr55 I1 LEFT JOIN users55 I2 ON I1.user_id = I2.id 
								LEFT JOIN targets55 I3 ON I3.ipcr55_id = I1.id
								LEFT JOIN tasks55 I4 ON I4.targets55_id = I3.id 
								LEFT JOIN status55 I5 ON  I1.status55_id = I5.id
								LEFT JOIN successindicators55 I6 ON I3.successindicators55_id = I6.id
								WHERE I1.id = $id and I3.deleted_at IS NULL and I4.deleted_at IS NULL and I4.status_id= $taskstatus order by SO, SI, targets

							");
			$tasks = collect($tasks);

			$rowSOcount = DB::select("select count(so) as so_count, so as so_id from (SELECT
								I6.strategicobjectives55_id as SO,
                                I3.successindicators55_id as SI,
								I3.name as targets,
								I3.id as targets_id,
								I4.id as tasks_id,
								I4.name as tasks,
								I4.weight as weight,
			 					I4.percent_completed as percent,
			 					I4.actual_verification as actual_verification,
			 					I4.senior_accomplishmentremarks as senior_accomplishmentremarks,
			 					I4.chief_accomplishmentremarks as chief_accomplishmentremarks,
								I1.id as ipcr_id,
								I4.evaluation_divhead as evaluation_divhead
								FROM ipcr55 I1 LEFT JOIN users55 I2 ON I1.user_id = I2.id 
								LEFT JOIN targets55 I3 ON I3.ipcr55_id = I1.id
								LEFT JOIN tasks55 I4 ON I4.targets55_id = I3.id 
								LEFT JOIN status55 I5 ON  I1.status55_id = I5.id
								LEFT JOIN successindicators55 I6 ON I3.successindicators55_id = I6.id
								WHERE I1.id = $id and I3.deleted_at IS NULL and I4.deleted_at IS NULL and I4.status_id= $taskstatus order by SO, SI, targets) ipcrtable group by SO
								");



			$rowSOcount = collect($rowSOcount);

			foreach($rowSOcount as $rowso) {
				$so_row[$rowso->so_id] = $rowso->so_count;
			}


			$rowSIcount = DB::select("select count(SI) as si_count, SI as si_id from (SELECT
								I6.strategicobjectives55_id as SO,
                                I3.successindicators55_id as SI,
								I3.name as targets,
								I3.id as targets_id,
								I4.id as tasks_id,
								I4.name as tasks,
								I4.weight as weight,
			 					I4.percent_completed as percent,
			 					I4.actual_verification as actual_verification,
			 					I4.senior_accomplishmentremarks as senior_accomplishmentremarks,
			 					I4.chief_accomplishmentremarks as chief_accomplishmentremarks,
								I1.id as ipcr_id,
								I4.evaluation_divhead as evaluation_divhead
								FROM ipcr55 I1 LEFT JOIN users55 I2 ON I1.user_id = I2.id 
								LEFT JOIN targets55 I3 ON I3.ipcr55_id = I1.id
								LEFT JOIN tasks55 I4 ON I4.targets55_id = I3.id 
								LEFT JOIN status55 I5 ON  I1.status55_id = I5.id
								LEFT JOIN successindicators55 I6 ON I3.successindicators55_id = I6.id
								WHERE I1.id = $id and I3.deleted_at IS NULL and I4.deleted_at IS NULL and I4.status_id= $taskstatus order by SO, SI, targets) ipcrtable group by SI
								");



			$rowSIcount = collect($rowSIcount);

			foreach($rowSIcount as $rowsi) {
				$si_row[$rowsi->si_id] = $rowsi->si_count;
			}

		if(Auth::user()->roles55_id=="4"){
			return view('admin.ipcr55.showaccomplishmentforchief', compact('ipcr55', "status55","users55","successindicators55","targets","tasks","strategicobjectives","so_row","si_row","id"));
		}
		return view('admin.ipcr55.showaccomplishmentforsenior', compact('ipcr55', "status55","users55","successindicators55","targets","tasks","strategicobjectives","so_row","si_row","id"));
	}

	/**
	 * Show the form for editing the specified ipcr55.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		if(!Guard::allows('ipcr55_edit')){
   			return abort(404);
   		}
		$ipcr55 = Ipcr55::find(decrypt($id));
	    $status55 = Status55::pluck("status_name", "id");

	    
		return view('admin.ipcr55.edit', compact('ipcr55', "status55"));
	}

	/**
	 * Update the specified ipcr55 in storage.
     * @param UpdateIpcr55Request|Request $request
     *
	 * @param  int  $id
     * @return mixed
	 */
	public function update($id, UpdateIpcr55Request $request)
	{
		// return "update ipcr";
		if(!Guard::allows('ipcr55_edit')){
   			return abort(404);
   		}
		$ipcr55 = Ipcr55::findOrFail(decrypt($id));

        
		
		
		$ipcr55->update($request->all());
		Session::flash('updated', "A record has been updated");
		return redirect()->route('admin'.'.ipcr55.index');
	}

	public function updateStatus($id,Request $request)
	{
		// return "update status";
		$id = decrypt($id);
		$status = $request->input('statusofipcr');
		$ipcr = $request->input('ipcr_id');
		// return $ipcr;

		if($status=="verification"){
			Ipcr55::where('id', $id)
	                            ->update([
	                                'status55_id' =>4,
	                                
	                            ]);
		}elseif($status=="approval"){
			Ipcr55::where('id', $id)
	                            ->update([
	                                'status55_id' =>1,
	                                
	                            ]);

		}elseif($status=="submission"){
			Ipcr55::where('id', $id)
	                            ->update([
	                                'status55_id' =>6,
	                                
	                            ]);

		}elseif($status=="approve"){

			 $ipcr = Ipcr55::where('id',$id)->first();

			if(is_null($ipcr->origid)){
				Ipcr55::where('id', $id)
	                            ->update([
	                                'status55_id' =>2,
	                            ]);

			}else{
				Ipcr55::where('id', $id)
	                            ->update([
	                                'status55_id' =>2,
	                            ]);
				Targets55::where('ipcr55_id', $id)
	                            ->update([
	                                'ipcr55_id' => $ipcr->origid,
	                                
	                            ]);
	        	Ipcr55::destroy($id);

			}

			
	    }
		

		Session::flash('updated', "A record has been updated");
		return redirect()->route('admin'.'.ipcr55.index');
	}

	public function updatetaskStatus($id,Request $request)
	{
		// return "update status";
		$id = decrypt($id);
		$status = $request->input('statusofipcr');

		if(Auth::user()->roles55_id=="7")
		{
			$taskstatus = 4;
		}elseif(Auth::user()->roles55_id=="4")
		{
			// return "cheif";
			$taskstatus = 1;
		}

		$tasks =DB::select("SELECT
								I4.id as tasks_id
								FROM ipcr55 I1 LEFT JOIN users55 I2 ON I1.user_id = I2.id 
								LEFT JOIN targets55 I3 ON I3.ipcr55_id = I1.id
								LEFT JOIN tasks55 I4 ON I4.targets55_id = I3.id 
								WHERE I1.id=$id and I3.deleted_at IS NULL and I4.deleted_at IS NULL and I4.status_id=$taskstatus
							");

		$rowtasks = count($tasks);
		// return $rowtasks;
        	

    	for($i=0;$i<$rowtasks;$i++){
    		
	        

            if($status=="verification"){
			Tasks55::where('id', $tasks[$i]->tasks_id)
                            ->update([
                                'status_id' =>4,
                                
                            ]);
			}elseif($status=="approval"){
				Tasks55::where('id', $tasks[$i]->tasks_id)
                            ->update([
                                'status_id' =>1,
                                
                            ]);

			}elseif($status=="submission"){
				Tasks55::where('id', $tasks[$i]->tasks_id)
                            ->update([
                                'status_id' =>6,
                                
                            ]);

			}elseif($status=="approve"){
				
				
				
					Tasks55::where('id', $tasks[$i]->tasks_id)
                            ->update([
                                'status_id' =>2,
                                
                            ]);
				
		    }
		
	     }
	     $ipcr = Ipcr55::where('id',$id)->first();
	     if(!empty($ipcr->origid) && Auth::user()->roles55_id=="4"){
	     $target = Targets55::where('ipcr55_id',$id)->first();
					
					Targets55::where('ipcr55_id', $id)
		                            ->update([
		                                'ipcr55_id' => $ipcr->origid,
		                                
		                            ]);
		            Targets55::destroy($target->origid);
		        	Ipcr55::destroy($id);
		}

		

		Session::flash('updated', "A record has been updated");
		return redirect()->route('admin'.'.divisionaccomplishment');
	}

	public function verifyaccomplishment($id,Request $request)
	{
		$week_year = $request->input('targetweekform');
		$week = substr($week_year, strpos($week_year, "W") + 1);   
		$year = strtok($week_year, '-');
		$dto = new DateTime();
		$firstday = $dto->setISODate($year, $week)->format('Y-m-d');
		$lastday = $dto->modify('+6 days')->format('Y-m-d');

		
		// return $firstday;
		$id = decrypt($id);

		$status = $request->input('statusofipcr');

		 $tasks =DB::select("SELECT
								I4.id as tasks_id
								FROM ipcr55 I1 LEFT JOIN users55 I2 ON I1.user_id = I2.id 
								LEFT JOIN targets55 I3 ON I3.ipcr55_id = I1.id
								LEFT JOIN tasks55 I4 ON I4.targets55_id = I3.id 
								WHERE I1.id=$id and I3.deleted_at IS NULL and I4.deleted_at IS NULL and I4.actualdate_s >= '$firstday' and I4.actualdate_s <= '$lastday' and I4.actualdate_e >= '$firstday' and I4.actualdate_e <= '$lastday'

							");

		 // return $tasks;

		
		$rowtasks = count($tasks);
		// return $rowtasks;
        	

        	for($i=0;$i<$rowtasks;$i++){
        		
		        Tasks55::where('id', $tasks[$i]->tasks_id)
	                            ->update([
	                                'status_id' =>4,
	                                
	                            ]);
		     }



		

		Session::flash('updated', "A record has been updated");
		// return redirect()->route('admin'.'.ipcr55.index');
		return redirect()->route('admin'.'.indexaccomplishments');
	}

	/**
	 * Remove the specified ipcr55 from storage.
	 *
	 * @param  int  $id
     * @return mixed
	 */
	public function destroy($id)
	{
		if(!Guard::allows('ipcr55_delete')){
   			return abort(404);
   		}
		Ipcr55::destroy(decrypt($id));
		Session::flash('deleted', "A record has been deleted");
		return redirect()->route('admin'.'.ipcr55.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
   		if(!Guard::allows('ipcr55_delete')){
      		return abort(404);
      	}

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            if (!$toDelete){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.ipcr55.index');
            }

            foreach($toDelete as $row){
            	$toDelete[$row] = decrypt($row);
            }
            Ipcr55::destroy($toDelete);
        } else {
            $toDelete =  Ipcr55::all();
            if ($toDelete->isEmpty()){
                Session::flash('danger', "Unable to delete, no rows were selected");
                 return redirect()->route('admin'.'.ipcr55.index');
            }
            Ipcr55::whereNotNull('id')->delete();
        }

        Session::flash('deleted', "Records has been deleted");
        return redirect()->route('admin'.'.ipcr55.index');
    }

}
