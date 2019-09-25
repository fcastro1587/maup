<div class="col-md-3">
  <div class="form-group">
    <i class="fa fa-image"></i>
    {{ Form::label('mt','MT del header') }}
    {{ Form::text('header_mt', null, ['class' => 'form-control'])}}
  </div>
</div>

<div class="col-md-3">
  <div class="form-group">
    <i class="fa fa-image"></i>
    {{ Form::label('mt','MT Bloqueo') }}
    {{ Form::text('bloqueo_mt', null, ['class' => 'form-control'])}}
  </div>
</div>


<div class="col-md-3">
  <div class="form-group">
    <i class="fa fa-image"></i>
    {{ Form::label('depto','Nombre del departamento') }}
    @yield('createheader')
    @yield('editheader')
  </div>
</div>

<div class="col-md-3">
  <div class="form-group">
    <i class="fa fa-image"></i>
    {{ Form::label('orden','Posición de orden') }}
    {{ Form::text('order', null, ['class' => 'form-control'])}}
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <i class="fa fa-image"></i>
    {{ Form::label('active','Activo e Inactivo') }}
   @yield('deptocreate')
   @yield('deptoedit')
  </div>
</div>


<div class="col-md-8">
  <div class="form-group">
    <i class="fa fa-image"></i>
    {{ Form::label('file','Nombre imagen panoramica') }}
    <select class="department-img form-control" name="img" multiple>
    @yield('createdepto')
    @yield('editdepto')
    </select>
  </div>
</div>

<div class="col-md-12">
  <div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
  </div>
</div>
</div>

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".department-img").select2({
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
         '<span><img src="' + optimage + '" width="250px" /> ' + opt.text.toLowerCase() + '</span>'
      );
      return $opt;
  }
};
});
</script>
@endsection
