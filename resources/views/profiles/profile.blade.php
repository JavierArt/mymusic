@extends('layouts.app')
@section('content')
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.2/awesomplete.css">
    <title>Perfiles de musicos</title>
  </head>
  <body>
    @if (count($profile) == 0)
      <h1 class="caja">no existen perfiles que mostrar</h1>
    @else
    <div class="row">
      <div class=col-9>
        <h1 class="caja">estos son los perfiles de los musicos</h1>
      </div>
      <div class="col-3">
        @auth
            <a class="fas fa-user-secret fa-4x text-dark" href="/profile/{{ $idPerf }}/self"></a>
        @endauth
      </div>
    </div>
    @endif
    @include('partials.flash') 
        <form class="navbar-form navbar-left" role="search" action="{{url('profiles/searchredirect')}}">
          <div class="row">
            <div class="col-3">
             <div class="form-group">
               <input type="text" class="form-control awesomplete" name="search" id="myinput" placeholder="Buscar por genero"
                      data-list="rock,pop,reggaeton,mariachi,R&B,mariachi,disco,dance,electronica,blues,country,heavy metal,hip hop,
                                 jazz,indie,punk,rap,reggae,salsa,cumbia,tango,ballenato,gospel,folk,funk,merengue,rhythm and blues,son,
                                 tango,ballenato,variado"/>
             </div>
           </div>
        <div class="col-4">
           <button type="submit" class="btn btn-dark">Buscar</button>
        </div>
        </div>
        </form>

    <div class="col-md-11">
    <a class="btn btn-info" href="{{ URL::to('profiles/mayores/18') }}">Poner mayores de 18 primero</a>
    <a class="btn btn-secondary" href="{{ URL::to('profiles/banda/s') }}">filtrar solo bandas</a>
    <a class="btn btn-primary" href="{{ URL::to('profiles/solista/s') }}">filtrar solo solistas</a>
    <a class="btn btn-danger" href="{{ URL::to('profiles/dj/s') }}">filtrar solo dj's</a>
      @foreach($profile as $prof)
      <table class="table table-bordered">
       <thead>
            <tr>
              <th>Foto de perfil</th>
              <th>Nombre de artista</th>
              <th>banda, solista o Dj</th>
              <th>Genero musical</th>
              <th>edad</th>
              @auth
              @if($prof->user_id == Auth::user()->id)
              <th>acciones</th>
              @endif
              @endauth
            </tr>
          </thead>    
        <tbody>
          <tr>
            <td><img src="/uploads/avatars/{{ $prof->photo }}" alt="foto perfil" style="width:40px; height:40px; float:left; border-radius:50%; margin-right:25px;"></td>
            <td><a href="/profile/{{ $prof->id }}">{{ $prof->artistname }}</a></td>
            <td>{{ $prof->bandornot }}</td>
            <td>{{ $prof->musictype }}</td>
            <td>{{ $prof->User->age->diffForhumans(null,true) }}</td>
            @auth
            @if($prof->user_id == Auth::user()->id)
            <td><a class="fas fa-edit fa-2x bg-white text-dark" href="{{ URL::to('profile/' . $prof->id . '/edit') }}"></a></td>
            @endif
            @endauth
          </tr>
        </tbody>
        </div>
      </table>
   @endforeach
   {{ $profile->links() }}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.2/awesomplete.js"></script>
  </body>
</html>
@endsection