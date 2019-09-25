<div class="row">
    <div class="col-md-3">
      <div class="form-group">
        {{ Form::label('MT', 'MT')}}
        @yield('mtcreate')
        @yield('mtedit')
      </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">
        {{ Form::label('MT', 'MT(bloqueo)')}}
        {{ Form::text('bloqueo_mt', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        {{ Form::label('code', 'Departamento')}}
        @yield('deptocreate')
        @yield('deptoedit')
      </div>
    </div>


    <div class="col-md-2">
      <div class="form-group">
        {{ Form::label('orden', 'Orden')}}
        {{ Form::text('order', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        {{ Form::label('orden', 'Activar')}}
        @yield('carouselcreate')
        @yield('carouseledit')
      </div>
    </div>



    <div class="col-md-12">
    <div class="form-group">
      <i class="fa fa-fw fa-plane"></i>
      {{ Form::label('Imagenes para carrusel de destino')}}
      <br>
      <select class="images-carousel form-control" name="multimedia_id" multiple="multiple">
        @yield('multicreate')
        @yield('multiedit')
      </select>

    </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        {{ Form::submit('Guardar', ['class' => 'btn btn-primary'])}}
      </div>
    </div>

</div>

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".images-carousel").select2({
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
         '<span><img src="' + optimage + '" width="60px" /> ' + opt.text.toLowerCase() + '</span>'
      );
      return $opt;
  }
};
});
</script>
@endsection
