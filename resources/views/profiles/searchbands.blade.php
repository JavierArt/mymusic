@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
<h1>Perfiles encontrados</h1>
@if (isset($message))
<div class='bg-warning' style='padding: 20px'>
    {{$message}}
</div>
@endif
<hr>
@if(isset($profileBands))
        <div class="col-md-11">
        @foreach($profileBands as $prof)         
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
                <td><img src="/uploads/avatars/{{ $prof->photo }}" style="width:40px; height:40px; float:left; border-radius:50%; margin-right:25px;"></td>
                <td><a href="/profile/{{ $prof->id }}">{{ $prof->artistname }}</a></td>  
                <td>{{ $prof->bandornot }}</td>
                <td>{{ $prof->musictype }}</td>
                <td>{{ $prof->ciudad }},{{ $prof->estado }},{{ $prof->pais}}</td>
                <td>{{ $prof->User->age->diffForhumans(null,true) }}</td>
              </tr>
            </tbody>
            </div>
          </table>
       @endforeach
@endif
@endsection