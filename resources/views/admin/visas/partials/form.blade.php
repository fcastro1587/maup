<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <i class="fa fa-map-o"></i>
      {{ Form::label('País') }}
      <select class="form-control" name="country_code">
        @yield('citycreate')
        @yield('cityedit')
      </select>
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group">
      <i class="fa fa-file-text-o"></i>
      {{ Form::label('descripcion')}}
      {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'visas']) !!}
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group">
      {{ Form::submit('guardar', ['class' => 'btn btn-primary'])}}
    </div>
  </div>
</div>

@section('script')
<script src="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>
<script src='{{ asset('js/jquery.js')}}'></script>
<script type="text/javascript">
	  //Ckeditor
		CKEDITOR.config.height= 500;
		CKEDITOR.config.width='auto';
		CKEDITOR.config.toolbarCanCollapse = true;
		//CKEDITOR.config.toolbar = 'basic';
		$('#visas').ckeditor();
</script>
@endsection
