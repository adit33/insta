<?php 
/**
* 
*/
namespace App;
class Action
{
	
	function __construct(argument)
	{
		# code...
	}

	public function uploadPhoto(){
		// if you want only a caption, you can simply do this:
		$metadata = ['caption' => 'My awesome caption'];

		$ig->timeline->uploadPhoto($photoFilename, $metadata);
	}
}
?>
