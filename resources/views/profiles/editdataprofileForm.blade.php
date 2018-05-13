@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2>
      Capturar informacion de perfil
    </h2>
  </div>
</div>

@include('layouts.errors'):

   {{ Form::model($atu, array('action' => array('NerdController@update', $atu->id), 'method' => 'PUT')) }}

      <div class="form-group">
        {{ Form::label('photo', 'foto de perfil') }}
        {!! Form::text('photo', null, ['placeholder' => 'aqui podras subir una foto en un futuro?', 'class' => 'form-control','required']) !!}
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
         {{ Form::label('contactemail', 'correo de contact') }}
        {!! Form::text('contactemail', null, ['placeholder' => 'Correo para contacto', 'class' => 'form-control', 'required']) !!}
      </div>
      
      <div class="form-group">
         {{ Form::label('artistname', 'nombre artistico') }}
        {!! Form::text('artistname', null, ['placeholder' => 'nombre artistico', 'class' => 'form-control', 'required']) !!}
      </div>
            
      {{ Form::submit('editar este perfil', array('class' => 'btn btn-success')) }}
      
    {!! Form::close() !!}


@endsection