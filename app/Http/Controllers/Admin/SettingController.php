<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use App\Http\Requests\Input;
use App\Model as M;
use Hash, Helper, Session, Datatables, Image;

class SettingController extends Controller {

	protected $uri    = 'setting';
	protected $folder = 'setting';
	protected $title  = 'Site Setting';

	public function __construct()
	{
		
	}

	public function getIndex()
	{
		$data['title'] = $this->title;
		$data['data'] = M\Sitesetting::orderBy('id')->first();
		return view('admin.'.$this->folder.'.index',$data);
	}

	public function postSave(Input $input)
	{
		$sessi = session('admin_session');
		$id = $input->id;
		$up = M\Sitesetting::find($id);
		// meta data
		$up->author      = $input->author;
		$up->title       = $input->title;
		$up->keywords    = $input->keywords;
		$up->description = $input->description;
		$up->footer      = $input->footer;
		//contact info
		$up->email     = $input->email;
		$up->phone     = $input->phone;
		$up->address   = $input->address;
		$up->maps      = $input->maps;
		$up->facebook  = $input->facebook;
		$up->twitter   = $input->twitter;
		$up->gplus     = $input->gplus;
		$up->video     = $input->video;
		//media info
		$del_fav = $input->del_fav;
        if(!empty($del_fav))
        {
        	$this->getDeleteimage($id,'favicon');
        }
        $favicon = $input->file('favicon');
        if(!empty($favicon))
        {
        	$this->getDeleteimage($id,'favicon');
        	$this->getSaveimage($id,'favicon',$favicon);
        }
        //logo
        $del_logo = $input->del_logo;
        if(!empty($del_logo))
        {
        	$this->getDeleteimage($id,'logo');
        }
        $logo = $input->file('logo');
        if(!empty($logo))
        {
        	$this->getDeleteimage($id,'logo');
        	$this->getSaveimage($id,'logo',$logo);
        }
        //image
        $del_image = $input->del_image;
        if(!empty($del_image))
        {
        	$this->getDeleteimage($id,'image');
        }
        $image = $input->file('image');
        if(!empty($image))
        {
        	$this->getDeleteimage($id,'image');
        	$this->getSaveimage($id,'image',$image);
        }
        //banner
        $del_banner = $input->del_banner;
        if(!empty($del_banner))
        {
        	$this->getDeleteimage($id,'banner');
        }
        $banner = $input->file('banner');
        if(!empty($banner))
        {
        	$this->getDeleteimage($id,'banner');
        	$this->getSaveimage($id,'banner',$banner);
        }

		$up->save();
		return redirect()->back()->with('message', 'Success! Data has been updated');
	}

	public function getSaveimage($id,$name='',$file='')
	{
		$up = M\Sitesetting::find($id);
		if($file!='')
		{
			$destinationPath = 'images';
			$filename        = $name.'.'.$file->getClientOriginalExtension();
			$upload_success  = $file->move($destinationPath, $filename);
			$up[$name]       = $filename;
        }
		$up->save();
	}

	public function getDeleteimage($id,$name='')
	{
		$up = M\Sitesetting::find($id);
		if($name!='')
		{
			$fname = public_path("images/".$up[$name]);
            if(file_exists($fname)){
                File::delete($fname);
            }
			$up[$name]  = '';
        }
		$up->save();
	}

	public function getApps()
	{
		$file          = base_path('.env');
		$file2          = base_path('.backup');
		//backup config .env to .backup
		$html   = "<pre>";
		$html   .= File::get($file);
		$html   .= "</pre>";
		$ambil  = str_replace('<pre>', '', $html);
		$hasil  = str_replace('</pre>', '', $ambil);
		$backup = File::put($file2, $hasil);
		

        $data['contents']       = File::get($file);
		$data['title'] = $this->title.' Apps';
        return view('admin.'.$this->folder.'.setting',$data);
	}

	public function postSaveconfig(Input $input)
	{
		$config = $input->config;
		$html   = "<pre>";
		$html   .= $config;
		$html   .= "</pre>";
		$ambil  = str_replace('<pre>', '', $html);
		$hasil  = str_replace('</pre>', '', $ambil);
		if($config!=''){
			$file           = base_path('.env');
			File::put($file, $hasil);
		}

		return redirect()->back()->with('message', 'Success! Data has been updated');
	}

	public function getEditor()
	{
		$data['title'] = $this->title.' > File Editor';
        return view('admin.'.$this->folder.'.editor',$data);
	}

	public function getFilemanager()
	{
		// return resource_path();
		// return base_path();
		$root = base_path(); 
		$html = '';
		if(is_dir($root))
		{
			$html .= '<ul class="jqueryFileTree" style="display: block;">';
			$files = File::directories($root);
			natcasesort($files);
			if(count($files)>0)
			{
					// All Folder
					foreach( $files as $key => $file ) {
						$ex = explode('/', $file);
						$html .= '<li class="directory collapsed" data-root="'.str_replace('/', '^', htmlentities($file)).'" data-key="'.$key.end($ex).'">
									<a class="cek-folder">'.end($ex).'</a>
									<span class="dh_'.$key.end($ex).'" style="display:none;">Loading .....</span>
								<li>';
					}
			}

			//GET ALL FILE
			$files = File::Files($root);
			natcasesort($files);
			if(count($files)>0)
			{
					// All Folder
					foreach( $files as $key => $file ) {
						$ext = preg_replace('/^.*\./', '', $file);
						$ex = explode('/', $file);
						if($ext=='ico' || $ext=='png' || $ext=='jpg' || $ext=='gif'){
							$class = '';
						}else{
							$class = 'edit_file';
						}
						$html .= '<li class="file ext_'.$ext.'">
									<a class="'.$class.'" data-file="'.str_replace('/', '^', htmlentities($file)).'">'.end($ex).'</a>
								<li>';
					}
			}

			$html .= '</ul>';

			return $html;
		}else{
			return '';
		}
		return $root;

	}

	public function getCekfile($root)
	{

		$folder = str_replace('^', '/', $root);
		$html = '';
		if(is_dir($folder))
		{
			$html .= '<ul class="jqueryFileTree" style="display: block;">';
			$files = File::directories($folder);
			natcasesort($files);
			if(count($files)>0)
			{
					// All Folder
					foreach( $files as $key => $file ) {
						$ex = explode('/', $file);
						$html .= '<li class="directory collapsed" data-root="'.str_replace('/', '^', htmlentities($file)).'" data-key="'.$key.end($ex).$key.'">
									<a class="cek-folder">'.end($ex).'</a>
									<span class="dh_'.$key.end($ex).$key.'" style="display:none;">Loading .....</span>
								<li>';
					}
			}

			//GET ALL FILE
			$files = File::files($folder);
			natcasesort($files);
			if(count($files)>0)
			{
					// All Folder
					foreach( $files as $key => $file ) {
						$ext = preg_replace('/^.*\./', '', $file);
						$ex = explode('/', $file);
						if($ext=='ico' || $ext=='png' || $ext=='jpg' || $ext=='gif'){
							$class = '';
						}else{
							$class = 'edit_file';
						}
						$html .= '<li class="file ext_'.$ext.'"><a class="'.$class.'" data-file="'.str_replace('/', '^', htmlentities($file)).'">'.end($ex).'</a><li>';
					}
			}

			$html .= '</ul>';

			return $html;
		}

	}

	public function getShowcontent($file)
	{
		$filename = str_replace('^', '/', $file);
		if(file_exists($filename))
		{
			$content = file_get_contents($filename);
		} else {
			$content = '';
		}
		$data['file'] =  $filename;
		$data['content'] =  $content;
		return $data;
	}

	public function postSavefileeditor(Input $input)
	{
		$filename = $input->file_name;
		$content = $input->content;
		$html   = "<pre>";
		$html   .= $content;
		$html   .= "</pre>";
		$ambil  = str_replace('<pre>', '', $html);
		$hasil  = str_replace('</pre>', '', $ambil);
		if($content!=''){
			$file           = $filename;
			File::put($file, $hasil);
		}

		return redirect()->back()->with('message', 'Success! Data has been updated');
	}

	public function getMenu()
	{
		return "menu";
	}

	


}
