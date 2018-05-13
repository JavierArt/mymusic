<?php

namespace App\Http\Controllers;

use App\futurevents;
use App\Artistprofile;
use Illuminate\Http\Request;

class FutureventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       $eventos = artistprofile::find($id)->events;
       return view("eventos.events",compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventos.dataeventsForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
      $request ->validate([
      'palce'=>'required',
      'date'=>'required',
      'hora'=>'required',
    ]);
     dd($id);
/*    $data = $request->all();
    $data['artistprofile_id'] = artistprofile::find($id)->id;
    dd($data);
    $add_event = new Futurevent($data);
    $add_event->save();
    \Session::flash('flash_message','el evento ha sido creado');*/
    return redirect('/profiles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\futurevents  $futurevents
     * @return \Illuminate\Http\Response
     */
    public function show(futurevents $futurevents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\futurevents  $futurevents
     * @return \Illuminate\Http\Response
     */
    public function edit(futurevents $futurevents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\futurevents  $futurevents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, futurevents $futurevents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\futurevents  $futurevents
     * @return \Illuminate\Http\Response
     */
    public function destroy(futurevents $futurevents)
    {
        //
    }
}
