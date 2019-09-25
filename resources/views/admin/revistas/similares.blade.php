@extends('adminlte::layouts.app')

@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<strong>Agregar Revista</strong>
				</div>
				<div class="panel-body">
					{!! Form::open(['route' => 'revistas.store']) !!}

					@section('similar')
					<div class="col-md-6">
						<div class="form-group">
							http://cafe.megatravel.com.mx/src/revistas/
							<img src="//cafe.megatravel.com.mx/src/revistas/folleto_europa.png" width="54" alt="Folleto Mensual">
							{{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'semana-santa-europa-2019, verano, europa-2019, etc...']) }}
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<br><br>
							{{ Form::label('mes', 'Mes') }}
							{!! Form::select('mes', [null => 'Seleccione Mes'] + ['Enero'      => 'Enero',
																																		'Febrero'    => 'Febrero',
																																		'Marzo'      => 'Marzo',
																																		'Abril'      => 'Abril',
																																		'Mayo'       => 'Mayo',
																																		'Junio'      => 'Junio',
																																		'Julio'      => 'Julio',
																																		'Agosto'     => 'Agosto',
																																		'Septiembre' => 'Septiembre',
																																		'Octubre'    => 'Octubre',
																																		'Noviembre'  => 'Noviembre',
																																		'Diciembre'  => 'Diciembre'],
							null, ['class' => 'form-control']) !!}
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<br><br>
							{{ Form::label('año', 'Año') }}
							{!! Form::select('anio', [null => 'Seleccione año'] + ['2019' => '2019',
																																		 '2020' => '2020',
																																		 '2021' => '2021',
																																		 '2022' => '2022',
																																		 '2023' => '2023',
																																		 '2024' => '2024',
																																		 '2025' => '2025',
																																		 '2026' => '2026',
																																		 '2027' => '2027',
																																		 '2028' => '2028',
																																		 '2029' => '2029',
																																		 '2030' => '2030'],
							null, ['class' => 'form-control']) !!}
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							{{ Form::label('descripcion', 'Descripción') }}
							{{ Form::textarea('descripcion', null, ['class' => 'form-control tarea']) }}
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							https://cafe.megatravel.com.mx/descargables/portadas/
							<img src="https://mout.mtmedia.com.mx/portadas/folleto_mensual.jpg" width="60">
							{{ Form::text('img_portada', null, ['class' => 'form-control', 'placeholder' => 'europa-2019, promociones-mega-travel, folleto-asia, etc...']) }}
						</div>
					</div>
					@endsection


					@include('admin.revistas.partials.form')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
