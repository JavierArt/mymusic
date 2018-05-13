<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;

use Closure;

class CustomMiddleware
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
      
      if(auth()->user()->age <=10)
      {
        \Session::flash('flash_message','no tienes edad para crear perfil');
        return redirect('profiles');
      }
        return $next($request);
    }
}
