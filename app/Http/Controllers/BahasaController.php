<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use App\Http\Requests\Input;
use App\Model as M;
use Hash, Helper, Session, Datatables, Image;

class BahasaController extends Controller {

	protected $uri    = 'setting';
	protected $folder = 'setting';
	protected $title  = 'Site Setting';

	public function __construct()
	{
		
	}

	public function changeLanguage(Input $input) {

		$language = $input->language;


        request()->session()->put('locale', $language);
 
  
  		return Helper::composeReply("SUCCESS", "Change language set", $language);
    }

	


}
