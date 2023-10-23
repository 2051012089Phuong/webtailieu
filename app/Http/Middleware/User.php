<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //neu chua dang nhap thi khong cho truy cap (khong phai user)
        
        if(Auth()->user()->usertype=='admin' || Auth()->user()->usertype=='user')
            return $next($request);
        else if(Auth()->user()->usertype=='suspended')
        {
            //abort(401, 'Không đủ quyền truy cập!');
            Auth::logout();
            return redirect('suspended-login');
        }
        else{
            return redirect('401-unauthorized');
        }
    }
}
