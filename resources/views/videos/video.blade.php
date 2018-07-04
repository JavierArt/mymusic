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
    <h1 class="caja">
      videos del perfil
    </h1>
    @if(count($videos)==0)
      <h1>
        el artista no ha subido videos
      </h1>
      @else
      <div class="col-md-8">
        <table class="table">
        <thead>
          <tr>
            <th>Archivo</th>
            <th>Reproducir</th>
            <th>fecha de creacion</th>
          </tr>
        </thead>
        <tbody>
          @foreach($videos as $archivo)
            <tr>
              <td>{{ $archivo->original_name }}</td>
              <td> <video width="300" height="200" controls>
                <source src="/storage/{{ $archivo->fs_name }}">
                tu navegador no soporta la etiqueta de video.
              </video> </td>            
              <td>{{ $archivo->created_at->format('d M Y') }}</td>
              <td><a href="/profile/{{ $archivo->id }}/comment/create" class="btn btn-success">añadir comentario</a></td>
              <td><a href="/profile/{{ $archivo->id }}/comments" class="btn btn-info">ver comentarios</a></td>
            </tr>
          @endforeach
        @endif
      </tbody>
      </div>
    </table>
  </body>
</html>
@endsection