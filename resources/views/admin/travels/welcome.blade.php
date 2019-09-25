@extends('adminlte::layouts.app')

@section('main-content')



<div class="col-md-12">
  <div class="col-md-6">
    <div class="form-group">
      <i class="fa fa-fw fa-map-o"></i>
      {{ Form::label('Imagenes')}}
      <br>
      <div class="input-group">
        <select class="js-data-example-ajax form-control" id="listimagen">
          <option value="223">seleccione</option>
        </select>
        <div class="input-group-btn">
          <button type="button" id="btnimagen" class="btn btn-info"><i class="fa fa-plus"></i></button>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <label class="control-label">Imagenes</label>
    <div class="selected-left">
      <select multiple="multiple" class="presenterio form-control" name="lineas">
      </select>

    </div>
    <div class="selected-right">
      <button type="button" class="btn btn-default btn-sm" id="btnupimg">
        <span class="glyphicon glyphicon-chevron-up"></span>
      </button>
      <button type="button" class="btn btn-default btn-sm" id="btnimgdown">
        <span class="glyphicon glyphicon-chevron-down"></span>
      </button>
      <button type="button" class="btn btn-default btn-sm" id="btnremoveimg">
        <span class="glyphicon glyphicon-remove"></span>
      </button>
      <input type="button" value="seleccionar todo" onclick="selectimg('imgmultiple')">
    </div>
  </div>
</div>



@section('script')
<script src='{{ asset('js/jquery.js')}}'></script>
<script src="{{ asset('js/jquery.selectlistactions.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
  $(document).ready(function() {

    $('#btnimagen').click(function(e) {
      $('#listimagen').moveToList('#listimagen', '.presenterio');
      e.preventDefault();
    });

    $('#btnremoveimg').click(function(e) {
      $('select').removeSelected('.presenterlistimg');
      e.preventDefault();
    });

    $('#btnupimg').click(function(e) {
      $('select').moveUpDown('.presenterlistimg', true, false);
      e.preventDefault();
    });

    $('#btnimgdown').click(function(e) {
      $('select').moveUpDown('.presenterlistimg', false, true);
      e.preventDefault();
    });

    function selectimg(id) {
      $("#" + id + " option").each(function() {
        $("#" + id + " option[value=" + this.value + "]").prop("selected", true);
      });
    }





  /*$('.js-data-example-ajax').select2({
                ajax: {
                    url: 'http://mng.sysmega.net/manager/admin/select/dataremote',
                    data: function (params) {
                        return {
                            search: params.term,
                            page: params.page || 1
                        };
                    },
                    dataType: 'json',
                    processResults: function (data) {
                        data.page = data.page || 1;
                        return {
                            results: data.items.map(function (item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                };
                            }),
                            pagination: {
                                more: data.pagination
                            }
                        }
                    },
                    cache: true,
                    delay: 250
                },
                placeholder: 'Country',
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });
            
            
function formatRepo (item) {
  if (item.loading) {
    return item.name;
  }

  var $container = $(
    "<div>" +
      "<div><img src='https://img2.mtmedia.com.mx/thumbnails/" + item.name + "' /></div>" +
      "<div>" + item.description + "'</div>" +
    "</div>"
  );
  

  return $container;
}
  function formatRepoSelection (repo) {
  return repo.full_name || repo.text;

}*/

  $(".js-data-example-ajax").select2({
  ajax: {
    url: "http://mng.sysmega.net/manager/admin/select/dataremote",
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
        q: params.term, // search term
        page: params.page
      };
    },
    processResults: function (data, params) {
      // parse the results into the format expected by Select2
      // since we are using custom formatting functions we do not need to
      // alter the remote JSON data, except to indicate that infinite
      // scrolling can be used
      params.page = params.page || 1;

      return {
        results: data.items,
        pagination: {
          more: (params.page * 30) < data.total_count
        }
      };
    },
    cache: true
  },
  placeholder: 'Search for a repository',
  minimumInputLength: 1,
  templateResult: formatRepo,
  templateSelection: formatRepoSelection
});

function formatRepo (repo) {
  if (repo.loading) {
    return repo.name;
  }
  var $container = $(
    "<div>" +
      "<div><img width='80px' src='https://img2.mtmedia.com.mx/thumbnails/" +repo.name+ "' /></div>" +
      "<div>" +repo.description+ "'</div>" +
    "</div>"
  );

  return $container;
}

function formatRepoSelection (repo) {
  return repo.name;
}

        });
</script>
@endsection
@endsection