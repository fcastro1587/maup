<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <i class="fa fa-fw fa-text-width"></i>
      {{ Form::label('Departamento') }}
      {{Form::select('code_department', $department, null, ['class' => 'form-control', 'placeholder'=>'Seleccionar Seccion' , 'id' => 'department']) }}
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <i class="fa fa-fw fa-text-width"></i>
      {{ Form::label('MT Regular') }}
      {{ Form::text('travel_mt', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <i class="fa fa-fw fa-text-width"></i>
      {{ Form::label('Bloqueo MT') }}
      {{ Form::text('bloqueo_mt', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group">
      <i class="glyphicon glyphicon-picture"></i>
      {{ Form::label('fondo', 'Imagen de fondo') }}
      <select class="img1 form-control" name="multimedia_id_1" multiple>
        @yield('createimg1')
        @yield('editimg1')
      </select>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <i class="fa fa-fw fa-text-width"></i>
      {{ Form::label('Nombre del Departamento', 'Nombre del Departamento') }}
      {{ Form::text('label_department', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <i class="fa fa-fw fa-text-width"></i>
      {{ Form::label('active_item', 'Activar') }}
      @yield('recommendcreate')
      @yield('recommendedit')
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <i class="fa fa-fw fa-text-width"></i>
      {{ Form::label('orden', 'Orden') }}
      {{ Form::text('order_item', null, ['class' => 'form-control']) }}
    </div>
  </div>


  <div class="col-md-12">
    <div class="form-group">
      {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary'])}}
    </div>
  </div>
</div>

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".img1").select2({
        templateResult: formatState,
        templateSelection: formatState
    });

  function formatState(opt){
      if(!opt.id){
          return opt.text.toUpperCase();
         }

  var optimage = $(opt.element).attr('data-image');
  console.log(optimage)
  if(!optimage){
     return opt.text.toLowerCase();
     }else{
      var $opt = $(
         '<span><img src="' + optimage + '" width="120px" /> ' + opt.text.toLowerCase() + '</span>'
      );
      return $opt;
  }
};
});
</script>
@endsection
