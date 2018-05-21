<!DOCTYPE html>
<html>
  <head>
    <title>upload video files</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
  </head>
  <body>
    <br>
     @if(Session::has('flash_message'))
      <div class="alert alert-success">
        {{Session::get('flash_message')}}
    </div>
    @endif
<div class="row">
  <div class="col-md-12">     
    <h1>Upload an video for the profile</h1>
      {!! Form::open(['route' => ['video.store'], 'files' => 'true']) !!}
      {!! Form::file('video') !!}
      {!! Form::submit('Cargar Archivos', ['class' => 'btn btn-success']) !!}
      {!! Form::close() !!}
    </div>
    </div>
  </body>
</html>
