<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // if (auth()->guest()) {
        //     return redirect()->route('login'); // Redirect to login page
        // }
        //     $path = $request->path();
        //     if(($path=="login"|| $path=="register") && (Session::get('user'))){
        //         return redirect('admin/dashboard');
        //     }
        //     else if($path!="login"&&!Session::get('user')&& $path!="register"&&!Session::get('user'))
        //     {

        //     }
        return $next($request);
        
    
       
    }
}
