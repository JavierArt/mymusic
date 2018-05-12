@extends('layouts.app')
@section('content')
<html>
  <head>
    <title>Profiles</title>
    <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
  </head>
  <body background-color: #fff;>
    <h1>
      estos son los perfiles de los musicos
    </h1>
    @foreach($profile as $prof)
    <div class="col-md-11">
      <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Foto de perfil</th>
              <th scope="col">Nombre de artista</th>
              <th scope="col">Tipo de musica</th>
            </tr>
          </thead>
        <tbody>
          <tr>
            <td>{{ $prof->photo }}</td>
            <td><a href="/profile/{{ $prof->id }}">{{ $prof->artistname }}</a></td>
            <td>Genero:{{ $prof->musictype }}</td>
          </tr>
        </tbody>
        </div>
      </table>
   @endforeach
  </body>
</html>
@endsection