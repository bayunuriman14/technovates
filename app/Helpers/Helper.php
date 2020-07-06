<?php 
use App\Model as M;


class Helper {

	public static  function userbyid($id)
	{
		return M\Users::find($id);
	}

	public static  function groupbyid($id)
	{
		return M\Groups::find($id);
	}

	public static function jobgroupbyid($id)
	{
		return M\Jobgroup::find($id);
	}

	public static function uri2(){
		return Request::segment(2);
	}

	public static function uri3(){
		return Request::segment(3);
	}

	public static function uri4(){
		return Request::segment(4);
	}

	public static function slug($str)
	{
        $str = strtolower(trim($str));
        $str = preg_replace('/[^a-z0-9-]/', '-', $str);
        $str = preg_replace('/-+/', "-", $str);
        return $str;
	}
	
	public static function tgl_indo($date)
    {
    	if(session('lang')==2){
			$bln_indo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		}else{
			$bln_indo = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		}

		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl   = substr($date, 8, 2);

		$result = $tgl . " " . $bln_indo[(int)$bulan-1] . " ". $tahun;		
		return($result);
	}

	public static function tgl_indo_sort($date)
    {
    	if(session('lang')==2){
			$bln_indo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		}else{
			$bln_indo = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		}

		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl   = substr($date, 8, 2);

		$result = $tgl . "-" . $bulan . "-". $tahun;		
		return($result);
	}

	public static function limit_words($string, $word_limit)
	{
        $words = explode(" ",$string);
        if(count($words)>$word_limit){
           return implode(" ",array_splice($words,0,$word_limit));
        }else{
           return $string;
        }
    }

    public static function insert_class_function()
	{
		$routeCollection = Route::getRoutes();

		$c = array(); $f = array(); $m = array();
		foreach ($routeCollection as $value) {
			if (stripos($value->getPath(),'panel/') !== false) {
				$rute = explode('/',$value->getPath());
				if(count($rute)>2 && $rute[2]!='{_missing}' && $rute[2]!='{one?}'){

					$class    = $rute[1]; 
					$function = $rute[2];
					$alias    = ucwords($function);
					$method   = $value->getMethods()[0];
					$route    = $value->getPath();
					$action   = $value->getActionName();

							// check if function not match 
					$c[] = $rute[1]; $f[] = $rute[2]; $m[] = $value->getMethods()[0];

					$check = M\Classfunction::where('method',$method)->where('class',$class)->where('function',$function)->first();
					if(empty($check)){
						$up = new M\Classfunction;
						$up->class    = $class;
						$up->function = $function;
						$up->alias    = $alias;
						$up->method   = $method;
						$up->route    = $route;
						$up->action   = $action;
						$up->save();
					}
				}
			}
		}
	}

	public static function count_function($id_group, $function)
	{
		$id_access = array();
		foreach ($function as $key => $value) {
			$id_access[] = $key;
		}
		$check = M\Roleaccess::where('id_group',$id_group)->whereIn('id_access',$id_access)->get();
		if(count($check)>0){
			return "checked";
		}
	}

	public static function hide_menu($class='', $function='')
	{
		$session = session('admin_session');
		$id_group = $session['id_group'];
		if($id_group!=1){

			$class = M\Classfunction::where('class',$class)->where('function',$function)->first();
			if(!empty($class)){
				$cek_akses = M\Roleaccess::where('id_group',$id_group)->where('id_access',$class->id)->first();
				if(!empty($cek_akses)){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return true;
		}
	}

	public static function site()
	{
		return M\Sitesetting::find(1);
	}

	public static function table($table='')
	{
		return \DB::table($table);
	}

	public static function module($table='',$id='')
	{
		$data = \DB::table($table)->find($id);
		return $data;
	}

	public static function list_category_post($select='')
	{
		$data = M\CategoryPost::orderBy('cat_name','asc')->whereNull('parent')->get();
		$option = '';
		if(count($data)>0)
		{
			foreach ($data as $key => $value) {
				$sel = ($select!='' && $select==$value->id ? 'selected' : '');
				$option .= '<option value="'.$value->id.'" '.$sel.'>'.$value->cat_name.'</option>';
				$option .= \Helper::child($value->id, $select,2);
			}
		}
		return $option;
	}

	public static function child($id, $select, $level=2)
	{
		$option = '';
		$data2 = M\CategoryPost::orderBy('cat_name','asc')->where('parent',$id)->get();
		if(count($data2)>0)
		{
			foreach ($data2 as $key2 => $value2) {
				$sel = ($select!='' && $select==$value2->id ? 'selected' : '');
				$option .= '<option value="'.$value2->id.'" '.$sel.'>'.str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level).$value2->cat_name.'</option>';
				$option .= \Helper::child($value2->id, $select,$level +2);
			}
		}
		return $option;
	}

	public static function catpostByid($id)
	{
		return M\CategoryPost::find($id);
	}

	public static function composeReply($status,$msg,$payload = null) {
		header("Content-Type: application/json");
		$reply = json_encode(array(
							"SENDER" => "Task Management",
							"STATUS" => $status,
							"MESSAGE" => $msg,
							"PAYLOAD" => $payload));

		return $reply;
	}

	public static function composeReply2($status,$msg,$payload = null) { //LARAVEL WAY
		$reply = json_encode(array(
				  "SENDER" => "lightHOUSE Indonesia",
				  "STATUS" => $status,
				  "MESSAGE" => $msg,
				  "PAYLOAD" => $payload));

		return Response::make($reply, '200')->header('Content-Type', 'application/json');
	}

	public static function getSubMenu($mnsId) {
		$ref = DB::table("bie_menu_sub")
			->where("MNS_ID",$mnsId)
			->first();

		if(count($ref) > 0) {
			return $ref->{"MNS_NAME"};
		}
	  	else {
	  		return "";
	  	}
	}

	public static function comboSatuan($id="id_satuan",$sel="",$required=""){
	    $ret = "<select id=\"$id\" name=\"$id\" $required style='width: 100%;' class=\"select-search\">";
	    $ret.="<option value=\"\">.: Pilihan :.</option>";

	    $rs = \DB::table('satuan')->orderBy('id','asc')->get();
	    foreach($rs as $item){
	        $isSel = (($item->id==$sel)?"selected":"");
	        $ret.="<option value=\"".$item->id."\" $isSel >".$item->nama."</option>";
	    }
	    $ret.="</select>";
	    return $ret;
	}

	/*helper sownload*/
public static function force_download($filename = '', $data = '')
{
    if ($filename == '' OR $data == '')
    {
        return FALSE;
    }

        // Try to determine if the filename includes a file extension.
        // We need it in order to set the MIME type
    if (FALSE === strpos($filename, '.'))
    {
        return FALSE;
    }

        // Grab the file extension
    $x = explode('.', $filename);
    $extension = end($x);

        // Load the mime types
    if (defined('ENVIRONMENT') AND is_file('app/'.ENVIRONMENT.'/mimes.php'))
    {
        include('app/'.ENVIRONMENT.'/mimes.php');
    }
    elseif (is_file('app/mimes.php'))
    {
        include('app/mimes.php');
    }

        // Set a default mime if we can't find it
    if ( ! isset($mimes[$extension]))
    {
        $mime = 'application/octet-stream';
    }
    else
    {
        $mime = (is_array($mimes[$extension])) ? $mimes[$extension][0] : $mimes[$extension];
    }

        // Generate the server headers
    if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== FALSE)
    {
        header('Content-Type: "'.$mime.'"');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header("Content-Transfer-Encoding: binary");
        header('Pragma: public');
        header("Content-Length: ".strlen($data));
    }
    else
    {
        header('Content-Type: "'.$mime.'"');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header("Content-Transfer-Encoding: binary");
        header('Expires: 0');
        header('Pragma: no-cache');
        header("Content-Length: ".strlen($data));
    }

    exit($data);
}





}