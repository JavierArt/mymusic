@extends('layouts.app')
@section('content')
<head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.2/awesomplete.css">
</head>
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
         {{ Form::label('pais', 'Pais de origen') }}
         <br>
         {!! Form::text('pais',null,['placeholder'=>'De que pais eres','class'=>'form-control','required'])  !!}
      </div>

      <div class="form-group">
         {{ Form::label('estado', 'Estado de origen') }}
         <br>
         {!! Form::text('estado',null,['placeholder'=>'De que estado eres','class'=>'form-control','required'])  !!}
      </div>
      
      <div class="form-group">
         {{ Form::label('ciudad', 'Ciudad de origen') }}
         <br>
         {!! Form::text('ciudad',null,['placeholder'=>'De que ciudad eres','class'=>'form-control','required']) !!}
      </div>
    

      <div class="form-group">
        {{ Form::label('musictype', 'genero musical:') }}
        <input type="text", class="form-control awesomplete" name="musictype" placeholder="Que genero tocas" id="myinput" ,required >
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.2/awesomplete.js"></script>

@endsection