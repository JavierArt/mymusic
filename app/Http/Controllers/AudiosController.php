<?php

namespace App\Http\Controllers;

use App\Audio;
use App\Artistprofile;
use Illuminate\Http\Request;

class AudiosController extends Controller
{
  public function index($id)
  {
    $audios = Audio::all()->where('artistprofile_id',$id);
     //$audios = artistprofile::find($id)->audio;
     return view("audios.audio",compact('audios'));
  }
    public function create()
    {
         return view('audios.uploadAudioForm');
    }
    
  public function store(request $request)
  {
    $archivo = $request->file('audio');
    $nombreOriginal = $archivo->getClientOriginalName();
    $size = $archivo->getClientSize();
    $mime = $archivo->getMimeType();
    $id=artistprofile::find(3)->id;
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
     return redirect()->back()
          ->with([
            'message' => 'Archivo cargado con éxito',
            'alert-class' => 'alert-success'
          ]);
  }
  
   public function destroy(audios $archivo)
    {
        if (\Storage::exists($archivo->fs_name)) {
            \Storage::delete($archivo->fs_name);
            $archivo->delete();
        } else {
            return redirect()->back()->with([
            'message' => 'NO SE ENCONTRÓ ARCHIVO',
            'alert-class' => 'alert-danger'
          ]);
        }
        
        return redirect()->back()->with([
            'message' => 'Archivo borrado con éxito',
            'alert-class' => 'alert-warning'
          ]);
    }
  
    public function descarga(audios $archivo)
    {
     if (\Storage::exists($archivo->fs_name)) {
          $headers = ['Content-Type' => $archivo->mime];
          return \Storage::download($archivo->fs_name, $archivo->original_name, $headers);
      } else {
          return redirect()->back();
      }
    }
}