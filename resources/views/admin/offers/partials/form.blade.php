<div class="row">

  <div class="col-md-3">
    <div class="form-group">
      <i class="fa fa-key"></i>
        {{ Form::label('regular', 'MT Regular')}}
        {{ Form::text('offer_mt', null, ['class' => 'form-control'])}}
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      <i class="fa fa-key"></i>
        {{ Form::label('bloqueo', 'Bloqueo')}}
        {{ Form::text('bloqueo_mt', null, ['class' => 'form-control'])}}
    </div>
  </div>


  <div class="col-md-3">
    <div class="form-group">
      <i class="fa fa-map-o"></i>
      {{ Form::label('Seleccione un departamento') }}
      <select class="form-control" name="department_code">
        @yield('departcreate')
        @yield('departedit')
      </select>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      <i class="fa fa-sort-numeric-asc"></i>
      {{ Form::label('Orden') }}
      {{ Form::text('order', null, ['class' => 'form-control'])}}
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group">
      {{ Form::submit('Guardar', ['class' => 'btn btn-primary'])}}
    </div>
  </div>
</div>
