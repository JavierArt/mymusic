@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2>
      Capturar informacion de perfil
    </h2>
  </div>
</div>

<div class="row">
  <div class="col-md-8 offset-md-2">
      @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      {{ csrf_field() }}

    @if(!isset($user))
      {!! Form::open(['action' => 'ArtistprofileController@store']) !!}
    @else
      {!! Form::model($user, ['action' => ['ArtistprofileController@update', $user->id], 'method' => 'patch']) !!}
    @endif
    
      <div class="form-group">
        <label for="photo">photo:</label>
        {!! Form::text('photo', null, ['placeholder' => 'aqui podras subir una foto en un futuro?', 'class' => 'form-control','required']) !!}
      </div>
      
      <div class="form-group">
        <label for="description">Descripcion:</label>
        {!! Form::text('description', null, ['placeholder' => 'describe quien eres?', 'class' => 'form-control','required']) !!}
      </div>
    
      <div class="form-group">
        <label for="musictype">Genero musical:</label>
        {!! Form::text('musictype', null, ['placeholder' => 'que Genero tocas?', 'class' => 'form-control', 'required']) !!}
      </div>
      
      <div class="form-group">
        <label for="webpage">redes sociales:</label>
        {!! Form::url('webpage', null, ['placeholder' => 'url a tus redes sociales', 'class' => 'form-control']) !!}
      </div>
    
      <div class="form-group">
        <label for="contactemail">Correo:</label>
        {!! Form::text('contactemail', null, ['placeholder' => 'Correo para contacto', 'class' => 'form-control', 'required']) !!}
      </div>
      
      <div class="form-group">
        <label for="artistname">nombre artistico</label>
        {!! Form::text('artistname', null, ['placeholder' => 'nombre artistico', 'class' => 'form-control', 'required']) !!}
      </div>
            
      <button type="submit" class="btn btn-success">Aceptar</button>
      
    {!! Form::close() !!}
  </div>
</div>

@endsection