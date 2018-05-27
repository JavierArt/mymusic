<h1>Subir audio al perfil</h1>
    {!! Form::open(['route' => ['audios.store'], 'files' => 'true']) !!}
    {!! Form::file('audio') !!}
    {!! Form::submit('Cargar Archivos', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
 