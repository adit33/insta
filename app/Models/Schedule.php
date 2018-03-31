<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Action;

use Image;

use File;

use Crypt;

use Carbon;

class Schedule extends Model
{
   protected $table='schedules';
   protected $fillable=['insta_account_id','time','photo','status','caption'];

   public function instaAccount(){
   		return $this->belongsTo('App\Models\InstaAccount','insta_account_id','id');
   }

   public function uploadPhoto(){
    	$schedules=Schedule::with('instaAccount')->get();
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
			try {
			   	$ig->login($schedule->instaAccount->user_id,Crypt::decrypt($schedule->instaAccount->password));
			} catch (\Exception $e) {
				    echo 'Something went wrong: '.$e->getMessage()."\n";
			    exit(0);
			}
			try {
						$photoFilename=public_path($schedule->photo);
						$metadata = ['caption' => $schedule->caption];
						$ig->timeline->uploadPhoto($photoFilename, $metadata);
			} catch (\Exception $e) {
					    echo 'Something went wrong: '.$e->getMessage()."\n";
			}
		}
   }

}
