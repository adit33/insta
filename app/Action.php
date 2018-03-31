<?php 
/**
* 
*/
namespace App;
use Crypt;
class Action
{
	
	
	public function uploadPhoto($schedules){
		/////// CONFIG ///////
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
			   	$ig->login($schedule->instaAccount()->user_id,Encrypt::decrypt($schedule->instaAccount()->user_id));
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
?>
