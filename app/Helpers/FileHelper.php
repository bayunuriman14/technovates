<?php 

class FileHelper {

	public static function DeleteFile($folder,$name)
	{
		$origin        = public_path("uploads/".$folder."/".$name);
		if(file_exists($origin)){
			File::delete($origin);
		}
	}


	public static function UploadFile($file,$folder)
	{
		$rand            = rand(11111,99999).date('YmdHis');
		$destinationPath = "uploads/$folder";
		$filename        = $rand.'.'.$file->getClientOriginalExtension();
		$upload_success  = $file->move($destinationPath, $filename);
		return $filename;
	}












}