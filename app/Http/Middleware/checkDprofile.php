<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class checkDprofile
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
      //if usuario autenticado cuenta con un perfil no puede crear otro
      $count = Auth::user()::withCount('Artistprofile')->get();
      dd($count);
       if ($idd > 1) {
           \Session::flash('flash_message','no puedes crear mas de un perfil');
            return redirect('/profiles');
        }
        return $next($request);
    }
}
