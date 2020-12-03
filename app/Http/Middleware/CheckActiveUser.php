<?php
namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\App;


class CheckActiveUser {
    public function handle($request, Closure $next)
    {
            // if (!$request->secure() && App::environment() === 'production') {
            //     return redirect()->secure($request->getRequestUri());
            //     // return $next($request);
            // }
            // dd(Auth::user());
            
            if (Auth::check()){
                if(Auth::user()->status == 0){
                    Auth::logout();
                    // $request->session()->flush();
                    return redirect('/');
                } 
            }
            return $next($request);
            
            
    }
}