<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Suspended
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //neu tai khoan bi dinh chi thi khong cho truy cap (user bi dinh chi)
        
        if(Auth()->user()->usertype=='suspended')
        {   
            return redirect('suspended-login');
        }
        else
        {
            return $next($request);
        }
    }
}
