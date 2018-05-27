<?php

namespace App\Http\Controllers;

use App\Audio;
use App\Artistprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AudiosController extends Controller
{
   public function __construct()
    {
      $this->middleware('auth')->except(['audiosfromprofile', 'descarga']);
     
    }
  public function audiosfromprofile($id)
  {
     $audios = Audio::all()->where('artistprofile_id',$id);
     return view("audios.audio",compact('audios','url'));
  }

    
  public function store(request $request)
  {
    $request->file('audio');
    $archivo = $request->file('audio');
    $nombreOriginal = $archivo->getClientOriginalName();
    $size = $archivo->getClientSize();
    $mime = $archivo->getMimeType();
    $id=Artistprofile::find($id)->id;
    $request ->validate(['audio'=>'mimetypes:audio/mpeg,audio/mp4,audio/ogg,audio/x-wav']);
    if ($request->hasFile('audio')) {
          $fs_name = $request->audio->store('',$id);     
           Audio::create([
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
    else
    {
       \Session::flash('flash_message','El archivo debe tener un formato de audio valido');
              return redirect()->back();
    }
  }  
}