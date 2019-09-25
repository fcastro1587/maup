<div class="row">

      <div class="col-md-2">
        <div class="form-group">
        {{ Form::label('regular', 'MT Regular')}}
        {{ Form::text('travel_mt', null, ['class' => 'form-control'])}}
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
        {{ Form::label('bloqueo', 'MT Bloqueo') }}
        {{ form::text('bloqueo_mt', null, ['class' => 'form-control'])}}
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
        {{ Form::label('temporada', 'Temporada') }}
        @yield('tempcreate')
        @yield('tempedit')
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
        {{ Form::label('temporada', '¿Esta en home?') }}
        @yield('homecreate')
        @yield('homeedit')
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
        {{ Form::label('temporada', '¿Esta en sección?') }}
        @yield('sectioncreate')
        @yield('sectionedit')
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
      <i class="fa fa-fw fa-plane"></i>
      {{ Form::label('Imagen para Mega Ofertas')}}
      <br>
        <select class="img1 form-control" name="multimedia_id_1" multiple>
          @yield('create_img1')
          @yield('multi_img1')
        </select>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
        <i class="fa fa-fw fa-plane"></i>
        {{ Form::label('Imagen para  Otoño Invierno')}}
        <br>
        <select class="img2 form-control" name="multimedia_id_2" multiple>
          <option value="0">seleccione</option>
          @yield('create_img2')
          @yield('multi_img2')
        </select>
        </div>
      </div>

      <div class="col-md-3">
        <div>
        <i class="fa fa-fw fa-plane"></i>
        {{ Form::label('Imagen para bloqueos')}}
        <br>
        <select class="img3 form-control" name="multimedia_id_3" multiple>
          @yield('create_img3')
          @yield('multi_img3')
        </select>
        </div>
      </div>

      <div class="col-md-3">
        <div>
        <i class="fa fa-fw fa-plane"></i>
        {{ Form::label('Imagen para favoritos')}}
        <br>
        <select class="img3 form-control" name="multimedia_id_4" multiple>
          @yield('create_img4')
          @yield('multi_img4')
        </select>
        </div>
      </div>

      <div style="clear:both">
      </div>

      <div class="col-md-3">
        <div>
        <i class="fa fa-fw fa-plane"></i>
        {{ Form::label('Orden', 'Orden') }}
        {{ form::text('order_item', null, ['class' => 'form-control'])}}
        </div>
      </div>

      <div class="col-md-3">
        <div>
        <i class="fa fa-fw fa-plane"></i>
        {{ Form::label('Activo / Inactivo')}}
        <br>
          @yield('activecreate')
          @yield('activeedit')
        </div>
      </div>




      <div class="col-md-12">
        <div class="form-group">
          <br>
          {{ Form::submit('Guardar', ['class' => 'btn btn-primary'])}}
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
         '<span><img src="' + optimage + '" width="60px" /> ' + opt.text.toLowerCase() + '</span>'
      );
      return $opt;
  }
};
});
</script>
@endsection
