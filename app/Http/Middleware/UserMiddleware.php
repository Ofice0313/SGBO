<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            //verifica se o usuário tem o papel de User
            if (Auth::user()->role == "USER") {
                return $next($request);
            }else
            {
                Auth::logout();
                return redirect(url('login'));
            }
        }else{
            Auth::logout();
            return redirect(url('login'));
        }
    }
}
