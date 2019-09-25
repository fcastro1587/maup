
<div class="col-md-4">
	<div class="form-group">
		<i class="fa fa-fw fa-map-o"></i>
		{{ Form::label('departamento', 'Departamento') }}
		@yield('deparcreate')
		@yield('deparedit')
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<i class="fa fa-fw fa-calendar"></i>
		{{ Form::label('validity', 'Vigencia del programa') }}
		{{ Form::date('validity', null, ['class' => 'form-control', 'id' => 'validity']) }}
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<i class="fa fa-fw fa-text-width"></i>
		{{ Form::label('name', 'Nombre') }}
		{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<i class="fa fa-fw fa-text-width"></i>
		{{ Form::label('slug', 'Url Amigable') }}
		{{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
	</div>
</div>



@yield('bloqueselectcreate')
@yield('bloqueselectedit')
<div style="clear:both;"></div>

<div class="col-md-12">
	<div class="form-group">
		<span class="glyphicon glyphicon-picture"></span> / <i class="fa fa-video-camera"></i>
		<button type="button" class="form-control btn btn-success"><span class="glyphicon glyphicon-picture"></span> / <span class="fa fa-video-camera"></span> agregar imagenes o videos</button>
		<select class="form-control video" name="video[]" multiple>
			@yield('multicreate')
			@yield('multiedit')
		</select>
	</div>
</div>


<!--<div class="col-md-12">
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
			<select multiple class="presenterio form-control">
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
-->


<div style="clear:both;"></div>
<!-- Modal multipropositos,tanto para agregar usuarios a  -->
<div class="modal fade" id="multi_opt_user" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<i class="fi-heart"></i>
				<button id="pethatlimypro" type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>

				<div class="modal-body">
					<span id="resultado"></span>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END CONTENT MODAL -->

<div class="col-md-4">
	<div class="form-group">
		<i class="fa fa-fw fa-suitcase"></i>
		{{ Form::label('departure_date', 'Salidas') }}
		{{ Form::text('departure_date', null, ['class' => 'form-control', 'id' => 'departure_date']) }}
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<i class="fa fa-fw fa-sun-o"></i>
		{{ Form::label('days', 'Días') }}
		{{ Form::text('days', null, ['class' => 'form-control', 'id' => 'days']) }}
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<i class="fa fa-fw fa-moon-o"></i>
		{{ Form::label('nights', 'Noches') }}
		{{ Form::text('nights', null, ['class' => 'form-control', 'id' => 'nights']) }}
	</div>
</div>

<div class="col-md-12">
	<div class="form-group">
		<i class="fa fa-fw fa-text-width"></i>
		{{ Form::label('itinerary', 'Itinerario') }}
		{{ Form::textarea('itinerary', null, ['class' => 'form-control', 'id' => 'itinerary']) }}
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<i class="fa fa-fw fa-text-width"></i>
		{{ Form::label('include', 'Incluye') }}
		{{ Form::textarea('include', null, ['class' => 'form-control', 'id' => 'include']) }}
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<i class="fa fa-fw fa-text-width"></i>
		{{ Form::label('not_include', 'No Incluye') }}
		{{ Form::textarea('not_include', null, ['class' => 'form-control', 'id' => 'not_include']) }}
	</div>
</div>

<div class="col-md-3">
	<div class="form-group">
		<i class="fa fa-fw fa-money"></i>
		{{ Form::label('price', 'Precio Desde') }}
		{{ Form::text('price_from', null, ['class' => 'form-control', 'id' => 'price_from']) }}
	</div>
</div>

<div class="col-md-3">
	<div class="form-group">
		<i class="fa fa-fw fa-money"></i>
		{{ Form::label('taxes', 'Impuestos') }}
		{{ Form::text('taxes', null, ['class' => 'form-control', 'id' => 'taxes']) }}
	</div>
</div>

<div class="col-md-3">
	<div class="form-group">
		<i class="fa fa-fw fa-map-o"></i>
		{{ Form::label('rooms', 'Tipo de Habitación') }}
		<select class="form-control" name="rooms_id">
			@foreach ($rooms as $rom)
			<option value="{{ $rom->id }}" {{ (isset($viaje->rooms_id) && $rom->id == $viaje->rooms_id) ? ' selected' : '' }}>{{ $rom->name }}</option>
			@endforeach
		</select>
	</div>
</div>

<div class="col-md-3">
	<div class="form-group">
		<i class="fa fa-fw fa-map-o"></i>
		{{ Form::label('currency', 'Moneda') }}
		<select class="form-control" name="currency">
			@foreach ($currencies as $curre)
			<option value="{{ $curre->currency_travels }}" {{ (isset($viaje->currency) && $curre->currency_travels == $viaje->currency) ? ' selected' : '' }}>{{ $curre->currency_travels }}</option>
			@endforeach
		</select>
	</div>
</div>

<div class="col-md-12">
	<div class="form-group">
		<i class="fa fa-fw fa-table"></i>
		{{ Form::label('price_table', 'Tabla de Precios') }}
		{{ Form::textarea('price_table', null, ['class' => 'form-control', 'id' => 'price_table']) }}
	</div>
</div>

<div class="col-md-12">
	<div class="form-group">
		<i class="fa fa-fw fa-table"></i>
		{{ Form::label('hotels_table', 'Hoteles') }}
		{{ Form::textarea('hotels_table', null, ['class' => 'form-control', 'id' => 'hotels_table']) }}
	</div>
</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title"> Filtros especiales</h3>
	</div>
	<div class="panel-body">

		@yield('eccreate')
		@yield('ecedit')

		<div class="col-md-5">
			<div class="form-group">
				<i class="fa fa-fw fa-filter"></i>
				{{ Form::label('validity', 'Filtro para las secciones de Europa, USA, México, Canada') }}
				<br>
				@yield('sectioncreate')
				@yield('sectionedit')
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<i class="fa fa-fw fa-map-marker"></i>
				{{Form::label('Tours Opcionales')}}

				@yield('tourcreate')
				@yield('touredit')

			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<i class="fa fa-fw fa-star"></i>
				{{ Form::label('Temporadas')}}
				<br>
				@yield('seasoncreate')
				@yield('seasonsedit')
			</div>
		</div>

	</div>
</div>

<div class="col-md-12">
	<div class="form-group">
		{{ Form::label('status', 'Publicar') }}
		@yield('checkcreate')
		@yield('checkedit')
	</div>
</div>

<div class="col-md-12">
	<div class="form-group">
		{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
	</div>
</div>
@section('script')

<script type="text/javascript" src='{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

<script src='{{ asset('js/jquery.js')}}'></script>
<script src="{{ asset('js/jquery.selectlistactions.js') }}"></script>
<script type="text/javascript">
	//cnvierte titulo a url amigable
	$(document).ready(function() {
		$("#name, #slug").stringToSlug({
			callback: function(text) {
				$('#slug').val(text);
			}
		});

		$('#listconutry').select2();
		$('#listcity').select2();

		//select two
		$(".js-example-basic-multiple, .js-example-basic-multiple2, .js-example-basic-multiple3, .js-example-basic-multiple4, .js-example-basic-multiple5, .js-example-basic-multiple6").select2();
		$(".js-example-basic-multiple, .js-example-basic-multiple2, .js-example-basic-multiple3, .js-example-basic-multiple4, .js-example-basic-multiple5, .js-example-basic-multiple6").on("select2:select", function(evt) {
			var element = evt.params.data.element;
			var $element = $(element);

			$element.detach();
			$(this).append($element);
			$(this).trigger("change");
		});

		$(".video").select2({
			templateResult: formatState,
			templateSelection: formatState
		});

		function formatState(opt) {
			if (!opt.id) {
				return opt.text.toUpperCase();
			}

			var optimage = $(opt.element).attr('data-image');
			console.log(optimage)
			if (!optimage) {
				return opt.text.toLowerCase();
			} else {
				var $opt = $(
					'<span><img src="' + optimage + '" width="60px" /> ' + opt.text.toLowerCase() + '</span>'
				);
				return $opt;
			}
		};

		$("#mt").keyup(function() {
			var ec = $(this).val();
			$.ajax({
				data: ec,
				url: 'http://mng.sysmega.net/manager/admin/filterec/' + ec,
				type: 'get',
				beforeSend: function() {
					$('#mtec').html('Espere...');
				},
				success: function(response) {
					$('#mtec').html(response);
				}
			});

		});


		$("#mt").keyup(function() {
			var filters_eumcp = $(this).val();
			$.ajax({
				data: filters_eumcp,
				url: 'http://mng.sysmega.net/manager/admin/filters_sections/' + filters_eumcp,
				type: 'get',
				beforeSend: function() {
					$('#filters').html('Espere...');
				},
				success: function(response) {
					$('#filters').html(response);
				}
			});

		});

		$("#mt").keyup(function() {
			var toursmt = $(this).val();
			$.ajax({
				data: toursmt,
				url: 'http://mng.sysmega.net/manager/admin/tours_opc/' + toursmt,
				type: 'get',
				beforeSend: function() {
					$('#toursmt').html('Espere...');
				},
				success: function(response) {
					$('#toursmt').html(response);
				}
			});

		});


	}); //fin deocument.ready

	//consultar operador
	function consultadepto() {
		var mt = $("#mt").val();
		$.ajax({
			data: mt,
			url: 'http://mng.sysmega.net/manager/admin/rangeoper/' + mt,
			type: 'get',
			beforeSend: function() {
				$('#arrojarmt').html('Enviando datos por favor espere...');
			},
			success: function(response) {
				$('#arrojarmt').html(response);
			}
		});
	}

	$('#btncountry').click(function(e) {
		$('select').moveToList('#listconutry', '.presenterlistcountry');
		e.preventDefault();
	});
	$('#btncity').click(function(e) {
		$('select').moveToList('#listcity', '.presenterlistcity');
		e.preventDefault();
	});
	$('#btnimagen').click(function(e) {
		$('select').moveToList('#listimagen', '.presenterio');
		e.preventDefault();
	});


	$('#btnremovecountry').click(function(e) {
		$('select').removeSelected('.presenterlistcountry');
		e.preventDefault();
	});
	$('#btnremovecity').click(function(e) {
		$('select').removeSelected('.presenterlistcity');
		e.preventDefault();
	});
	$('#btnremoveimg').click(function(e) {
		$('select').removeSelected('.presenterlistimg');
		e.preventDefault();
	});


	$('#btnupcountry').click(function(e) {
		$('select').moveUpDown('.presenterlistcountry', true, false);
		e.preventDefault();
	});
	$('#btnupcity').click(function(e) {
		$('select').moveUpDown('.presenterlistcity', true, false);
		e.preventDefault();
	});
	$('#btnupimg').click(function(e) {
		$('select').moveUpDown('.presenterlistimg', true, false);
		e.preventDefault();
	});


	$('#btncountrydown').click(function(e) {
		$('select').moveUpDown('.presenterlistcountry', false, true);
		e.preventDefault();
	});
	$('#btncitydown').click(function(e) {
		$('select').moveUpDown('.presenterlistcity', false, true);
		e.preventDefault();
	});
	$('#btnimgdown').click(function(e) {
		$('select').moveUpDown('.presenterlistimg', false, true);
		e.preventDefault();
	});


	var $ajax = $(".js-data-example-ajax");
	$ajax.select2({
		ajax: {
			url: "http://mng.sysmega.net/manager/admin/select/dataremote",
			dataType: 'json',
			delay: 250,
			data: function(params) {
				return {
					q: params.term,
					page: params.page
				};
			},
			processResults: function(data, params) {
				console.log(data, params);
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
		escapeMarkup: function(markup) {
			return markup;
		},
		minimumInputLength: 1,
		templateResult: formatRepo,
		templateSelection: formatRepoSelection,
	});

	function formatRepo(repo) {
		if (repo.loading) return repo.text;
		console.log(repo.loading);
		var markup =
			"<option value="+repo.id+">"+repo.name+"</option>";

		return markup;
	}

	function formatRepoSelection(repo) {
		return repo.name || repo.text;
	}

	function selectcity(id) {
		$("#" + id + " option").each(function() {
			$("#" + id + " option[value=" + this.value + "]").prop("selected", true);
		});
	}

	function selectcountry(id) {
		$("#" + id + " option").each(function() {
			$("#" + id + " option[value=" + this.value + "]").prop("selected", true);
		});
	}

	function selectimg(id) {
		$("#" + id + " option").each(function() {
			$("#" + id + " option[value=" + this.value + "]").prop("selected", true);
		});
	}

	//cerrar modal
	$('#multi_opt_user').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var recipient = button.data('whatever')
		var modal = $(this)
		modal.find('.modal-title').text(recipient)
	});

	//cambiar imagen panoramica por medio de Modal
	function panoramica() {
		var panoramic = '';
		$('#citytext option:selected').each(function() {
			panoramic += $(this).text() + ',';
		});

		fin = panoramic.length - 1; // calculo cantidad de caracteres menos 1 para eliminar la coma final
		panoramic = panoramic.substr(0, fin); // elimino la coma final

		$.ajax({
			data: panoramic,
			url: 'http://mng.sysmega.net/manager/admin/imagepanoramic/' + panoramic,
			type: 'get',
			beforeSend: function() {
				$('#resultado').html('Enviando datos por favor espere...');
			},
			success: function(response) {
				$('#resultado').html(response);
				//console.log(response);
			}
		});
	};

	//Ckeditor
	CKEDITOR.config.height = 300;
	CKEDITOR.config.width = 'auto';
	CKEDITOR.config.toolbarCanCollapse = true;
	//CKEDITOR.config.toolbar = 'basic';
	$('#itinerary').ckeditor();
	$('#price_table').ckeditor();
	$('#hotels_table').ckeditor();
</script>
<script>
	$(document).ready(function() {
		$('#users').select2({
			ajax: {
				url: 'tags/find',
				dataType: 'json',
				delay: 200,
				data: function(params) {
					return {
						q: params.term,
						page: params.page
					};
				},
				processResults: function(data, params) {
					params.page = params.page || 1;
					return {
						results: data.data,
						pagination: {
							more: (params.page * 10) < data.total
						}
					};
				}
			},
			minimumInputLength: 1,
			templateResult: function(repo) {
				if (repo.loading) return repo.name;
				var markup = "<img src=" + repo.photo + "></img> &nbsp; " + repo.name;
				return markup;
			},
			templateSelection: function(repo) {
				return repo.name;
			},
			escapeMarkup: function(markup) {
				return markup;
			}
		});
	});
</script>

@endsection