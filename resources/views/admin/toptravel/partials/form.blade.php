<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <i class="fa-key"></i>
      {{ Form::label('MT') }}
      <select class="form-control" name="top_travel_mt">
        @yield('mtcreate')
        @yield('mtedit')
      </select>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <i class="fa fa-map-o"></i>
      {{ Form::label('Departamento') }}
      <select class="form-control" name="top_travel_code">
        @yield('deptocreate')
        @yield('deptoedit')
      </select>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <i class="fa fa-sort-numeric-asc"></i>
      {{ Form::label('Orden') }}
      {{ Form::text('order', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group">
      {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
    </div>
  </div>
</div>
