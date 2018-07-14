@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
<h1 class="caja">mayores de 18 años primero</h1>
@if (isset($message))
<div class='bg-warning' style='padding: 20px'>
    {{$message}}
</div>
@endif
<hr>
@if (isset($profileM))
        <div class="col-md-11">
        @foreach($profileM as $prof)         
          <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Foto de perfil</th>
                  <th scope="col">Nombre de artista</th>
                  <th scope="col">banda o solista</th>
                  <th scope="col">Genero musical</th>
                  <th scope="col">origen</th>
                  <th scope="col">edad</th>
                </tr>
              </thead>
            <tbody>
              <tr>
                <td><img src="/uploads/avatars/{{ $prof->Artistprofile->photo }}" style="width:40px; height:40px; float:left; border-radius:50%; margin-right:25px;"></td>
                <td><a href="/profile/{{ $prof->id }}">{{ $prof->Artistprofile->artistname }}</a></td>
                <td>{{ $prof->artistprofile->bandornot }}</td>
                <td>{{ $prof->Artistprofile->musictype }}</td
                <td>{{ $prof->ciudad }},{{ $prof->estado }},{{ $prof->pais}}</td>
                <td>{{ $prof->age->diffForHumans(null,true) }}</td>
              </tr>
            </tbody>
            </div>
          </table>
       @endforeach
@endif
@endsection