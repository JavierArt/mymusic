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
      $this->middleware('minage')->only(['create','store']);
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         /*$profile = Artistprofile::whereHas(['User' => function ($query) {
            $query->where('User->name', 'pepe');
          }])->get();*/
        //$profile = Artistprofile::with('User')->get();        <--!--td>{{ $prof->User->name}}</td--!-->
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
        $Perprof=artistprofile::find($Perprof);
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
        $Profile = artistprofile::find($id);        
        // show the edit form and pass the nerd
        return view('profiles.editdataprofileForm',compact('Profi'));
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

        $atu = artistprofile::find($id);
        $atu = $request->all();
        $atu['user_id'] = Auth::user()->id;
        $atu->save();
        // redirect
        Session::flash('flash_message', 'Successfully updated profile!');
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
        $Perprof = artistprofile::find($id);
        $Perprof->delete();
      // redirect
        Session::flash('flash_message', 'Successfully deleted the the profile!');
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
