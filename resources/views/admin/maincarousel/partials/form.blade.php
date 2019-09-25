<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <i class="fa fa-fw fa-text-width"></i>
      {{ Form::label('MT Regular') }}
      {{ Form::text('travel_mt', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <i class="fa fa-fw fa-text-width"></i>
      {{ Form::label('Mt Bloqueo') }}
      {{ Form::text('bloqueo_mt', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="col-md-4">
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
      <i class="glyphicon glyphicon-picture"></i>
      {{ Form::label('letras', 'Letras de imagen') }}
      <select class="img2 form-control" name="multimedia_id_2" multiple>
        @yield('createimg2')
        @yield('editimg2')
      </select>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <i class="glyphicon glyphicon-picture"></i>
      {{ Form::label('miniatura', 'Imagen en miniatura') }}
      <select class="img3 form-control" name="multimedia_id_3" multiple>
        @yield('createimg3')
        @yield('editimg3')
      </select>
    </div>
  </div>

<div style="clear:both;"></div>

  <div class="col-md-6">
    <div class="form-group">
      {{ Form::label('Orden', 'Orden')}}
      {{ Form::text('order_item', null, ['class' => 'form-control']) }}
    </div>
  </div>


  <div class="col-md-6">
    <div class="form-group">
      {{ Form::label('activar', 'Activar')}}
      @yield('maincreate')
      @yield('mainedit')
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
    $(".img1, .img2, .img3").select2({
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
