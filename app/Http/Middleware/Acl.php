<?php

namespace App\Http\Middleware;
use Closure;
use App\Model as M;


class Acl {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) 
    {
        $session = session('admin_session');
        if (empty($session)) {
            return redirect('auth')->with('error', 'Please login first!.');
        }else{
            $id_group = $session['id_group'];
            if($id_group==1){
                return $next($request);
            }else{
                $class    = \Request::segment(2);
                $uri      = \Request::segment(3);
                $function = ($uri=='' ? 'index' : $uri);
                $check_access = M\Classfunction::where('class',$class)
                    ->where('function',$function)
                    ->first();
                if(empty($check_access)){
                     return redirect('panel')->with('error','You Dont have access! Please contact admin.'); 
                }else{
                    $access = M\Roleaccess::where('id_group',$id_group)->where('id_access',$check_access->id)->first();
                    if(empty($access)){
                       return redirect('panel')->with('error','You Dont have access! Please contact admin.');  
                   }else{
                        return $next($request);
                   }
                }
            }

        }
       
    }

}
