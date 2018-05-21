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
     return view("audios.audio",compact('audios'));
  }
    public function create()
    {
         return view('audios.uploadAudioForm');
    }
    
  public function store(request $request)//$id
  {
    $request->file('audio');
    $archivo = $request->file('audio');
    $nombreOriginal = $archivo->getClientOriginalName();
    $size = $archivo->getClientSize();
    $mime = $archivo->getMimeType();
    $id=Artistprofile::find(1)->id;
    $request ->validate(['audio'=>'mimetypes:audio/mpeg,audio/mp4,audio/ogg,audio/x-wav']);
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
         \Session::flash('flash_message','Archivo ha sido cargado con exito');
              return redirect()->back();
    }
    else
    {
       \Session::flash('flash_message','El archivo debe tener un formato de audio valido');
              return redirect()->back();
    }
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
       dd($archivo);
          \Session::flash('flash_message','NO SE ENCONTRO ARCHIVO');
          return redirect()->back();
      }
    }
}