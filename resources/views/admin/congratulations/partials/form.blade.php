<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <i class="fa fa-user-plus"></i>
      {{ Form::label('Nombre del visitante') }}
      {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <i class="fa fa-file-text-o"></i>
      {{ Form::label('Nombre del programa') }}
      {{ form::text('title', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group">
      <i class="fa fa-commenting-o"></i>
      {{ Form::label('Comentario') }}
      {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'congratulation'])}}
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group">
      {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
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
		$('#congratulation').ckeditor();
</script>
@endsection
