<?php 

class ImageHelper {


	public static function UploadImageOneSize($filename,$width='',$height='',$imagetype='')
	{
		$path               = public_path("images/".$filename);
		Image::make($path)->save('images/'.$filename); //320, 240

		if($width!='' && $height!='')
		{
			Image::make($path)->fit($width, $height)->save('images/custom_'.$filename);
		}
		if (Request::segment(2)=='event' || $imagetype=='landscape') {
			Image::make($path)->fit(1350, 620)->save('images/landscape_'.$filename);
		}
		if (Request::segment(2)=='event' || $imagetype=='portrait') {
			Image::make($path)->fit(480, 660)->save('images/portrait_'.$filename);
		}
	}

	public static function UploadImageOneSizeFolder($folder,$filename)
	{
		$path               = public_path("images/".$folder."/".$filename);
		Image::make($path)->save('images/'.$folder.'/'.$filename); //320, 240

	}

	public static function DeleteImageOneSize($image)
	{
		$origin        = public_path("images/".$image);
		if(file_exists($origin)){
			File::delete($origin);
		}
	}

	public static function DeleteImageOneSizeFolder($folder,$image)
	{
		$origin        = public_path("images/".$folder."/".$image);
		if(file_exists($origin)){
			File::delete($origin);
		}
	}

	public static function DeleteImage($folder,$image)
	{
		$origin        = public_path("images/".$folder."/".$image);
		$small         = public_path("images/".$folder."/small_".$image);
		$medium        = public_path("images/".$folder."/medium_".$image);
		$large         = public_path("images/".$folder."/large_".$image);
		$custom        = public_path("images/".$folder."/custom_".$image);
		$landscape     = public_path("images/".$folder."/landscape_".$image);
		$portrait      = public_path("images/".$folder."/portrait_".$image);
		if(file_exists($origin) && file_exists($small) && file_exists($medium) && file_exists($large) || file_exists($custom) || file_exists($landscape) || file_exists($portrait)){
			File::delete($origin,$small,$medium,$large,$custom,$landscape,$portrait);
		}
	}

	public static function UploadImage($folder,$filename,$width='',$height='',$imagetype='')
	{
		$path               = public_path("images/".$folder."/".$filename);
		Image::make($path)->fit(80, 80)->save('images/'.$folder.'/small_'.$filename); //320, 240
		Image::make($path)->fit(640, 480)->save('images/'.$folder.'/medium_'.$filename);
		Image::make($path)->fit(1024, 768)->save('images/'.$folder.'/large_'.$filename);

		if($width!='' && $height!='')
		{
			Image::make($path)->fit($width, $height)->save('images/'.$folder.'/custom_'.$filename);
		}
		if (Request::segment(2)=='event' || $imagetype=='landscape') {
			Image::make($path)->fit(1350, 620)->save('images/'.$folder.'/landscape_'.$filename);
		}
		if (Request::segment(2)=='event' || $imagetype=='portrait') {
			Image::make($path)->fit(480, 660)->save('images/'.$folder.'/portrait_'.$filename);
		}
	}


	public static function OriginImage($file)
	{
			$destinationPath = "images";
			$time = date('YmdHis');
			$filename        = $file->getClientOriginalName();
			$upload_success  = $file->move($destinationPath, $filename);
		return $filename;
	}

	public static function OriginImageFolder($file,$folder)
	{
			$rand            = rand(11111,99999).date('YmdHis');
			$destinationPath = "images/$folder";
			$filename        = $rand.'.'.$file->getClientOriginalExtension();
			$upload_success  = $file->move($destinationPath, $filename);
		return $filename;
	}


}