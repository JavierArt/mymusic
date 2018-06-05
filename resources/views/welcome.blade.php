<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Encuentra mi musica</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset('css/welcome.css') }}" type="text/css">
      <style>
            html, body {
                background-image: url('https://png.pngtree.com/thumb_back/fw800/back_pic/04/61/60/80586e690a8dcab.jpg');
                font-family: 'Raleway', sans-serif;
                height: 100vh;
                margin: 0;
            }
      </style>
    
  </head>
    <body>
        <div class="position-ref full-height flex-center">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/profiles') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Talentosos musicos mostrando su trabajo
               </div>
               <div class="title m-b-md2">
                    Registrate para crear tu perfil
               </div> 
              <a href="/profiles" class="btn btn-outline-primary btn-lg">visitar perfiles</a>
          </div>
      </div>
    </body>
</html>
