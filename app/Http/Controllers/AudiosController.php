<?php

namespace App\Http\Controllers;

use App\Audio;
use App\Artistprofile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class AudiosController extends Controller
{
   public function __construct()
    {
      $this->middleware('auth')->only(['store']);
     
    }
  public function audiosfromprofile($id)
  {
     $audios = Audio::all()->where('artistprofile_id',$id);
     return view("audios.audio",compact('audios'));
  }

    
  public function store(request $request)
  {
    
    $request ->validate(['audio'=>'mimetypes:audio/mpeg,audio/mp4,audio/ogg,audio/x-wav']);
    if ($request->hasFile('audio')) {
        $idPerf=Artistprofile::find(Auth::user()->id)->id;
        $archivo = $request->file('audio');
        $nombreOriginal = $archivo->getClientOriginalName();
        $size = $archivo->getClientSize();
        $mime = $archivo->getMimeType();
        $id=Artistprofile::find($idPerf)->id;
           $fs_name = $request->audio->store('');
           Storage::move($fs_name, 'public/'.$fs_name);
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
    else{
      \Session::flash('flash_message','elige un archivo de audio a cargar');
              return redirect()->back();
    }
  }
}