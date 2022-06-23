<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        if(!session()->has('loginId') &&($request->path()!='login'&& $request->path()!='registration'))
        {
            return redirect('login')->with ('fail','You must be looged in');
        }
        if(session()->has('loginId') && ($request->path() =='login' || $request->path() == 'registration'))
        {
            return back();
        }
        $response = $next($request);
        $response->headers->set('Cache-Control','no-cache, no-store, max-age=0, must-revalidate');
        $response->headers->set('Pragma','no-cache');
        $response->headers->set('Expires','Sat 01 Jan 1990 00:00:00 GMT');
        return $response;
       
    }
}
