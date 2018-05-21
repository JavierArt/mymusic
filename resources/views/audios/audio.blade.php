@extends('layouts.app')
@section('content')
<html>
  <head>
    <title>Profiles</title>
    <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
  </head>
  <body background-color: #fff;>
   
    @if(Session::has('flash_message'))
      <div class="alert alert-success">
        {{Session::get('flash_message')}}
    </div>
    @endif
    <div class="col-md-8">
    <table class="table">
      <thead>
        <tr>
          <th>Archivo</th>
          <th>fecha de creacion</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($audios as $archivo)
          <tr>
            <td>{{ $archivo->original_name }}</td>
            <td>{{ $archivo->created_at->toFormattedDateString() }}</td>
            <td>
              <a href="{{ route('descarga', $archivo->id) }}" class="btn btn-sm btn-info">Descargar</a>
              {!! Form::open(['route' => ['audio.destroy', $archivo->id], 'method' => 'DELETE']) !!}
                {!! Form::submit('Borrar', ['class' => 'btn btn-sm btn-danger']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
      </div>
    </table>
</body>
</html>
@endsection




