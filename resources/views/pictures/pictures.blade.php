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
      Imagenes del perfil
    </h1>
    <div class="col-md-4">
      <table class="table">
      <thead>
        <tr>
          <th>Archivos</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pictures as $archivo)
          <tr>
            <td><img src="/uploads/pictures/{{ $archivo->fs_name }}" alt="imagen"><br>{{ $archivo->created_at->format('d M Y') }}</td>
          </tr>
        @endforeach
      </tbody>
    </div>
    </table>
  </body>
</html>
@endsection