<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Schedule;

use App\Action;

use App\Jobs\Upload;

use App\DataTables\ScheduleDataTable;

use Image;

use File;

use Crypt;

use Carbon;

class ScheduleController extends Controller
{
	public function __construct(Schedule $schedule){
		$this->schedule=$schedule;
		
	}

	public function index(ScheduleDataTable $dataTable){
		return $dataTable->render('schedule.index');
	}

    public function create(){
    	return view('schedule.create');
    }

    public function store(Request $request){
    	$schedule=new Schedule;
    	$this->schedule->saveSchedule($schedule,$request);
    	return redirect()->route('schedule.index');
    }

    public function edit($id){
    	$schedule=Schedule::find($id);
    	return view('schedule.edit',compact('schedule'));
    }

    public function update($id,Request $Request){
    	$schedule=Schedule::find($id);
    	$this->schedule->saveSchedule($schedule,$request);
    	return redirect()->route('schedule.index');
    }

    public function destroy(){
    	$schedule=Scedhule::find($id);
    	$schedule->delete();
    	return redirect()->route('schedule.index');
    }

    public function runSchedule(){
  //   	$schedules=Schedule::with('instaAccount')->get();
  //   	\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
  //   	// $action = new Action;
  //   	// $action->uploadPhoto($schedules);
  //   	$username = '';
		// $password = '';
		// $debug = true;
		// $truncatedDebug = false;
		// //////////////////////
		// /////// MEDIA ////////
		// $photoFilename = '';
		// $captionText = '';
		// //////////////////////
		// $ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);

		// // if you want only a caption, you can simply do this:
		
		// foreach ($schedules as $schedule) {
		// 	try {
		// 	   	$ig->login($schedule->instaAccount->user_id,Crypt::decrypt($schedule->instaAccount->password));
		// 	} catch (\Exception $e) {
		// 		    echo 'Something went wrong: '.$e->getMessage()."\n";
		// 	    exit(0);
		// 	}
		// 	try {
		// 				$photoFilename=public_path($schedule->photo);
		// 				$metadata = ['caption' => $schedule->caption];
		// 				$ig->timeline->uploadPhoto($photoFilename, $metadata);
		// 	} catch (\Exception $e) {
		// 			    echo 'Something went wrong: '.$e->getMessage()."\n";
		// 	}
		// }
  //   	date_default_timezone_set('Asia/Jakarta');
		    	
		// echo date('Y-m-d H:i');
    }


}
