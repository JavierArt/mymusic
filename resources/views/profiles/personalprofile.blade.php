@extends('layouts.app')
@section('content')
<html>
  <head>
    <title>My profile</title>
    <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
  </head>
  <body background-color: #fff;>
    @if(Session::has('flash_message'))
      <div class="alert alert-success">
        {{Session::get('flash_message')}}
    </div>
    @endif   
    <div class="row">
    <div class="col-sm-4">     
      <table class="table">
          <thead class="thead-light">
            <tr>
              <th><img src="/uploads/avatars/{{ $Perprof->photo }}" style="width:80px; height:80px; float:left; border-radius:50%; margin-right:25px;">
                 @auth
                 @if($Perprof->id == Auth::user()->id)  
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
              <td>{{$Perprof->User->age }}</td>
            </tr>
          </tbody>
      </table>
      </div>
      <!--deben de estar autenticados y debe ser su perfil para que aparesca el formulario para subir archivos si no aoarece mensaje-->
      @auth
      @if($Perprof->id == Auth::user()->id)
     <div class="col-3">
        @include('partials.FormAudio', ['origen_id' => $Perprof->id])
      </div>
      <div class="col-3">
        @include('partials.FormVideo', ['origen_id'=> $Perprof->id])
      </div>
    <div clas="col-2">
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
        <a href="{{$Perprof->id}}/events" class="btn btn-outline-danger">eventos</a>
       </div>
      </div>
    </div>
  </body>
</html>
@endsection