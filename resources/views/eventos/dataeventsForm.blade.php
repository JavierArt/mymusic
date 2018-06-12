@extends('layouts.app')
@section('content')
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>
        Capturar informacion de evento
      </h2>
    </div>
  </div>
 @include('layouts.errors')
  <div class="col-7">  
        {!! Form::open(['url' => '/profile/'. $evprof->id .'/events/create']) !!}
        <div class="form-group">
          {{ Form::label('place', 'lugar') }}
          {!! Form::text('place', null, ['placeholder' => 'lugar donde sera el evento', 'class' => 'form-control','required']) !!}
        </div>

        <div class="form-group">
          {{ Form::label('date', 'fecha del evento') }}
          {!! Form::text('date', null, ['placeholder' => 'fecha del evento', 'class' => 'form-control','required']) !!}
        </div>

        <div class="form-group">
          {{ Form::label('hora', 'hora del evento') }}
          {!! Form::text('hora', null, ['placeholder' => 'a que hora sera el evento', 'class' => 'form-control', 'required']) !!}
        </div>

        <button type="submit" class="btn btn-success">Aceptar</button>

      {!! Form::close() !!}
  </div>
  </div>
  </body>
@endsection