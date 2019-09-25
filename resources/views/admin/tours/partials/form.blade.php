<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <i class="fa fa-fw fa-file-text-o"></i>
      {{ Form::label('name', 'Nombre del departamento') }}
      @yield('deptocreate')
      @yield('deptoedit')
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <i class="fa fa-fw fa-file-text-o"></i>
      {{ Form::label('titulo', 'Titulo del itinerario(opcional)')}}
      {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      <i class="fa fa-fw fa-file-text-o"></i>
      {{ Form::label('Itinerario')}}
      {{ Form::textarea('especial_itinerary', null, ['class' => 'form-control', 'id' => 'especial_itinerary'])}}
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group">
      {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary'])}}
    </div>
  </div>
</div>

@section('script')
<script src="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>
<script src='{{ asset('js/jquery.js')}}'></script>
<script type="text/javascript">
//Ckeditor
CKEDITOR.config.height= 300;
CKEDITOR.config.width='auto';
CKEDITOR.config.toolbarCanCollapse = true;
//CKEDITOR.config.toolbar = 'basic';
$('#especial_itinerary').ckeditor();
</script>
@endsection
