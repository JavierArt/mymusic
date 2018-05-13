<div class="row">
  <div class="col-md-12">
      {!! Form::open(['route' => ['archivo.store'], 'files' => 'true']) !!}
      {!! Form::file('archivos') !!}
      {!! Form::submit('Cargar Archivos', ['class' => 'btn btn-success']) !!}
      {!! Form::hidden('origen_id', $origen_id) !!}
      {!! Form::hidden('origen_type', $origen_type) !!}
      {!! Form::close() !!}
  </div>
</div>
