<?php 
	/**
	* 
	*/
	namespace App\Helpers;
	use Image;

	use Illuminate\Support\Facades\Storage;

	class ImageHelper 
	{

		protected $image;
		
		function __construct($image)
		{
			$this->image = $image;
		}

		public function setName(){
    	$ext=$this->image->getClientOriginalExtension();
    	$original_name=$this->image->getClientOriginalName();
    	$name=str_random(10).$original_name;   	
    	return $name;
		}

		public function setPath(){
			$path=public_path().'/img';
			return $path;
		}

		public function saveImage(){
			$name=$this->setName();
			$path=$this->setPath();
			$image=Image::make($this->image);
			$image->save($path.DIRECTORY_SEPARATOR.$name);	
			return $name;
		}

		public function deleteImage(){

		}


	}
?>