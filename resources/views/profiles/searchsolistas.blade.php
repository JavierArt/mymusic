@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
<h1>Perfiles de bandas</h1>
@if (isset($message))
<div class='bg-warning' style='padding: 20px'>
    {{$message}}
</div>
@endif
<hr>
@if(isset($profileSolista))
        <div class="col-md-11">
        @foreach($profileSolista as $prof)         
          <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Foto de perfil</th>
                  <th scope="col">Nombre de artista</th>
                  <th scope="col">banda o solista</th>
                  <th scope="col">Genero musical</th>
                  <th scope="col">edad</th>
                </tr>
              </thead>
            <tbody>
              <tr>
                <td>{{ $prof->photo }}</td>
                <td><a href="/profile/{{ $prof->id }}">{{ $prof->artistname }}</a></td>  
                <td>{{ $prof->bandornot }}</td>
                <td>{{ $prof->musictype }}</td>
                <td>{{ $prof->User->age }}</td>
              </tr>
            </tbody>
            </div>
          </table>
       @endforeach
@endif
@endsection