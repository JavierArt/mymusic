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
          <thead class="table-light">
            <tr>
              <th scope="col">{{ $Perprof->photo }}</th>
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
      <!--deben de estar autenticados y debe ser su perfil para que aparesca el formulario para subir archivos-->
      @auth
      @if($Perprof->id == Auth::user()->id)
     <div class="col">
        @include('partials.FormAudio', ['origen_id' => $Perprof->id])
      </div>
      <div class="col">
        @include('partials.FormVideo', ['origen_id'=> $Perprof->id])
      </div>
      @else
      <h1>BIENVENIDOS A MI PERFIL DISFRUTE SU VISITA</h1>
      @endif
      @endauth
      </div>
      <a href="{{$Perprof->id}}/events/create" class="btn btn-success">añadir eventos al perfil</a>
    <br>
    <br>
     <div class="btn-group" role="group" aria-label="Basic example">
      <a href="{{$Perprof->id}}/audios" class="btn btn-outline-primary">audios</a>
      <a href="{{$Perprof->id}}/videos" class="btn btn-outline-secondary">videos</a>
      <a href="{{$Perprof->id}}/events" class="btn btn-outline-danger">eventos</a>
    </div>
  </body>
</html>
@endsection