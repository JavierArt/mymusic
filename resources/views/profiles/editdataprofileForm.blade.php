@extends('layouts.app')
@section('content')

<div class="container">

<div class="row">
  <div class="col-md-8">
    <h2>
     Editar de perfil
    </h2>
  </div>
</div>
@include('layouts.errors'):
<div class="col-7">  
      {!! Form::open(['url' => '/profile/'. $item->id , 'method' => 'put', 'id'=>"form-ajax"]) !!}
      <div class="form-group">
        {{ Form::label('description', 'descripción') }}
        {!! Form::text('description', null, ['placeholder' => 'describe quien eres?', 'class' => 'form-control']) !!}
      </div>
  
       <div class="form-group">
         {{ Form::label('bandornot', 'banda o solista?') }}
         <br>
         {{!! Form::select('bandornot', ['Banda' => 'banda', 'Solista' => 'solista', 'Dj' => 'Dj'], 'Banda') !!}}
      </div>
    
      <div class="form-group">
        {{ Form::label('musictype', 'genero musical') }}
        {!! Form::text('musictype', null, ['placeholder' => 'que Genero tocas?', 'class' => 'form-control']) !!}
      </div>
      
      <div class="form-group">
        {{ Form::label('web page', 'redes sociales') }}
        {!! Form::url('webpage', null, ['placeholder' => 'url a tus redes sociales', 'class' => 'form-control']) !!}
      </div>
    
      <div class="form-group">
        {{ Form::label('contactemail', 'correo') }}
        {!! Form::text('contactemail', null, ['placeholder' => 'Correo para contacto', 'class' => 'form-control']) !!}
      </div>
      
      <div class="form-group">
         {{ Form::label('artistname', 'nombre artistico') }}
        {!! Form::text('artistname', null, ['placeholder' => 'nombre artistico', 'class' => 'form-control']) !!}
      </div>
        {{ Form::submit('Aceptar', array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}
  </div>
</div>
@endsection