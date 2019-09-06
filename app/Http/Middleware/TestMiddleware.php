<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleware
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
        $login = \App\Employee::find($request->username);
        if(empty($login->EMPLOYEE_ID)){
            return redirect('login');
        }
        return $next($request);
    }
}
