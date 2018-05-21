<?php

namespace App\Http\Controllers;

use App\Video;
use App\Artistprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideosController extends Controller
{
  public function videosfromprofile($id)
  {
     $videos = Video::all()->where('artistprofile_id',$id);
     return view("videos.video",compact('videos'));
  }
  public function create()
  {
     return view('videos.uploadVideoForm');
  }
  
    public function store(request $request)
    {
        $request->file('video');
        $archivo = $request->file('video');
        $nombreOriginal = $archivo->getClientOriginalName();
        $size = $archivo->getClientSize();
        $mime = $archivo->getMimeType();
        $id=Artistprofile::find(2)->id;
        $request ->validate(['video'=>'mimetypes:video/mp4,video/mpeg,video/ogg,video/webm']);
        if ($request->hasFile('video')) {	
            $fs_name = $request->video->store('');
            Video::create([
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

    public function destroy(Video $archivo)
    {
          if(\Storage::exists($archivo->fs_name)) {
            \Storage::delete($archivo->fs_name);
            $archivo->delete();
        } else {
            dd($archivo);
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
   public function descarga(Video $archivo)
   {
     if (\Storage::exists($archivo->fs_name)) {
          $headers = ['Content-Type' => $archivo->mime];
          return \Storage::download($archivo->fs_name, $archivo->original_name, $headers);
      } 
      else {
        dd($archivo);
          return redirect()->back();
      }
   }
}
