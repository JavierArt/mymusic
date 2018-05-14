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
              <th scope="col"> acciones</th>
            </tr>
          </thead>
        <tbody>
          <tr>
            <td>{{ $prof->photo }}</td>
            <td><a href="/profile/{{ $prof->id }}">{{ $prof->artistname }}</a></td>
            <td>Genero:{{ $prof->musictype }}</td>
     
            <td><a class="btn btn-warning" href="{{ URL::to('profile/' . $prof->id . '/edit') }}">Editar este perfil</a>
              {{ Form::open(array('url' => 'profile/' . $prof->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Borrar este perfil', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
          </tr>
        </tbody>
        </div>
      </table>
   @endforeach
  </body>
</html>
@endsection