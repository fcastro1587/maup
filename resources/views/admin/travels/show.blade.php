@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<span style="text-transform: uppercase;"><i class="fa fa-fw fa-eye"></i>MT: {{$viaje->mt}} {{$viaje->name}}</span>
					</h3>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-12">
						<strong>IMAGEN PRINCIPAL</strong>
						<p>
							@foreach($viaje->multimedia as $ima)
							@if($ima->type==1)
							<img src="https://img1.mtmedia.com.mx/covers/{{$ima->name}}" alt="" width="900" height="650">
							@endif
							@endforeach
						</p>
					</div>
				</div>
			</div>


			@foreach($viaje->multimedia as $video)
			@if($video->video_type==2)
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-12" style="padding:56.25% 0 0 0;position:relative;">
						<iframe src="https://player.vimeo.com/video/{{$video->url}}?title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						<script src="https://player.vimeo.com/api/player.js"></script>

					</div>
				</div>
			</div>
			@endif

			@if($video->video_type==1)
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-12">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/{{$video->url}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			@endif
			@endforeach



			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-6">
						<strong>PAISES</strong>
						<p>
							@foreach($viaje->countries as $cont)
							{{$cont->name_country}}
							@endforeach
						</p>
					</div>
					<div class="col-md-6">
						<strong>CIUDADES</strong>
						<p>
							@foreach($viaje->cities as $city)
							{{$city->name}}
							@endforeach
						</p>
					</div>
				</div>
			</div>


			@foreach($viaje->countries as $cont)

			@foreach($cont->visas as $vis)
			{!!nl2br($vis->description)!!}
			@endforeach


			@endforeach

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-6">
						<strong>AEROLINEA</strong>
						<p>
							@foreach($viaje->airlines as $airline)
							<img src="{{asset('https://img3.mtmedia.com.mx/airlines').'/'.$airline->img_airline}}" alt="{{$airline->airline}}">
							@endforeach
						</p>
					</div>
					<div class="col-md-6">
						<strong>HABITACIÓN</strong>
						<p>
							{{$viaje->rooms->name}}
						</p>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-4">
						<strong>DÍAS</strong>
						<p>{{ $viaje->days }}</p>
					</div>
					<div class="col-md-4">
						<strong>NOCHES</strong>
						<p> {{ $viaje->nights }}</p>
					</div>
					<div class="col-md-4">
						<strong>VIGENCIA</strong>
						<p> {{ $viaje->validity }}</p>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-4">
						<strong>PRECIO DESDE</strong>
						<p>{{ $viaje->price_from }} {{$viaje->currency}} + {{$viaje->taxes}} de impuestos </p>
					</div>
					<div class="col-md-4">
						<strong>SALIDAS</strong>
						<p>{{ $viaje->departure_date }}</p>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-6">
						<strong>INCLUDE</strong>
						<p>{{ $viaje->include }}</p>
					</div>
					<div class="col-md-6">
						<strong>NO INCLUYE</strong>
						<p>{{ $viaje->not_include }}</p>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-12">
						<strong>ITINERARIO</strong>
						<p>{!! nl2br($viaje->itinerary) !!}</p>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-12">
						<strong>PRECIOS</strong>
						<p>
							{!! $viaje->price_table !!}
						</p>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-12">
						<strong>HOTELES</strong>
						<p>{!! $viaje->hotels_table !!}</p>
					</div>
				</div>
			</div>


			@foreach($viaje->tours as $tou)
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-12">
						<p><strong>TOURS OPCIONALES</strong></p>
						<p>{{$tou->title}}</p>
						<p>{{$tou->especial_itinerary}}</p>
					</div>
				</div>
			</div>
			@endforeach




		</div>
	</div>
</div>
</div>

@endsection