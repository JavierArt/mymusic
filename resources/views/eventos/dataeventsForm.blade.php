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
      {{ csrf_field() }}
      <div class="form-group">
        <label for="place">lugar:</label>
        {!! Form::text('place', null, ['placeholder' => 'lugar donde sera el evento', 'class' => 'form-control','required']) !!}
      </div>
      
      <div class="form-group">
        <label for="date">fecha:</label>
        {!! Form::text('date', null, ['placeholder' => 'cuando sera el evento?', 'class' => 'form-control','required']) !!}
      </div>
    
      <div class="form-group">
        <label for="hora">hora:</label>
        {!! Form::text('hora', null, ['placeholder' => 'a que hora sera el evento', 'class' => 'form-control', 'required']) !!}
      </div>
                  
      <button type="submit" class="btn btn-success">Aceptar</button>
      
    {!! Form::close() !!}

@endsection