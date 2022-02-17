<?php

namespace App\Http\Middleware;


use Closure;
use Auth;

class AdminAuthMiddleware
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
       if (Auth::user() &&  Auth::user()->user_role == 'admin' && Auth::user()->status==1 && Auth::user()->account_status=='Active') 
       {
        return $next($request);
    }

    return redirect('/login');
}

}
