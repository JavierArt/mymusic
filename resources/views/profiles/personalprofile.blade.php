@extends('layouts.app')
@section('content')
<html>
  <head>
    <title>My profile</title>
    <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">  
  </head>
  <body>
    @include('partials.flash')
    <div class="row">
    <div class="col-sm-4">     
      <table class="table">
          <thead class="thead-light">
            <tr>
              <th><img src="/uploads/avatars/{{ $Perprof->photo }}" alt="foto de perfil" style="width:80px; height:80px; float:left; border-radius:50%; margin-right:25px;">
                 @auth
                 @if($Perprof->user_id == Auth::user()->id)  
                <h6>Subir foto de perfil</h6>
                  {!! Form::open(['action' => ['ArtistprofileController@updateavatar'], 'files' => 'true']) !!}
                  {!! Form::file('avatar') !!}
                  {!! Form::submit('subir imagen', ['class' => 'btn btn-primary btn-sm']) !!}
                  {!! Form::close() !!}
                @endif
                @endauth
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $Perprof->artistname}}</td>
            </tr>
            <tr>
              <td>{{ $Perprof->ciudad }},{{ $Perprof->estado }},{{ $Perprof->pais}}</td>
            </tr>
            <tr>
              <td>{{ $Perprof->bandornot}}</td>
            </tr>
            <tr>
              <td>{{ $Perprof->description }}</td>
            </tr>
            <tr>
              <td>{{ $Perprof->musictype }}</td>
            </tr>
            <tr>
              <td><a target="_blank" href="{{$Perprof->webpage}}">{{ $Perprof->webpage }}</a></td>
            </tr>
            <tr>
              <td>{{ $Perprof->contactemail }}</td>
            </tr>
            <tr>
              <td>{{$Perprof->User->age->diffForhumans(null,true) }}</td>
            </tr>
          </tbody>
      </table>
      </div>
      <!--deben de estar autenticados y debe ser su perfil para que aparesca el formulario para subir archivos si no aoarece mensaje-->
      @auth
      @if($Perprof->user_id == Auth::user()->id)
     <div class="col-sm-2">
        @include('partials.FormAudio', ['origen_id' => $Perprof->id])
      </div>
      <div class="col-sm-2">
        @include('partials.FormVideo', ['origen_id'=> $Perprof->id])
      </div>
      <div class="col-sm-2">
        @include('partials.FormPicture',['origen_id'=>$Perprof->id])
      </div>
    <div clas="col-sm">
       <a href="{{$Perprof->id}}/events/create" class="btn btn-success">añadir eventos al perfil</a>
      @else
        <h1>BIENVENIDOS A MI PERFIL DISFRUTE SU VISITA</h1>
      @endif
      @else
        <h1>BIENVENIDOS A MI PERFIL DISFRUTE SU VISITA</h1>
      @endauth
      </div>
    </div>
    <div class="row">
       <div class="btn-group" role="group" aria-label="Basic example">
        <div class="col">
        <a href="{{$Perprof->id}}/audios" class="btn btn-outline-primary">audios</a>
        <a href="{{$Perprof->id}}/videos" class="btn btn-outline-secondary">videos</a>
        <a href="{{$Perprof->id}}/pictures" class="btn btn-outline-info">imagenes</a>
        <a href="{{$Perprof->id}}/events" class="btn btn-outline-danger">eventos</a>
        <a href="/map" class="btn btn-outline-dark">mapa</a>
       @auth
      @if($Perprof->id == Auth::user()->id)
      <a class="btn btn-warning btn-sm" href="{{ URL::to('profile/' . $Perprof->id . '/edit') }}">Editar perfil</a>
      @endif
      @endauth
      </div>
      </div>
  </div>
  </body>
</html>
@endsection