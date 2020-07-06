<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Input;
use App\Model as M;
use Illuminate\Support\Facades\Input as Inputs;
use Hash, Helper, Session, Datatables, DB, ImageHelper;

class TaskController extends Controller {

	protected $uri    = 'task';
	protected $folder = 'task';
	protected $title  = 'Task';

	public function __construct()
	{
		
	}

	public function getIndex()
	{
		$sessi = session('admin_session');
		$data['title'] = 'List '.$this->title.'s';
		if($sessi->id_group==7){
			$emails = $sessi->email;
			$data['tasks'] = M\Task::whereHas('employee', function($query) use ($emails) {
			    $query->where('email', '=', $emails);
			})->get();

		}else{
			$data['tasks'] = M\Task::with(['employee'])->get();
		}
		return view('admin.'.$this->folder.'.index',$data);
	}


    public function getAdd(){
		$data['title'] = 'Add Data '.$this->title;
		$data['employees'] = M\Employee::select('id','name')->where('status','active')->get();
		return view('admin.'.$this->folder.'.add',$data);
	}

    public function getEdit($id)
	{
		if($id=='') return redirect()->back();
		$data['title'] = 'Edit '.$this->title;
		$data['employees'] = M\Employee::select('id','name')->where('status','active')->get();
		$data['data']  = M\Task::find($id);
		return view('admin.'.$this->folder.'.edit',$data); 
	}

	public function postSave()
	{
		$sessi = session('admin_session');
		$inputs = Inputs::except('date_submit');
		$rules = [
			'date' => 'required',
			'status_task' => 'required',
            'task' => 'required',
            'id_employee' => 'required',
		];

        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()){
        	return Helper::composeReply("ERROR", "Please complete form !");
        }else{
    		$data = M\Task::create($inputs);
            return Helper::composeReply("SUCCESS", "Save new data"); 	
        }

	}

	public function postEdit()
	{
		$sessi = session('admin_session');
		$inputs = Inputs::except('date_submit');
		$rules = [
			'date' => 'required',
			'status_task' => 'required',
            'task' => 'required',
            'id_employee' => 'required',
		];

        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()){
        	return Helper::composeReply("ERROR", "Please complete form !");
        }else{
        	$task = M\Task::findOrFail(Inputs::get('id'));
    		$task->update($inputs);
            return Helper::composeReply("SUCCESS", "Save new data"); 	
        }
	}

    public function getDelete()
    {
    	$data = M\Task::findOrFail(Inputs::get('id'));
		$data->delete();
		return Helper::composeReply("SUCCESS", "Data Deleted");
    }


}
