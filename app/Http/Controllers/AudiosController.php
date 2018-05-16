<?php

namespace App\Http\Controllers;

use App\Audio;
use App\Artistprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AudiosController extends Controller
{
  public function audiosfromprofile($id)
  {
     $audios = Audio::all()->where('artistprofile_id',$id);
     //$audios = artistprofile::find($id)->audio;
     return view("audios.audio",compact('audios'));
  }
    public function create()
    {
         return view('audios.uploadAudioForm');
    }
    
  public function store(request $request)//$id
  {
    $archivo = $request->file('audio');
    $nombreOriginal = $archivo->getClientOriginalName();
    $size = $archivo->getClientSize();
    $mime = $archivo->getMimeType();
    $id=artistprofile::find(9)->id;
    if ($request->hasFile('audio')) {
          $fs_name = $request->audio->store('');
           Audio::create([
              'artistprofile_id' => $id,
              'original_name' => $nombreOriginal,
              'fs_name' => $fs_name,
              'mime' => $mime,
              'size' => $size,
              'directory' => ''
            ]);
    }
            \Session::flash('flash_message','Archivo a sido cargado con exito');
              return redirect()->back();
  }
  
   public function destroy(Audio $archivo)
    {
        if (Storage::exists($archivo->fs_name)) {
            \Storage::delete($archivo->fs_name);
             $archivo->delete();
         dd($archivo); 
        }
     else {
       dd($archivo); 
          \Session::flash('flash_message','NO SE ENCONTRO ARCHIVO');
              return redirect()->back();
          return $archivo;
        }
        \Session::flash('flash_message','Archivo borrado con exito');
           return redirect()->back();                 
    }
  
    public function descarga(Audio $archivo)
    {
     if (\Storage::exists($archivo->fs_name)) {
          $headers = ['Content-Type' => $archivo->mime];
          return \Storage::download($archivo->fs_name, $archivo->original_name, $headers);
      } else {
          \Session::flash('flash_message','NO SE ENCONTRO ARCHIVO');
          return redirect()->back();
      }
    }
}