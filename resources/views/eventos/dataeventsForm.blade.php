@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2>
      Capturar informacion de evento
    </h2>
  </div>
</div>

@include('layouts.errors'):
      {!! Form::open(['action' => 'FutureventsController@store']) !!}
      <div class="form-group">
        {{ Form::label('place', 'lugar') }}
        {!! Form::text('place', null, ['placeholder' => 'lugar donde sera el evento', 'class' => 'form-control','required']) !!}
      </div>
      
      <div class="form-group">
        {{ Form::label('date', 'fecha') }}
        {!! Form::text('date', null, ['placeholder' => 'cuando sera el evento?', 'class' => 'form-control','required']) !!}
      </div>
    
      <div class="form-group">
        {{ Form::label('hora', 'hora del evento') }}
        {!! Form::text('hora', null, ['placeholder' => 'a que hora sera el evento', 'class' => 'form-control', 'required']) !!}
      </div>
                  
      <button type="submit" class="btn btn-success">Aceptar</button>
      
    {!! Form::close() !!}

@endsection