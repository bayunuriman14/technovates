<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\Input;
use App\Model as M;
use Datatables, Helper;

class RoleaccessController extends Controller {

	protected $uri    = 'role_access';
	protected $folder = 'roleaccess';
	protected $title  = 'Role Access';

	public function __construct()
	{
		
	}

	public function getIndex()
	{

		$data['title'] = 'List '.$this->title;
		$getdata = M\Classfunction::orderBy('class')->get();
		$hasil = [];
		foreach ($getdata as $key => $value) {
			$hasil[$value->class][$value->id] = $value->alias; 
		}
		$returndata = M\Groups::select(\DB::raw('groups.id as id_group'),'id_access')
					->leftJoin('role_access','role_access.id_group','=','groups.id')
					->orderBy('groups.id')
					->where('groups.id','!=',1)->get();
		$return = [];
		foreach ($returndata as $i => $item) {
			$return[$item->id_group][$item->id_access] = $item->id_group;
		}
		$data['classfunction'] = $hasil;
		$data['all_access'] = $return;

		return view('admin.'.$this->folder.'.index',$data); 
	}

	public function postData(Input $input)
    {
        $items = M\Classfunction::select('id', 'class', 'function', 'alias', 'method');

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

	public function postSave(Input $input)
	{
		//remove roll access old
		$remove_old_access = M\Roleaccess::orderBy('id')->get();
		foreach ($remove_old_access as $keya => $valuea) {
			$rem_a = M\Roleaccess::find($valuea->id)->delete(); 
		}

		if(count($input->id_access)>0){

			foreach ($input->id_access as $id_group => $value) {
				if(count($value)>0){
					foreach ($value as $key => $id_access) {
						$save_access = new M\Roleaccess;
						$save_access->id_group = $id_group;
						$save_access->id_access = $id_access;
						$save_access->save();
					}
				}else{
					// return redirect()->back()->with('error',"Filed!! No data role access selected");
					return redirect()->back()->with('message',"Success!! Data has been saved");
				}
			}

			return redirect()->back()->with('message',"Success!! Data has been saved");
		}else{
			// return redirect()->back()->with('error',"Filed!! Data is empty. No data role access selected");
			return redirect()->back()->with('message',"Success!! Data has been saved");
		}
		
	} 

    public function getReload()
    {
    	Helper::insert_class_function();
    	return redirect()->back()->with('message','Success! Data has been Reloaded.');
    }


}
