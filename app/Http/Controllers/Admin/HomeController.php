<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use App\Http\Requests\Input;
use App\Model as M;
use Hash, Helper, Session, Auth, Mail, Image, ImageHelper, PDF, Excel,DB;
use Charts;

class HomeController extends Controller {


	public function __construct()
	{
		
	}

	public function getIndex()
	{
		$data['title'] = 'Dashboard';
		$tasks = M\Task::where(DB::raw("(DATE_FORMAT(date,'%Y'))"),date('Y'))->get();
        $data['chart'] = Charts::database($tasks, 'bar', 'highcharts')
         ->title("Monthly Task ".date('Y'))
         ->elementLabel("Total Task")
         ->dimensions(1200, 500)
         ->responsive(false)
         ->groupByMonth(date('Y'), true);
         $data['chartline'] = Charts::database($tasks, 'line', 'highcharts')
         ->title("Monthly Task ".date('Y'))
         ->elementLabel("Total Task")
         ->dimensions(1200, 500)
         ->responsive(false)
         ->groupByMonth(date('Y'), true);
		return view('admin.content',$data);
	}

	//demo form
	public function getForm()
	{
		$data['title'] = 'Custom Form';
		return view('admin.customs.form',$data);
	}

	//demo datepicker
	public function getDatepicker()
	{
		$data['title'] = 'Custom Form';
		return view('admin.customs.datepicker',$data);
	}

	//demo pdf
	public function getPdf()
	{
		// example 1
		// $pdf = \App::make('dompdf.wrapper');
		// $pdf->loadHTML('<h1>Test</h1>');
		// return $pdf->stream();

		$data['title'] = "test pdf";
		$pdf = PDF::loadView('admin.customs.pdf', $data);
		return $pdf->setPaper('a4')->setOrientation('landscape')->stream('invoice.pdf');


		// example 2
		// $pdf = $loadView('admin.customs.pdf', $data);
		// return view('admin.customs.pdf',$data);
		// return $pdf->setPaper('a4')->setOrientation('landscape')->stream('example.pdf');
	}

	//demo excel
	public function getExcel()
	{
		$data['title'] = "test excel";
		Excel::create("Demo Excel ", function($excel) use ($data) {

					$excel->sheet("title seed", function($sheet) use ($data) {

						$sheet->setOrientation('landscape');
				
							$sheet->loadView('admin.customs.excel',$data);

					});

				})->export('xls');
	}

	public function getProfile()
	{
		$data['data'] = Helper::userbyid(session('admin_session')->id);
		$data['groups'] = M\Groups::orderBy('group_name')->get();
		$data['title'] = 'Profile';
		return view('admin.customs.profile',$data);
	}

	public function postChangepassword(Input $input)
	{
		$sessi = session('admin_session');
		if(empty($sessi)) { return redirect()->back(); }
		$id = $sessi->id;
		$up = M\Users::find($id);
		$up->updated_by        = $sessi->fullname;
		if($input->password!=''){
			$up->password = bcrypt($input->password); //create password
		}
		$up->save();
		return redirect()->back()->with('message','Success! Password has been updated.');
	}

	public function postUpdateprofile(Input $input){

		$sessi = session('admin_session');
		if(empty($sessi)) { return redirect()->back(); }
		$id = $sessi->id;
		
		$check = M\Users::where('email',$input->email)->where('id','!=',$id)->first();
		if(!empty($check)){
			return redirect()->back()->with('error',"Failed! Data email $input->email is exists");
		}
		$check2 = M\Users::where('username',$input->username)->where('id','!=',$id)->first();
		if(!empty($check2)){
			return redirect()->back()->with('error',"Failed! Data username $input->username is exists");
		}
		$up = M\Users::find($id);
		$up->updated_by        = $sessi->fullname;

		$file = $input->file('image');
        if(!empty($file))
        {
            ImageHelper::DeleteImage('users',$up->image);
        }

		$file = $input->file('image');
        if(!empty($file))
        {
        	$filename = ImageHelper::OriginImageFolder($file,'users');
        	ImageHelper::UploadImageOneSizeFolder('users',$filename);
			$up->image       = $filename;;
        }

		$up->fullname = $input->fullname;
		$up->username = $input->username;
		$up->email    = $input->email;
		$up->save();
		Session::put('admin_session', $up);
		return redirect()->back()->with('message','Success! Data has been updated.');
	}




}
