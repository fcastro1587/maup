@extends('adminlte::layouts.app')

@section('main-content')
@php
setlocale(LC_TIME, "es_ES");
$mes = strftime("%B");
@endphp
<div class="row">
	<div class="col-md-12">
		<h1 class="title"><i class="fa fa-fw fa-list-alt"></i>REVISTAS</h1>
	</div>

	<div class="panel panel-default">
		<div class="panel panel-body">
			<div class="col-md-3">
				<div class="form-group">
					<a href="{{ route('revistas.create') }}" class="btn-dark pull-left">
						<i class="fa fa-fw fa-plus"></i>Nueva Revista
					</a>
				</div>
			</div>
		</div>
	</div>

	<div id="container">
		<div class="col-md-12 ">
			<div class="col-md-12 col-lg-12">
				<h1 class="title">Mega<span> Traveler</span><br>
					<h2 style="font-size: 1.3em;font-family: 'Cinzel', serif;color: #132162;text-transform: uppercase;margin-top: 0px;margin-bottom: 30px;">
						REVISTA PARA VIAJEROS
					</h2>
			</div>

			<div class="col-md-7 col-lg-7">
				@foreach($revista as $main)
				@if($main->tipo_revista == 'mensual' and $main->tipo_revista = $mes)
				<div id="principal">
					<iframe src="{{$main->url}}" style="width:100%; height:420px;" title="issuu.com" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" msallowfullscree="">
					</iframe>
					<div class="detalle">
						<p>
							<strong>{{$main->descripcion}}</strong><br>
							<strong>{{$main->mes}}</strong>
						</p>
					</div>
				</div>
				@break
				@endif
				@endforeach

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h1 class="title">Mega<span> Magazine </span></h1>
					<h2 style="font-size: 1.3em;font-family: 'Cinzel', serif;color: #132162;text-transform: uppercase;margin-top: 0px;margin-bottom: 30px;">
						FOLLETO PARA AGENTES DE VIAJES
					</h2>
				</div>
				@foreach($revista as $magazine)
				@if($magazine->tipo_revista == 'magazine')
				<div id="magazine">
					<iframe src="{{$magazine->url}}" style="width:100%; height:420px;" title="issuu.com" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" msallowfullscree="">
					</iframe>
					<div class="detalle">
						<p>
							<strong>{{$magazine->descripcion}} <br>
								{{$magazine->mes}} - {{$magazine->anio}}</strong><br>
						</p>
						<div class="redes">
							<a style="display:block;" href="{{ route('revistas.edit', $magazine->id) }}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-pencil"></i>
								editar
							</a></div>
					</div>
				</div>
				@endif
				@endforeach
			</div>

			<div class="col-sm-12 col-md-5 col-lg-5 item-lat">
				<div id="slider">
					@foreach($revista as $mensual)
					@if($mensual->tipo_revista <> 'otra' and $mensual->tipo_revista <> 'magazine')
					@php $rest2 = substr($mensual->url, -13); @endphp
					<div class="col-md-6 col-sm-4 col-xs-6 item">
						<img src="https://mout.mtmedia.com.mx/magazines/revistas/{{$rest2}}.png" class="thumb" border="0" alt="{{$mensual->descripcion}}">
						</a>
						<p>
							{{$mensual->descripcion}}<br>
							{{$mensual->mes}}
						</p>

						<div class="redes">
							<a style="display:block;" href="{{ route('revistas.edit', $mensual->id) }}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-pencil"></i>
								editar
							</a>
						</div>
					</div>
					@endif
					@endforeach


					@foreach($revista as $similar)
					@if($similar->tipo_revista == 'otra')
							@php $rest = substr($similar->url, -8); @endphp
							<div class="col-md-6 col-sm-4 col-xs-6 item"><img src="https://mout.mtmedia.com.mx/magazines/revistas/{{$rest}}.png" class="thumb" border="0" alt="{{$similar->descripcion}}">
								</a>
								<p>
									{{$similar->descripcion}}<br>
									{{$similar->mes}}
								</p>

								<div class="redes">
									<a style="display:block;" href="{{ route('revistas.edit', $similar->id) }}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-pencil"></i>
										editar
									</a>
								</div>
							</div>
							@endif
							@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	$(function() {
		$(".principal").click(function() {
			var image = $(this).attr("rel");
			$('#principal').hide();
			$('#principal').fadeIn('slow');
			$('#principal').html(image);
			return false;
		});
	});
</script>
@endsection