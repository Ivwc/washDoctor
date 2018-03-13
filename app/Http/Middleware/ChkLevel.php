<?php

namespace App\Http\Middleware;

use Closure;

class ChkLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if(session('level') == 0){
            return $next($request);
        }else{
            return array('status'=>'204','msg'=>'权限不足，请联络管理员');
        }
        
    }
}
