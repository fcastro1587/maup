<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <i class="fa fa-bed"></i>
      {{ Form::label('Tipo de habitación') }}
      {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group">
      {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary'])}}
    </div>
  </div>
</div>
