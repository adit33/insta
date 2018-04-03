<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Schedule;

use App\Action;

use App\Jobs\Upload;

use Image;

use File;

use Crypt;

use Carbon;

class ScheduleController extends Controller
{
    public function create(){
    	return view('schedule.create');
    }

    public function store(Request $request){
    	$file=$request->file('photo');
    	$path='img';
    	$ext=$file->getClientOriginalExtension();
    	$name=str_random(10).'.'.$ext;
    	$image=Image::make($file);
    	$image->save(public_path().'/'.$path.DIRECTORY_SEPARATOR.$name);

    	$schedule=Schedule::create([
    		'insta_account_id'=>$request->input('insta_account_id'),
    		'caption'=>$request->input('caption'),
    		'time'=>date('Y-m-d H:i',strtotime($request->input('time'))),
    		'photo'=>$path.DIRECTORY_SEPARATOR.$name
    	]);

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
