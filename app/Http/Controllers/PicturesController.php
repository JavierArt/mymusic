<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pictures;
use App\Artistprofile;
use Image;



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
  
  public function store(request $request)
  {
    
    $request ->validate(['picture'=>'mimetypes:image/jpeg,image/png']);
    if ($request->hasFile('picture')) {
      $idPerf=Artistprofile::find(Auth::user()->id)->id;
      $archivo = $request->file('picture');
      $fs_name = time() . '.' . $archivo->getClientOriginalExtension();
      $nombreOriginal = $archivo->getClientOriginalName();
      $size = $archivo->getClientSize();
      $mime = $archivo->getMimeType();
      $id=Artistprofile::find($idPerf)->id;
        Image::make($archivo)->resize(200, 200)->save( public_path('/uploads/pictures/' . $fs_name ) );
           Pictures::create([
              'artistprofile_id' => $id,
              'original_name' => $nombreOriginal,
              'fs_name' => $fs_name,
              'mime' => $mime,
              'size' => $size,
              'directory' => ''
            ]);
         \Session::flash('flash_message','Imagen cargada con exito');
              return redirect()->back();
    }
     else{
      \Session::flash('flash_message','elige una imagen a cargar');
              return redirect()->back();
    }
  }
}