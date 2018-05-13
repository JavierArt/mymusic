@extends('layouts.app')
@section('content')
<html>
  <head>
    <title>Eventos del perfil</title>
    <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
  </head>
  <body background-color: #fff;>
    <h1>
      estos son los eventos del perfil
    </h1>
    @if(Session::has('flash_message'))
      <div class="alert alert-success">
        {{Session::get('flash_message')}}
    </div>
    @endif
    <div class="col-md-8">
    @foreach($eventos as $event)
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">lugar</th>
              <th scope="col">fecha</th>
            </tr>
          </thead>
        <tbody>
          <tr>
            <td>{{ $event->place }}</td>
            <td>Genero:{{ $event->date }}</td>
          </tr>
        </tbody>
        </div>
      </table>
   @endforeach
  </body>
</html>
@endsection