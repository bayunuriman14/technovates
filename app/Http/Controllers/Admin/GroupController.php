<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\Input;
use App\Model as M;
use Hash, Helper, Session, Datatables;

class GroupController extends Controller {

	protected $uri    = 'groups';
	protected $folder = 'groups';
	protected $title  = 'Group';

	public function __construct()
	{
		
	}

	public function getIndex()
	{
		$data['title'] = 'List '.$this->title.'s';
		$data['data'] = M\Groups::all();
		return view('admin.'.$this->folder.'.index',$data);
	}

	public function getData()
    {
        $items = M\Groups::select(['id', 'group_name', 'group_description', 'created_at', 'created_by'])->get();

        $view = Datatables::of($items);
                $view->addColumn('action','
                	<ul class="icons-list">
                		<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="{!! url("panel/groups/edit/$id") !!}"><i class="icon-pencil7"></i> Edit </a></li>
								@if($id!=1)
									<li><a data-url="{!! url("panel/groups/delete/$id") !!}" class="single-delete"><i class="icon-trash"></i> Delete </a></li>
								@endif
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
		if($id=='') return redirect()->back();
		$data['title'] = 'Edit '.$this->title;
		$data['data']  = M\Groups::find($id);
		return view('admin.'.$this->folder.'.form',$data); 
	}

	public function postSave(Input $input)
	{
		$sessi = session('admin_session');
		$id = $input->id;
		if($id==''){
			$check = M\Groups::where('group_name',$input->group_name)->first();
			if(!empty($check)){
				return redirect()->back()->withInput()->with('error',"Failed! Data $input->group_name is exists");
			}
			$up = new M\Groups;
			$msg = "Success! Data has been saved";
			$up->created_by        = $sessi->fullname;
		}else{
			$check = M\Groups::where('group_name',$input->group_name)->where('id','!=',$id)->first();
			if(!empty($check)){
				return redirect()->back()->withInput()->with('error',"Failed! Data $input->group_name is exists");
			}
			$up = M\Groups::find($id);
			$msg = "Success! Data has been updated";
			$up->updated_by        = $sessi->fullname;
		}	
		$up->group_name        = $input->group_name;
		$up->group_description = $input->group_description;
		$up->save();
		return redirect('panel/'.$this->uri)->with('message', $msg);
	}

    public function getDelete($id='')
    {
    	if($id=='') return redirect()->back();
    	if($id=='1'){
    		return redirect()->back()->with('error','Failed! Superadmin can not to delete!');
    	}else{
    		M\Groups::find($id)->delete();
    		return redirect()->back()->with('message','Success! Data has been deleted.');
    	}
    }

    public function postRemoveall(Input $input)
    {

    	if(count($input->id)==0){
    		return redirect()->back()->with('error','Failed! No data selected.');
    	}else{
    		foreach ($input->id as $key => $id) {
    			if($id!='1'){
    				M\Groups::find($id)->delete();
    			}
    		}
    		return redirect()->back()->with('message','Success! Data has been deleted.');
    	}
    }


}
