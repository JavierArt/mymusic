@extends('layouts.app')
@section('content')
<html>
  <head>
    <title>My profile</title>
    <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
  </head>
  <body background-color: #fff;>
    <div class="col-sm-4">     
      <h1>Perfil de {{ $Perprof->artistname}}</h1>
      <table class="table">
          <thead class="table-light">
            <tr>
              <th scope="col">{{ $Perprof->photo }}</th>
            </tr>
          </thead>
          <tbody>
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
      </div>

      <a href="/profile/{{$Perprof}}/audios" class="btn btn-primary">audios</a>
      <a href="/profile/{{$Perprof}}/videos" class="btn btn-secondary">videos</a>
      <a href="/profile/{{$Perprof}}/events" class="btn btn-danger">eventos</a>

  </body>
</html>
@endsection