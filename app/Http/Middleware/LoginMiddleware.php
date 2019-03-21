<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        //判断是否有session值
        $user_id=session('user_id');
        if(empty($user_id)){
            //跳转到登录页面
            return redirect('login');
        }
        return $next($request);
    }
}
