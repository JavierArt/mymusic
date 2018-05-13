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
              <td>{{ $Perprof->description }}</td>
            </tr>
            <tr>
              <td>{{ $Perprof->musictype }}</td>
            </tr>
            <tr>
              <td>{{ $Perprof->webpage }}</td>
            </tr>
            <tr>
              <td>{{ $Perprof->contactemail }}</td>
            </tr>
          </tbody>
      </table>
     <div class="btn-group" role="group" aria-label="Basic example">
      <a href="{{$Perprof->id}}/audios/create" class="btn btn-dark">añadir audio al perfil</a>
      <a href="{{$Perprof->id}}/videos" class="btn btn-info">añadir video al perfil</a>
      <a href="{{$Perprof->id}}/events/create" class="btn btn-success">añadir eventos al perfil</a>
    </div>
    </div>
    <br>
    <div class="col-sm-4">
     <div class="btn-group" role="group" aria-label="Basic example">
      <a href="{{$Perprof->id}}/audios" class="btn btn-primary">audios</a>
      <a href="{{$Perprof->id}}/videos" class="btn btn-secondary">videos</a>
      <a href="{{$Perprof -> id}}/events" class="btn btn-danger">eventos</a>
    </div>
    </div>
      
  </body>
</html>
@endsection