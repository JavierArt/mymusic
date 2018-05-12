<!DOCTYPE html>
<html>
  <head>
    <title>upload audio files</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  </head>
  <body>
    <br>
    <div class="col-lg-offset-4 col-lg-4">
     <h1>
       Upload an audio for the profile
      </h1>
      <form action="/profile/{Pprof}/audios/upload" enctype="multipart/form-data" method="POST">
        <input type="file" name="audio">
        <br>
        <input type="submit" value="Upload">
      </form>
    </div>
  </body>
</html>