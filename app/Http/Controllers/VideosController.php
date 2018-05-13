<?php

namespace App\Http\Controllers;

use App\videos;
use App\Artistprofile;
use Illuminate\Http\Request;

class VideosController extends Controller
{
  public function index($id)
  {
     $videos = artistprofile::find($id)->audio;
     return view("videos.video",compact('videos'));
  }
    public function store(Request $request)
    {
        $request->file('archivos');
        $archivo = $request->file('archivos');
        $nombreOriginal = $archivo->getClientOriginalName();
        $size = $archivo->getClientSize();
        $mime = $archivo->getMimeType();
      
        if ($request->hasFile('archivos')) {
            $fs_name = $request->archivos->store('');
           
            Archivo::create([
              'origen_id' => $request->input('origen_id'),
              'original_name' => $nombreOriginal,
              'fs_name' => $fs_name,
              'mime' => $mime,
              'size' => $size,
              'directorio' => ''
            ]);
        }
      
         return redirect()->back()
          ->with([
            'message' => 'Archivo cargado con éxito',
            'alert-class' => 'alert-success'
          ]);

    }

    public function destroy(videos $videos)
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
   public function descarga(videos $videos)
   {
     if (\Storage::exists($archivo->fs_name)) {
          $headers = ['Content-Type' => $archivo->mime];
          return \Storage::download($archivo->fs_name, $archivo->original_name, $headers);
      } 
      else {
          return redirect()->back();
      }
   }
}
