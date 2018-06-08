<h1>Subir audio al perfil</h1>
    {!! Form::open(['route' => ['pictures.store'], 'files' => 'true']) !!}
    {!! Form::file('picture') !!}
    {!! Form::submit('Cargar Archivos', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
 