<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pictures;
use App\Artistprofile;



class PicturesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->only(['store']);
     
    }
   public function picsfromprofile($id)
  {
     $pictures = Pictures::all()->where('artistprofile_id',$id);
     return view("pictures.pictures",compact('pictures'));//hacer vista
  }
  //hacer rutas
  public function store(request $request)
  {
    //hacer formulario y ponerlo en vista
    $idPerf=Artistprofile::find(Auth::user()->id)->id;
    $request->file('picture');
    $archivo = $request->file('picture');
    $nombreOriginal = $archivo->getClientOriginalName();
    $size = $archivo->getClientSize();
    $mime = $archivo->getMimeType();
    $id=Artistprofile::find($idPerf)->id;
    
    $request ->validate(['picture'=>'mimetypes:image/jpeg,image/png']);
    if ($request->hasFile('picture')) {
          $fs_name = $request->picture->store('');     
           Pictures::create([
              'artistprofile_id' => $id,
              'original_name' => $nombreOriginal,
              'fs_name' => $fs_name,
              'mime' => $mime,
              'size' => $size,
              'directory' => ''
            ]);
         \Session::flash('flash_message','Audio ha sido cargado con exito');
              return redirect()->back();
    }
  }
}
