<?php

namespace App\Http\Controllers;

use App\Futurevent;
use App\Artistprofile;
use Illuminate\Http\Request;
use DB;

class FutureventsController extends Controller
{
   public function __construct()
    {
      $this->middleware('auth')->except(['index', 'show']);
    }
  
    public function index($id)
    {
      $today=now();
       $eventos = Futurevent::all()
         ->where('artistprofile_id',$id)->where('date','>=',$today)
         ->sortBy('date');
        DB::table('futurevents')->where('date', '<', $today )->delete();
       return view("eventos.events",compact('eventos'));
    }

    public function create($id)
    {
        $evprof=Artistprofile::find($id);
        return view('eventos.dataeventsForm',compact('evprof'));
    }

    public function store(Request $request,$id)
    {
      $today=now();
      $request ->validate([
      'place'=>'required',
      'address'=>'required',
      'date'=>'required',
      'hora'=>'required',
    ]);
    $data = $request->all();
    if($request->date >= $today){
    $data['artistprofile_id'] = $id;
    $add_event = new Futurevent($data);
    $add_event->save();
    \Session::flash('flash_message','el evento ha sido creado');
    return redirect('/profiles');
    }
    else
    {
       \Session::flash('flash_message','la fecha debe ser posterior o igual a la fecha actual');
       return redirect()->back();
    }
    }
}
