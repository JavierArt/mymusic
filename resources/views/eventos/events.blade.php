@extends('layouts.app')
@section('content')
<html>
  <head>
    <title>Eventos del perfil</title>
    <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
  </head>
  <body background-color: #fff;>
    <h1>
      eventos del perfil
    </h1>
    @if(Session::has('flash_message'))
      <div class="alert alert-success">
        {{Session::get('flash_message')}}
    </div>
    @endif
    <div class="col-md-8">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">Lugar</th>
              <th scope="col">Fecha</th>
              <th scope="col">Hora</th>
              <th scope="col">domicilio (mapa)</th>
            </tr>
          </thead>
        <tbody>
          @foreach($eventos as $event)
          <tr>
            <td>{{ $event->place }}</td>
            <td>{{ $event->date->format('d M Y') }}</td>
            <td>{{ $event->hora }}</td>
            <td><a href="{{ $event->address }}" target=_blank>{{ $event->address }}</a></td>
          </tr>
          @endforeach
        </tbody>
        </div>
      </table>   
  </body>
</html>
@endsection