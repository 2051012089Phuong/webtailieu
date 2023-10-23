<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //neu khong phai admin thi khong cho truy cap
        if(!Auth()->user())
        {
            return redirect('login');
        }
        if(Auth()->user()->usertype=='admin')
            return $next($request);
        else
        {
            //abort(401, 'Không đủ quyền truy cập!');
            return redirect('401-unauthorized');
        }
    }
}
