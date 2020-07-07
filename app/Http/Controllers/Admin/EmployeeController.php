<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Input;
use App\Model as M;
use Illuminate\Support\Facades\Input as Inputs;
use Hash, Helper, Session, Datatables, DB, ImageHelper, Mail;

class EmployeeController extends Controller {

	protected $uri    = 'employee';
	protected $folder = 'employee';
	protected $title  = 'Employee';

	public function __construct()
	{
		
	}

	public function getIndex()
	{
		$data['title'] = 'List '.$this->title.'s';
		$data['employees'] = M\Employee::all();
		return view('admin.'.$this->folder.'.index',$data);
	}


    public function getAdd(){
		$data['title'] = 'Add Data '.$this->title;
		return view('admin.'.$this->folder.'.add',$data);
	}

    public function getEdit($id)
	{
		if($id=='') return redirect()->back();
		$data['title'] = 'Edit '.$this->title;
		$data['data']  = M\Employee::find($id);
		return view('admin.'.$this->folder.'.edit',$data); 
	}

	public function postSave()
	{
		$sessi = session('admin_session');
		$response['success'] = false;
        $response['message'] = "Failed save data";
		$inputs = Inputs::except('birth_submit');
		$checkemail = M\Employee::where('email',$inputs['email'])->first();
		if(!empty($checkemail)){
			return Helper::composeReply("ERROR", "Email is exist !");
		}
		$rules = [
			'nip' => 'required|max:255',
			'name' => 'required|max:100',
            'email' => 'required|email',
            'status' => 'required',
            'birth' => 'required',
            'gender' => 'required',
		];

        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()){
        	return Helper::composeReply("ERROR", "Please complete form !");
        }else{
        	if(Inputs::hasFile('photo')){					
				$photo = Inputs::file('photo');					
	            $filename = ImageHelper::OriginImageFolder($photo,'users');
	        	ImageHelper::UploadImageOneSizeFolder('users',$filename);
	            $inputs['photo'] = $filename; 
			}else{
				$filename = '';
			}
			DB::beginTransaction();
	        try{
	    		$data = M\Employee::create($inputs);
	    		$username = strtolower(str_replace(' ','',Inputs::get('name'))); 
	    		$password = 'abcd1234';
	    		$inputusers = array(
	                        'fullname' => Inputs::get('name'),
	                        'name' => Inputs::get('name'),
	                        'email' => Inputs::get('email'),
	                        'username' => $username,
	                        'password' => bcrypt($password),
	                        'status' => Inputs::get('status'),
	                        'image' => $filename,
	                        'id_group' => 7,
	                        'created_by' => $sessi->fullname
	                    );
	    		$datausers = M\Users::create($inputusers);
	    		/*
	    		$email = Inputs::get('email');
				$from_email    = "calonmilyarder03@gmail.com";
				$datas = array(
							'email'  => $email,
							'password' => $password
						);
		        Mail::send('emails.registration', $datas, function($send) use ($email, $from_email) {
		            $send->from($from_email, '-noreply-[Admin System]');
		            $send->to($email)->subject('Registration Task Management System');
		        });
		        */
		        
	        	DB::commit();
	            $response['success'] = true;
	            $response['message'] = "Success save data";
	        }catch (Exception $e){
	            DB::rollback();
	            Log::error($e->getMessage());
	            Log::error($e->getTraceAsString());
	        }
            if($response['success'] == true){
	        	return Helper::composeReply("SUCCESS", "Success save new data"); 
	        }else{
	        	return Helper::composeReply("ERROR", "Failed save data"); 
	        }	
        }

	}

	public function postEdit()
	{
		$sessi = session('admin_session');
		$response['success'] = false;
        $response['message'] = "Failed save data";
		$inputs = Inputs::except('birth_submit');
		$checkemail = M\Employee::where('email',$inputs['email'])->first();
		if(!empty($checkemail)){
			$employee = M\Employee::findOrFail(Inputs::get('id'));
			if($employee->email != Inputs::get('email')){
				return Helper::composeReply("ERROR", "Email is exist !");
			}
		}
		$rules = [
			'nip' => 'required|max:255',
			'name' => 'required|max:100',
            'email' => 'required|email',
            'status' => 'required',
            'birth' => 'required',
            'gender' => 'required',
		];

        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()){
        	return Helper::composeReply("ERROR", "Please complete form !");
        }else{
        	if(Inputs::hasFile('photo')){					
				$photo = Inputs::file('photo');					
	            $filename = ImageHelper::OriginImageFolder($photo,'users');
	        	ImageHelper::UploadImageOneSizeFolder('users',$filename);
	            $inputs['photo'] = $filename; 
			}else{
				$filename = '';
			}
			DB::beginTransaction();
	        try{
	    		$employee->update($inputs);
	    		$username = strtolower(str_replace(' ','',Inputs::get('name'))); 
	    		$password = 'abcd1234';
	    		$inputusers = array(
	                        'fullname' => Inputs::get('name'),
	                        'name' => Inputs::get('name'),
	                        'email' => Inputs::get('email'),
	                        'username' => $username,
	                        'status' => Inputs::get('status'),
	                        'image' => $filename,
	                    );
	    		$users = M\Users::where('email', '=', Inputs::get('email'))->firstOrFail();
	    		$users->update($inputusers);
	            //commit transaction
	            DB::commit();
	            $response['success'] = true;
	            $response['message'] = "Success save data";
	        }catch (Exception $e){
	            DB::rollback();
	            Log::error($e->getMessage());
	            Log::error($e->getTraceAsString());
	        }
            if($response['success'] == true){
	        	return Helper::composeReply("SUCCESS", "Success save new data"); 
	        }else{
	        	return Helper::composeReply("ERROR", "Failed save data"); 
	        }	
        }
	}

    public function getDelete()
    {
    	$response['success'] = false;
        $response['message'] = "Failed save data";
        $checktasks = M\Employee::where('email',$inputs['email'])->get();
        if(count((array)$checktasks) > 0) return Helper::composeReply("ERROR", "This employee have task, update status to not active"); 
    	DB::beginTransaction();
	        try{
		    	$data = M\Employee::findOrFail(Inputs::get('id'));
		    	$employeeemail = $data->email;
		    	ImageHelper::DeleteImageOneSizeFolder('users',$data->photo);
				$data->delete();
				$usersdelete = DB::table("users")
	            ->where("email", $employeeemail)
	            ->delete();
				DB::commit();
	            $response['success'] = true;
	            $response['message'] = "Success save data";
			}catch (Exception $e){
		            DB::rollback();
		            Log::error($e->getMessage());
		            Log::error($e->getTraceAsString());
		    }
        if($response['success'] == true){
        	return Helper::composeReply("SUCCESS", "Success save new data"); 
        }else{
        	return Helper::composeReply("ERROR", "Failed save data"); 
        }
    }


}
