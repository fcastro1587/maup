<div class="row">
  <div class="col-md-3">
    <div class="form-group">
      <i class="fa fa-map-o"></i>
      {{ Form::label('País') }}
      <select name="country_code_iata" class="form-control">
        @yield('citycreate')
        @yield('cityedit')
    </select>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      <i class="fa fa-file-text-o"></i>
      {{ Form::label('Nombre de la ciudad') }}
      {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      <i class="fa fa-sort-numeric-asc"></i>
      {{ Form::label('Longitud') }}
      {{ form::text('longitude', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      <i class="fa fa-sort-numeric-asc"></i>
      {{ Form::label('Latitud') }}
      {{ Form::text('latitude', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group">
      {{ Form::submit('Guardar', ['class' => 'btn btn-primary'])}}
    </div>
  </div>
</div>
