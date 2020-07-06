<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\Input;
use App\Model as M;
use Hash, Helper, Session, Auth, Mail;

class AuthController extends Controller {


	public function __construct()
	{
	}

	public function getIndex()
	{
		$sessi = session('admin_session');
		if(!empty($sessi)) return redirect('panel');
		$data['title'] = 'Login';
		$data['page']  = 'auth.login';
		return view('auth.master',$data);
	}

	public function postDologin(Input $input)
	{
		$email    = $input->email;
		$password = $input->password;
		$remember = $input->remember;
		$user = M\Users::where('email',$email)->first();
		if(!isset($email) || !isset($password)){
			return redirect()->back()->withInput()->with('error','Email and Password can not be empty');
		}
		if(empty($user)){
			return redirect()->back()->withInput()->with('error','Email akun not registered');
		}else{
			if($user->status=='non active'){
				return redirect()->back()->withInput()->with('error','Your akun is not active!. Please contact administrator.');
			}else{
				if (Hash::check($password, $user->password))
				{
					if($remember){
						Auth::attempt(array('email' => $email, 'password' => $password));
					}

					Session::put('admin_session', $user);
				    return redirect('panel')->with('message','Welcome to admin area.');
				}else{
					return redirect()->back()->withInput()->with('error','Password is not valid.');
				}
			}
		}
	}

	public function getRegister()
	{
		$sessi = session('admin_session');
		if(!empty($sessi)) return redirect('panel');

		$data['title'] = 'Register';
		$data['page']  = 'auth.register';
		return view('auth.master',$data);
	}

	public function postRegister(Input $input)
	{
		if(!isset($input->email) || !isset($input->password)){
			return redirect()->back()->withInput()->with('error','Email and Password can not be empty');
		}
		$checkuser = M\Users::where('username',$input->username)->first();
		if(!empty($checkuser)){
			return redirect()->back()->withInput()->with('error',"Failed! Username $input->username is exists.");
		}
		$check = M\Users::where('email',$input->email)->first();
		if(!empty($check)){
			return redirect()->back()->withInput()->with('error',"Failed! Email akun $input->email is exists.");
		}else{
			// $rules = ['captcha' => 'required|captcha'];
   //          $validator = Validator::make($input->all(), $rules);
   //          if ($validator->fails())
   //          {
   //          	return redirect()->back()->withInput()->with('error',"Incorrect captcha!.");

   //          }else{
                $up = new M\Users;
				$up->fullname = $input->fullname;
				$up->email    = $input->email;
				$up->username = $input->username;
				$up->status   = 'non active';
				$up->id_group = 2;
				$up->password = bcrypt($input->password); //create password
				$up->created_by = $input->fullname.' via Form Register';
				$up->save();
            // }

			return redirect('auth')->with('message','Success. Please contact andministrator to activated your akun');


		}

	}

	public function getForgot()
	{
		$sessi = session('admin_session');
		if(!empty($sessi)) return redirect('panel');

		$data['title'] = 'Forgot Password';
		$data['page']  = 'auth.forgot';
		return view('auth.master',$data);
	}

	public function postForgot(Input $input)
	{
		if(!isset($input->email)){
			return redirect()->back()->with('error','Email can not be empty');
		}
		$check = M\Users::where('email',$input->email)->first();
		if(!empty($check)){
			if($check->status=='active'){
				$up = M\Users::find($check->id);
				$up->token    = md5($input->email);
				$up->expired_start = date('Y-m-d H:i:s');
				$nextDay           = time()+(1*24*60*60);
				$up->expired_end   = date('Y-m-d ',$nextDay).date('H:i:s');
				$up->save();

				$email = $input->email;
				$data = array(
						'name'  => $up->fullname,
						'token' => $up->token
					);

				$from_email    = "cahaya5348@gmail.com";
		        Mail::send('emails.mail', $data, function($kirim) use ($email, $from_email) {
		            $kirim->from($from_email, '-noreply-[Admin System]');
		            $kirim->to($email)->subject('Request new password');
		        });
				
				return redirect('auth')->with('message','Success. Please check your email akun to reset password');
			}else{
				return redirect()->back()->withInput()->with('error',"Failed! Your email $input->email is not active. Please contact administrator");
			}
		}else{
			return redirect()->back()->withInput()->with('error',"Failed! Your email $input->email is not exists.");
		}


	}
	
	public function getReset($token='')
	{
		if($token==''){
			return redirect('auth/forgot')->withInput()->with('error','Sorry! Your token not found. Please try again');
		}else{
			$user        = M\Users::where('token',$token)->first();
			if(!empty($user)){
				$expire = M\Users::where('expired_end','>=',date('Y-m-d H:i:s'))->first();
		        if(empty($expire))
		        {
		        	return redirect('auth/forgot')->withInput()->with('error','Sorry! Your token has expired. Please try again');
		        }
			}
			$data['token'] = $token;
			$data['title'] = 'Reset Password';
			$data['page']  = 'auth.reset';
			return view('auth.master',$data);
		}

	}

	public function postReset(Input $input)
	{
		if(!isset($input->password)){
			return redirect()->back()->with('error','Password can not be empty');
		}
		$token = $input->token;
		$up        = M\Users::where('token',$token)->first();
		if(empty($up)){
			return redirect('auth/forgot')->withInput()->with('error','Sorry! Your token not valid. Please try again');
		}
		$up->token         = '';
		$up->password      = bcrypt($input->password); //create new password
		$up->expired_start = '';
		$up->expired_end   = '';
		$up->save();
		$user = M\Users::find($up->id);
		Session::put('admin_session', $user);
		return redirect('panel')->with('message','Success. Welcome back to Panel System');
	}


	public function getLogout()
	{
		Session::forget('admin_session');
		return redirect('auth')->with('message','Logout system. Thanks');
	}

}
