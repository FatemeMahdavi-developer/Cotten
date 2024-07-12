<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Config::get('lang.common.lang.1');
        // $cookie = cookie('locale','1',30*2); 

        // if($request->hasCookie('locale')) {
        //     Config::get('lang.common.lang.'.$cookie);
        //     return $next($request);    
        // }
        
        // // $locale = locale::generate();
        // // return $next($request)
        // //     ->withCookie(cookie()->forever('locale', $locale));

    }
}
