<?php

namespace App\Http\Controllers;

use App\Futurevent;
use App\Artistprofile;
use Illuminate\Http\Request;

class FutureventsController extends Controller
{
   public function __construct()
    {
      $this->middleware('auth')->except(['index', 'show']);
     
    }
  
    public function index($id)
    {
       $eventos = Futurevent::all()
         ->where('artistprofile_id',$id);//agregar fecha posterior a hoy
       return view("eventos.events",compact('eventos'));
    }

    public function create($id)
    {
        $evprof=Artistprofile::find($id);
        return view('eventos.dataeventsForm',compact('evprof'));
    }

    public function store(Request $request,$id)
    {
      $request ->validate([
      'place'=>'required',
      'date'=>'required',
      'hora'=>'required',
    ]);
    $data = $request->all();
    $data['artistprofile_id'] = $id;
    dd($data);
    $add_event = new Futurevent($data);
    $add_event->save();
    \Session::flash('flash_message','el evento ha sido creado');
    return redirect('/profiles');
    }

    public function show(futurevents $futurevents)
    {
        $eventos = Artistprofile::all()->where('artistprofile_id',$id);//histtorial eventos completo
       return view("eventos.events",compact('eventos'));
    }
}
