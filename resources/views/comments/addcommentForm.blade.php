@extends('layouts.app')
@section('content')
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>
        Capturar comentario
      </h2>
    </div>
  </div>
  <div class="col-7">
        {!! Form::open(['url' => '/profile/'. $id .'/comment/s']) !!}
        <div class="form-group">
          {{ Form::label('body', 'comentario') }}
          {!! Form::text('body', null, ['placeholder' => 'comentario', 'class' => 'form-control','required']) !!}
          {!! Form::hidden('user', $user) !!}
        </div>

        <button type="submit" class="btn btn-success">Aceptar</button>

      {!! Form::close() !!}
  </div>
  </div>
  </body>
@endsection