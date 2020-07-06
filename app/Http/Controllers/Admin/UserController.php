<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use App\Http\Requests\Input;
use App\Model as M;
use Hash, Helper, Session, ImageHelper, Datatables, Image;

class UserController extends Controller {

	protected $uri    = 'users';
	protected $folder = 'users';
	protected $title  = 'User';

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
        $items = M\Users::select(['users.id', 'image', 'fullname', 'group_name', 'status', 'users.created_at', 'users.created_by'])
        		->leftJoin('groups','groups.id','=','users.id_group')->get();

        $view = Datatables::of($items);
        		$view->editColumn('image','
        				<?php $path = !empty($image) ? public_path("images/users/$image") : ""; ?>
        				<a class="img_thumb" title="{!! $fullname !!}" href="{!! (file_exists($path) ? url("images/users/$image") : url("images/noimage.jpg"))  !!}">
        					<img src="{!! (file_exists($path) ? url("images/users/$image") : url("images/noimage.jpg"))  !!}" style="width:50px;border:1px solid #ededed;" />
						</a>
        			');
        		$view->editColumn('status','
        			<?php $class = Helper::uri2(); ?>
        			<div class="btn-group btn-group-xs" data-toggle="buttons">
                        <a class="btn btn-{!! ($status=="active" ? "success" : "default") !!} {!! $id!=1 ? "up-status" : "" !!}" data-url="{!! url("panel/$class/status/$id") !!}">
                            Active
                        </a>
                        <a class="btn btn-{!! ($status!="active" ? "warning" : "default") !!} {!! $id!=1 ? "up-status" : "" !!}" data-url="{!! url("panel/$class/status/$id") !!}">
                            Non Active
                        </a>
                    </div>
    			');
        		$view->removeColumn('created_by');
        		$view->editColumn('created_at','{!! $created_at !!}<br/>By : {!! $created_by !!}');
                $view->addColumn('action','
                	<ul class="icons-list">
                		<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="{!! url("panel/users/edit/$id") !!}"><i class="icon-pencil7"></i> Edit </a></li>
								@if($id!=1)
									<li><a data-url="{!! url("panel/users/delete/$id") !!}" class="single-delete"><i class="icon-trash"></i> Delete </a></li>
								@endif
							</ul>
						</li>
					</ul>
		            ');
		        $view->editColumn('id', '
		            <input type="checkbox" class="check-id" name="id[]" value="{{ $id }}">
		        ');
		return $view->make();
    }

    public function getAdd(){
		$data['title'] = 'Add Data '.$this->title;
		$data['groups'] = M\Groups::orderBy('group_name')->get();
		return view('admin.'.$this->folder.'.form',$data);
	}

    public function getEdit($id)
	{
		if($id=='') return redirect()->back();
		$data['title'] = 'Edit '.$this->title;
		$data['data']  = M\Users::find($id);
		$data['groups'] = M\Groups::orderBy('group_name')->get();
		return view('admin.'.$this->folder.'.form',$data); 
	}

	public function postSave(Input $input)
	{
		$sessi = session('admin_session');
		$id = $input->id;
		if($id==''){
			$check = M\Users::where('email',$input->email)->first();
			if(!empty($check)){
				return redirect()->back()->with('error',"Failed! Data email $input->email is exists");
			}
			$check2 = M\Users::where('username',$input->username)->first();
			if(!empty($check2)){
				return redirect()->back()->with('error',"Failed! Data username $input->username is exists");
			}
			$up = new M\Users;
			$up->id_group = $input->id_group;
			$up->status   = ($input->status=='' ? 'non active' : 'active');
			$up->created_by        = $sessi->fullname;
			$msg = "Success! Data has been saved";
		}else{
			$check = M\Users::where('email',$input->email)->where('id','!=',$id)->first();
			if(!empty($check)){
				return redirect()->back()->with('error',"Failed! Data email $input->email is exists");
			}
			$check2 = M\Users::where('username',$input->username)->where('id','!=',$id)->first();
			if(!empty($check2)){
				return redirect()->back()->with('error',"Failed! Data username $input->username is exists");
			}
			$up = M\Users::find($id);
			$up->id_group = $input->id_group;
			$up->updated_by        = $sessi->fullname;
			$msg = "Success! Data has been updated";


			$file = $input->file('image');
            if(!empty($file))
            {
            	ImageHelper::DeleteImage('users',$up->image);
            }
		}

		$file = $input->file('image');
        if(!empty($file))
        {
        	$filename = ImageHelper::OriginImageFolder($file,'users');
        	ImageHelper::UploadImageOneSizeFolder('users',$filename);
			$up->image       = $filename;
        }

		$up->fullname = $input->fullname;
		$up->username = $input->username;
		$up->email    = $input->email;
		if($input->password!=''){
			$up->password = bcrypt($input->password); //create password
		}
		$up->save();
		//echo $up;
		if($id!=''){
			return redirect()->back()->with('message','Success! Data has been updated.');
		}
		return redirect('panel/'.$this->uri)->with('message', $msg);
	}

	public function getStatus($id='')
	{
		if($id=='') return redirect()->back();
		if($id=='1'){
			return redirect()->back()->with('error','Failed! Superadmin can not to update status!');
    	}else{
    		$up = M\Users::find($id);
    		$up->status = ($up->status=='active' ? 'non active' : 'active');
    		$up->save();
    		return redirect()->back()->with('message','Success! Data has been saved.');
    	}
	}

    public function getDelete($id='')
    {
    	if($id=='') return redirect()->back();
    	if($id=='1'){
    		return redirect()->back()->with('error','Failed! Superadmin can not to delete!');
    	}else{
    		$del = M\Users::find($id);
    		ImageHelper::DeleteImage('users',$del->image);
    		$del->delete();
    		return redirect()->back()->with('message','Success! Data has been deleted.');
    	}
    }

    public function postRemoveall(Input $input)
    {
    	$msg = '';
    	if(count($input->id)==0){
    		return redirect()->back()->with('error','Failed! No data selected.');
    	}else{
    		foreach ($input->id as $key => $id) {
    			if($id!='1'){
    				$del = M\Users::find($id);
    				ImageHelper::DeleteImage('users',$del->image);
    				$del->delete();
    			}else{
    				$msg = '<br/>Superadmin can not to delete!';
    			}
    		}
    		return redirect()->back()->with('message','Success! Data has been deleted. '.$msg);
    	}
    }


}
