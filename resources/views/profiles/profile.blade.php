@extends('layouts.app')
@section('content')
<html>
  <head>
    <title>Profiles</title>
    <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  </head>
  <body background-color: #fff;>
    <h1>
      estos son los perfiles de los musicos
    </h1>
    @if(Session::has('flash_message'))
      <div class="alert alert-success">
        {{Session::get('flash_message')}}
    </div>
    @endif
    <div class="col-md-11">
    @foreach($profile as $prof)
      <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Foto de perfil</th>
              <th scope="col">Nombre de artista</th>
              <th scope="col">Tipo de musica</th>
              <th scope>edad</th>
              <th scope="col-lg"> acciones</th>
              <th scope="col"></th>
            </tr>
          </thead>
        <tbody>
          <tr>
            <td>{{ $prof->photo }}</td>
            <td><a href="/profile/{{ $prof->id }}">{{ $prof->artistname }}</a></td>
            <td>{{ $prof->musictype }}</td>
            <td>{{ $prof->User->age }}</td>
            <td><a class="btn btn-warning btn-sm" href="{{ URL::to('profile/' . $prof->id . '/edit') }}">Editar este perfil</a></td>
              <td> {!! Form::open(['route' => ['profileD.destroy', $prof->id], 'method' => 'DELETE']) !!}
                      {!! Form::submit('Borrar', ['class' => 'btn btn-sm btn-danger btn-sm']) !!}
                   {!! Form::close() !!}
            </td>
          </tr>
        </tbody>
        </div>
      </table>
   @endforeach
  </body>
</html>
@endsection