<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\Input;
use App\Model as M;
use Datatables, Helper;

class ClassfunctionController extends Controller {

	protected $uri    = 'class_function';
	protected $folder = 'classfunction';
	protected $title ="Class Function";

	public function __construct()
	{
		
	}

	public function getIndex()
	{
		$data['title'] = 'List '.$this->title.'s';
		return view('admin.classfunction.index',$data); 
	}

	public function getData()
    {
        $items = M\Classfunction::select(['id', 'class', 'function', 'alias', 'method'])->get();

        $view = Datatables::of($items);
                $view->addColumn('action','
                	<ul class="icons-list">
                		<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="{!! url("panel/class_function/edit/$id") !!}"><i class="icon-pencil7"></i> Edit </a></li>
								<li><a data-url="{!! url("panel/class_function/delete/$id") !!}" class="single-delete"><i class="icon-trash"></i> Delete </a></li>
						</ul>
						</li>
					</ul>
		            ');
		        $view->editColumn('id', '
		            <input type="checkbox" class="check-id" name="id[]" value="{{ $id }}" >
		        ');
		return $view->make();
    }

    public function getAdd(){
		$data['title'] = 'Add Data '.$this->title;
		return view('admin.'.$this->folder.'.form',$data);
	}

	public function getEdit($id)
	{
		$data['title'] = 'Edit '.$this->title;
		$data['data']  = M\Classfunction::find($id);
		return view('admin.'.$this->folder.'.form',$data); 
	}

	public function postSave(Input $input)
	{
		$id = $input->id;
		if($id==''){
			$check = M\Classfunction::where('class',$input->class)->where('function',$input->function)->first();
			if(!empty($check)){
				return redirect()->back()->withInput()->with('error',"Failed! Data Class $input->class and Function $input->function is exists");
			}
			$up = new M\Classfunction;
			$msg = "Success! Data has been saved";
		}else{
			$check = M\Classfunction::where('class',$input->class)->where('function',$input->function)->where('id','!=',$id)->first();
			if(!empty($check)){
				return redirect()->back()->withInput()->with('error',"Failed! Data $input->class and Function $input->function is exists");
			}
			$up = M\Classfunction::find($id);
			$msg = "Success! Data has been updated";
		}	
		$up->class    = $input->class;
		$up->function = $input->function;
		$up->alias    = ucwords(str_replace('_', ' ', $input->function));
		$up->save();
		return redirect('panel/'.$this->uri)->with('message', $msg);
	}

    public function getDelete($id='')
    {
    	if($id=='') return redirect()->back();
		M\Classfunction::find($id)->delete();
		return redirect()->back()->with('message','Success! Data has been deleted.');
    }

    public function postRemoveall(Input $input)
    {

    	if(count($input->id)==0){
    		return redirect()->back()->with('error','Failed! No data selected.');
    	}else{
    		foreach ($input->id as $key => $id) {
    			M\Classfunction::find($id)->delete();
    		}
    		return redirect()->back()->with('message','Success! Data has been deleted.');
    	}
    }

    public function getReload()
    {
    	Helper::insert_class_function();
    	return redirect()->back()->with('message','Success! Data has been Reloaded.');
    }


}
