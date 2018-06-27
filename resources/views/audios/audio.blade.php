@extends('layouts.app')
@section('content')
<html>
  <head>
    <title>Profiles</title>
    <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
  </head>
  <body>
   
    @if(Session::has('flash_message'))
      <div class="alert alert-success">
        {{Session::get('flash_message')}}
    </div>
    @endif
    <h1>
      audios del perfil
    </h1>
    @if(count($audios) == 0)
        <h1>
          el artista no ha subido audios
        </h1>
      @else
      <div class="col-md-8">
      <table class="table">
        <thead>
          <tr>
            <th>Archivo</th>
            <th>fecha de creacion</th>
            <th>Reproducir</th>
          </tr>
        </thead>
        <tbody>
          @foreach($audios as $archivo)
            <tr>
              <td>{{ $archivo->original_name}}</td>
              <td>{{ $archivo->created_at }}</td>
              <td> <audio controls>
                <source src="{{ URL::asset('/storage/' . $archivo->fs_name) }}">
                Your browser does not support the audio tag.
              </audio></td>
              <td><a href="/profile/{{ $archivo->id }}/comment/create" class="btn btn-success">añadir comentario</a></td>
              <td><a href="/profile/{{ $archivo->id }}/comments" class="btn btn-info">ver comentarios</a></td>
          </tr>
        </tbody>
          @endforeach
      @endif
      </div>
    </table>
</body>
</html>
@endsection




