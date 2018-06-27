@extends('layouts.app')
@section('content')
<html>
  <head>
    <title>Comentarios</title>
    <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
  </head>
  <body>
    @if(Session::has('flash_message'))
      <div class="alert alert-success">
        {{Session::get('flash_message')}}
    </div>
    @endif
    <div class="col-md-4">
          @if(count($comments) == 0)
           <h1>No hay comentarios</h1>
          @else
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">comentario</th>
                    <th scope="col">usuario</th>
                    <th scope="col">fecha de creacion</th>
                  </tr>
                </thead>
              <tbody>
                @foreach ($comments as $comment)
                <tr>
                  <td>{{ $comment->body }}</td>
                  <td>{{ $comment->user }}</td>
                  <td>{{ $comment->created_at }}</td>
                </tr>
              </tbody>
        @endforeach
        @endif
        </div>
      </table>   
  </body>
</html>
@endsection