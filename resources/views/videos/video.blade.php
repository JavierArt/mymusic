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
      videos del perfil
    </h1>
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
              Your browser does not support the video tag.
            </video> </td>            
            <td>{{ $archivo->created_at->format('d M Y') }}</td>
          </tr>
        @endforeach
      </tbody>
      </div>
    </table>
  </body>
</html>
@endsection