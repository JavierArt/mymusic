<?php

namespace App\Http\Controllers;

use App\Artistprofile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use DB;

class ArtistprofileController extends Controller
{
     /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth')->except(['index', 'show','search','mayorfirst','bandas','solistas','DJS']);
      $this->middleware('checkDprofile')->only(['create','store']);
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //eager loading
      $profile = Artistprofile::with('User')->paginate(4);
      if(Auth()->guard()->check() && Auth::user()->profornot == 0){
        $idperf=0;
        return redirect('/profile/create');
      }
      elseif(Auth()->guard()->check()){
        $idPerf=Artistprofile::find(Auth::user()->id)->user_id;
      }
      else{
        $idPerf=0;
      }
      return view('profiles.profile',compact('profile','idPerf'));
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
      $idu = Auth::user()->id;
      $user2=User::find($idu);
      $request ->validate([
      'bandornot'=>'required',
      'description'=>'required',
      'musictype'=>'required',
      'contactemail'=>'required|email',
      'artistname'=>'required'
    ]);
    $data = $request->all();
    $data['user_id'] = Auth::user()->id;
    $user2['profornot'] = 1;
    $add_profile = new Artistprofile($data);
    $add_profile->save();
    $user2->save();
    \Session::flash('flash_message','el perfil ha sido creado');
    return redirect('/profiles');
    }
  
    public function updateavatar(Request $request)
    {
      $request ->validate(['avatar'=>'mimetypes:image/jpeg,image/png']);
      if($request->hasFile('avatar')){
        $avatar=$request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
        $Perprof=Artistprofile::find(Auth::user()->id);
    		$Perprof->photo = $filename;
    		$Perprof->save();
      }
      return redirect('/profiles/');
      //return view("profiles.personalprofile",compact('Perprof'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\artistprofile  $artistprofile
     * @return \Illuminate\Http\Response
     */
    public function show($Perprof)
    {
      if(Auth()->guard()->check() && Auth::user()->profornot == 0){
        $idperf=0;
        return redirect('/profile/create');
      }
      else
      {
        $Perprof=Artistprofile::find($Perprof) ?? abort(404);;
        return view("profiles.personalprofile",compact('Perprof'));        
      }
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
      $item = Artistprofile::find($id);
      return view('profiles.editdataprofileForm',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\artistprofile  $artistprofile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $add_profile = Artistprofile::find($id);
      $add_profile->description = $request->description;
      $add_profile->bandornot = $request->bandornot;
      $add_profile->musictype = $request->musictype;
      $add_profile->contactemail = $request->contactemail;
      $add_profile->artistname = $request->artistname;
      if($add_profile->save()){
        \Session::flash('flash_message', 'perfil cambiado exitosamente!');
    }else{
        \Session::flash('flash_message', 'algo salio mal!');
    }
    return redirect('/profiles');
    }
    
    public function search($search)
    {
        $search = urldecode($search);
        $profileB = Artistprofile::with('User')
                ->where('musictype', 'LIKE', '%'.$search.'%')
                ->get();
        if (count($profileB) == 0){
            return View('profiles.search')
            ->with('message', 'No hay resultados que mostrar')
            ->with('search', $search);
        } else{
            return View('profiles.search')
            ->with('search', $search)
            ->with('profileB', $profileB);
        }
    }
    public function mayorfirst()
    {
      $profileM = User::with('Artistprofile')->get();
      $sorted = $profileM->sortBy('age');
        if (count($sorted) == 0){
            return View('profiles.search18')
            ->with('message', 'No hay perfiles mayores de edad que mostrar');
        } else{
            return View('profiles.search18')
            ->with('profileM', $sorted);
        }
    }
    public function bandas()
    {
      $profileBands= Artistprofile::with('User')
        ->where('bandornot','=','Banda')
        ->get();
      if (count($profileBands) == 0){
            return View('profiles.searchbands')
            ->with('message', 'No hay perfiles de bandas mostrar');
      }
      else{
        return view('profiles.searchbands')
        ->with('profileBands',$profileBands);
      }
    }
    public function solistas()
    {
      $profileBands= Artistprofile::with('User')
        ->where('bandornot','=','Solista')
        ->get();
      if (count($profileBands) == 0){
            return View('profiles.searchbands')
            ->with('message', 'No hay perfiles de solistas mostrar');
      }
      else{
        return view('profiles.searchbands')
        ->with('profileBands',$profileBands);
      }
    }
   
    public function DJS()
    {
      $profileBands=Artistprofile::with('User')
        ->where('bandornot','=', 'Dj')
        ->get();
      if(count($profileBands)==0){
        return view('profiles.searchbands')
          ->with('message', 'no hay perfiles que mostrar');
        }
        else{
          return view('profiles.searchbands')
            ->with('profileBands',$profileBands);
          }
    }
    /**
     * Remove the specified resource from storage.
    puede ayudar despues
     */
    /**public function destroy($id)
    {
        $Perprof = Artistprofile::find($id);
        $Perprof->delete();
      // redirect
        \Session::flash('flash_message', 'Perfil borrado con exito!');
        return Redirect('/profiles');
    }**/
      
    public function own($Perprof)
    {
       $Perprof=Artistprofile::find(Auth::user()->id);
       return view("profiles.personalprofile",compact('Perprof'));
    }
}
