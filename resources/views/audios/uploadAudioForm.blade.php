<!DOCTYPE html>
<html>
  <head>
    <title>upload audio files</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
  </head>
  <body>
    <br>
<div class="row">
  <div class="col-md-12">     
    <h1>Upload an audio for the profile</h1>
      <form action="/profile/{{Perprof}}/audios/s" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <input type="file" name="audio" class="btn btn-outline-primary">
        <br>
        <input type="submit" value="Upload" class="btn btn-outline-success">
      </form>
    </div>
    </div>
  </body>
</html>
