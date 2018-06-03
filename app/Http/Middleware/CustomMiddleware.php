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
      /*$date1before = auth()->user()->age;
      $date2now = date_create('now');
      $interval = date_diff($date1before, $date2now);
      $interval->format('%R%a años')
        $diff = $date1->diff($date2);
      // will output 2 days
      echo $diff->years . ' days ';
      //resta entre fecha de nacimiento y fecha actual*/
      if(auth()->user()->age <=13)
      {
        \Session::flash('flash_message','no tienes edad para crear perfil');
        return redirect('profiles');
      }
        return $next($request);
    }
}
