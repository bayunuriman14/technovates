<?php

namespace App\Http\Middleware;
use Closure;


class Authlogin {

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
        if (empty($session)) 
        {
            return redirect('auth')->with('error', 'Please login first!.');
        }else{
            return $next($request);
        }
       
    }

}
