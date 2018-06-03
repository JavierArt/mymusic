@extends('layouts.app')
@section('content')
<div class="container">

<div class="row">
  <div class="col-md-8">
    <h2>
      Capturar informacion de perfil
    </h2>
  </div>
</div>
@include('layouts.errors'):
<div class="col-7">  
      {!! Form::open(['action' => 'ArtistprofileController@update']) !!}
      <div class="form-group">
        {{ Form::label('photo', 'foto de perfil') }}
        {!! Form::text('photo',null, ['placeholder' => 'aqui podras subir una foto en un futuro?', 'class' => 'form-control','required']) !!}
      </div>

       <div class="form-group">
         {{ Form::label('bandornot', 'banda o solista?') }}
         <br>
         {{!! Form::select('bandornot', ['Banda' => 'banda', 'Solista' => 'solista'], 'Banda') !!}}
      </div>
      
      <div class="form-group">
        {{ Form::label('description', 'descripción') }}
        {!! Form::text('description', null, ['placeholder' => 'describe quien eres?', 'class' => 'form-control','required']) !!}
      </div>
    
      <div class="form-group">
        {{ Form::label('musictype', 'genero musical') }}
        {!! Form::text('musictype', null, ['placeholder' => 'que Genero tocas?', 'class' => 'form-control', 'required']) !!}
      </div>
      
      <div class="form-group">
        {{ Form::label('web page', 'redes sociales') }}
        {!! Form::url('webpage', null, ['placeholder' => 'url a tus redes sociales', 'class' => 'form-control']) !!}
      </div>
    
      <div class="form-group">
        {{ Form::label('contactemail', 'correo') }}
        {!! Form::text('contactemail', null, ['placeholder' => 'Correo para contacto', 'class' => 'form-control', 'required']) !!}
      </div>
      
      <div class="form-group">
         {{ Form::label('artistname', 'nombre artistico') }}
        {!! Form::text('artistname', null, ['placeholder' => 'nombre artistico', 'class' => 'form-control', 'required']) !!}
      </div>
        {{ Form::submit('Aceptar', array('class' => 'btn btn-success')) }}
      
    {!! Form::close() !!}
  </div>
</div>
@endsection