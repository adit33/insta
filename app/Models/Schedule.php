<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Action;

use Image;

use File;

use Crypt;

use Carbon;

use App\Jobs\Upload;

class Schedule extends Model
{
   protected $table='schedules';
   protected $fillable=['insta_account_id','time','photo','status','caption'];

  
   public function uploadPhoto(){
   		date_default_timezone_set('Asia/Jakarta');
    	
    	$schedules=Schedule::with('instaAccount')->get();

    	// $schedules=Schedule::with('instaAccount')->whereRaw('DATE_FORMAT(DATE_SUB(time,INTERVAL 248 MINUTE), "%Y-%m-%d %H:%i") = DATE_FORMAT( ?, "%Y-%m-%d %H:%i")',[date('Y-m-d H:i')])->get();

    	if(count($schedules) > 0){
    		\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
    	// $action = new Action;
    	// $action->uploadPhoto($schedules);
    	$username = '';
		$password = '';
		$debug = true;
		$truncatedDebug = false;
		//////////////////////
		/////// MEDIA ////////
		$photoFilename = '';
		$captionText = '';
		//////////////////////
		$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);

		// if you want only a caption, you can simply do this:
		
		foreach ($schedules as $schedule) {
			dispatch(new Upload($schedule->toArray()));
			}
		}else{
			echo "nope";
		}
   }

    public function instaAccount(){
   		return $this->belongsTo('App\Models\InstaAccount','insta_account_id','id');
   }


}
