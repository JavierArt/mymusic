<h1>Subir video al perfil</h1>
{!! Form::open(['route' => ['video.store'], 'files' => 'true']) !!}
{!! Form::file('video') !!}
{!! Form::submit('Cargar Archivos', ['class' => 'btn btn-success']) !!}
{!! Form::close() !!}