<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <i class="fa fa-map-o"></i>
      {{ Form::label('Departamento', 'Selecciona un departamento para el filtro') }}
      <select class="form-control" name="department">
        @yield('department_create')
        @yield('department_edit')
      </select>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <i class="fa fa-file-text-o"></i>
      {{ Form::label('name', 'Pais') }}
      <select name="name" class="form-control" id="name">
        @yield('country_create')
        @yield('country_edit')
      </select>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <i class="fa fa-file-text-o"></i>
      {{ Form::label('name', 'Ciudad') }}
      <select name="city" class="form-control" id="cities">
        <option value="">seleccione una ciudad</option>
        @yield('city_create')
        @yield('city_edit')
      </select>
    </div>
  </div>



{{ Form::hidden('slug', null, ['class' => 'form-control', 'id' => 'url']) }}

<div class="col-md-12">
  <div class="form-group">
    <i class="fa fa-image"></i>
    {{ Form::label('file','Nombre imagen panoramica') }}
    <select class="multimedia-div form-control" name="multimedia_id_1" multiple>
      @yield('file_create')
      @yield('file_edit')
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

    $('#cities, #url').stringToSlug({
           callback: function(text){
            $('#url').val(text);
           }
    });


    $(".multimedia-div").select2({
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
