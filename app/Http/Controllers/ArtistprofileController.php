<?php

namespace App\Http\Controllers;

use App\Artistprofile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
      $this->middleware('minage')->only(['create','store']);
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //contraining eager load
        /*$profile = Artistprofile::with(['User' => function ($query) {            
          $query->where('age', '>=', 18 );
        }])->get();*/
        //eager loading
        $profile = Artistprofile::with('User')->get();
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
      'contactemail'=>'required|email',
      'artistname'=>'required'
    ]);
    $data = $request->all();
    $data['user_id'] = Auth::user()->id;
    $add_profile = new Artistprofile($data);
    $add_profile->save();
    \Session::flash('flash_message','el perfil ha sido creado');
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
        $Perprof=Artistprofile::find($Perprof);
        return view("profiles.personalprofile",compact('Perprof'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\artistprofile  $artistprofile
     * @return \Illuminate\Http\Response
     */
  //tengo que hacer edit  y update despues
    public function edit($id)
    {
        return view('profiles.editdataprofileForm');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\artistprofile  $artistprofile
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      $request ->validate([
      'description'=>'required',
      'musictype'=>'required',
      'contactemail'=>'required',
      'artistname'=>'required'
    ]);

        $atu = Artistprofile::find($id);
        $atu = $request->all();
        $atu['user_id'] = Auth::user()->id;
        $atu->save();
        // redirect
        \Session::flash('flash_message', 'Successfully updated profile!');
        return Redirect('profiles');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\artistprofile  $artistprofile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Perprof = Artistprofile::find($id);
        $Perprof->delete();
      // redirect
        \Session::flash('flash_message', 'Perfil borrado con exito!');
        return Redirect('/profiles');
    }
    
    //aun debo implementar pero no es prioridad
  /*
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
