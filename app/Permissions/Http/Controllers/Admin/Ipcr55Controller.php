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
    		if(!Guard::allows('ipcr55_access')){
    		return abort(404);
    	}
    
    	$division_id = Auth::user()->division_id;
        
       $ipcr55= DB::select("SELECT DISTINCT 
								I1.id as id,
                                I1.ipcr_name as ipcr_name,
								I1.semester as semester,
								I1.year as year,
								I1.updated_at as updated_at,
								I1.active as active
								FROM ipcr55 I1 LEFT JOIN users55 I2 ON I1.user_id = I2.id 
								WHERE I2.division_id = $division_id and I1.status55_id = 1");
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


		return view('admin.ipcr55.index', compact('ipcr55', "status55"));
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


		return view('admin.ipcr55.index', compact('ipcr55', "status55"));
	}

	/**
	 * Show the form for creating a new ipcr55
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{

		if(!Guard::allows('ipcr55_create')){
			return abort(404);
		}
	    $status55 = Status55::pluck("status_name", "id");

	    
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
		$targets = Targets55::where('ipcr55_id',decrypt($id))->get();
		
		$id = decrypt($id);
		// $tasks =DB::select("SELECT DISTINCT 
		// 					T1.name as targets,
		// 					T1.id as targets_id,
		// 					T2.name as tasks,
		// 					T2.weight as weight,
		// 					T2.percent_completed as percent,
		// 					T2.means_verification as verification,
		// 					T3.id as ipcr_id
		// 					FROM targets55 T1 LEFT JOIN tasks55 T2 ON T1.id = T2.targets55_id 
		// 					LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
		// 					WHERE T3.id = $id");

		$mytime = Carbon::now();
		$ddate =$mytime;
		$date = new DateTime($ddate);
		$weekfromform = $date->format("W");
		// return $week;
		if($request->input('targetweekform')==""){
			// return "null";
			$weekfromform = $weekfromform;
		}else {
			// return "not null";
			$week_year = $request->input('targetweekform');
			$week = substr($week_year, strpos($week_year, "W") + 1);   
			$weekfromform = $week;
			// return $week;
		}
		// return $weekfromform;

		$tasks =DB::select("SELECT DISTINCT 
								T1.successindicators55_id as SI,
								T1.name as targets,
								T1.id as targets_id,
								T2.name as tasks,
								T2.weight as weight,
			 					T2.percent_completed as percent,
			 					T2.means_verification as verification,
								T3.id as ipcr_id,
								T2.active as week
								FROM targets55 T1 LEFT JOIN tasks55 T2 ON T1.id = T2.targets55_id 
								LEFT JOIN ipcr55 T3 ON T1.ipcr55_id = T3.id
								WHERE T3.id = $id 
								and T2.active = $weekfromform 
								");
		$tasks = collect($tasks);
		// $album = Tasks55::with('Photos')->find($id);
		

		
		// $view = "view";
		return view('admin.ipcr55.show', compact('ipcr55', "status55","users55","successindicators55","targets","tasks","strategicobjectives"));
	}


	/**
	 * Store a newly created ipcr55 in storage.
	 *
     * @param CreateIpcr55Request|Request $request
     * @return mixed
	 */
	public function store(CreateIpcr55Request $request)
	{
		if(!Guard::allows('ipcr55_create')){
			return abort(404);
		} 
	    
		// $ipcr=Ipcr55::create($request->all());
		$ipcr = new Ipcr55();
        $ipcr->ipcr_name = $request->input('ipcr_name');
        $ipcr->semester = $request->input('semester');
        $ipcr->year = $request->year;
        $ipcr->user_id = Auth::user()->id;
        $ipcr->save();



		Session::flash('created', "A record has been created");
		return redirect()->route('admin'.'.ipcr55.index');
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
		if(!Guard::allows('ipcr55_edit')){
   			return abort(404);
   		}
		$ipcr55 = Ipcr55::findOrFail(decrypt($id));

        
		
		
		$ipcr55->update($request->all());
		Session::flash('updated', "A record has been updated");
		return redirect()->route('admin'.'.ipcr55.index');
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
