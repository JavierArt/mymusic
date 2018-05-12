<?php

namespace App\Http\Controllers;

use App\Artistprofile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\view\Middleware\ShareErrorsFromSession;

class ArtistprofileController extends Controller
{
     /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth')->except(['index', 'show']);
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = artistprofile::all();
        return view('profiles.profile',compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('profiles.dataprofileForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request ->validate([
      'description'=>'required',
      'musictype'=>'required',
      'contactemail'=>'required',
      'artistname'=>'required'
    ]);
    $data = $request->all();
    $data['user_id'] = Auth::user()->id;
    $add_profile = new artistprofile($data);
    $add_profile->save();
    return redirect('/profiles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\artistprofile  $artistprofile
     * @return \Illuminate\Http\Response
     */
    public function show($Perprof)
    {
        $Perprof=artistprofile::find($Perprof);
        return view("profiles.personalprofile",compact('Perprof'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\artistprofile  $artistprofile
     * @return \Illuminate\Http\Response
     */
    public function edit(artistprofile $artistprofile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\artistprofile  $artistprofile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, artistprofile $artistprofile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\artistprofile  $artistprofile
     * @return \Illuminate\Http\Response
     */
    public function destroy(artistprofile $artistprofile)
    {
        //
    }
    
 /*   //aun debo implementar pero no es prioridad
    public function myownprofile($Owprofile)
    {
      //objeto usuario logeado
      $user = Auth::user();
      // Obtiene el ID del Usuario Autenticado
      $UPprof = Auth::$user->id;
      //uso de accesor con ID usuario loggeado para encontrar el perfil perteneciente al usuario
      $Ownprofile = artistprofile::find($OwID);
           
      return view("profiles.personalprofile",compact('Ownprofile'));
    }*/
}
