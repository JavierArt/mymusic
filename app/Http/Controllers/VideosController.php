<?php

namespace App\Http\Controllers;

use App\Video;
use App\Artistprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class VideosController extends Controller
{
  public function videosfromprofile($id)
  {
     $videos = Video::all()->where('artistprofile_id',$id);
     return view("videos.video",compact('videos'));
  }
  
    public function store(request $request)
    {
      
        $request ->validate(['video'=>'mimetypes:video/mp4,video/mpeg,video/ogg,video/webm']);
        if ($request->hasFile('video')) {	
          $idPerf=Artistprofile::find(Auth::user()->id)->id;
          $archivo = $request->file('video');
          $nombreOriginal = $archivo->getClientOriginalName();
          $size = $archivo->getClientSize();
          $mime = $archivo->getMimeType();
          $id=Artistprofile::find($idPerf)->id;
            $fs_name = $request->video->store('');
            Storage::move($fs_name, 'public/'.$fs_name);
            Video::create([
              'artistprofile_id' => $id,
              'original_name' => $nombreOriginal,
              'fs_name' => $fs_name,
              'mime' => $mime,
              'size' => $size,
              'directory' => ''
            ]);
       \Session::flash('flash_message','Video a sido cargado con exito');
       return redirect()->back();
        }
       else{
      \Session::flash('flash_message','elige un archivo de video a cargar');
              return redirect()->back();
    }
    }
}
