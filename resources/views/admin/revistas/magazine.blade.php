@extends('adminlte::layouts.app')

@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<strong>Agregar Revista Magazine</strong>
				</div>
				<div class="panel-body">
					{!! Form::open(['route' => 'revistas.store']) !!}

					@section('blqmegazine')
					<div class="col-md-2">
				    <div class="form-group">
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

				  <div class="col-md-2">
				    <div class="form-group">
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

				  <div class="col-md-5">
				    <div class="form-group">
				      {{ Form::label('descripcion', 'Descripción') }}
				      {{ Form::textarea('descripcion', null, ['class' => 'form-control tarea']) }}
				    </div>
				  </div>

					<div class="col-md-3">
						<div class="form-group">
							{{ Form::label('destino', 'magazine') }}
							{{ Form::text('destino', 'magazine', ['class' => 'form-control',  'placeholder' => 'mensual', "readonly" =>"readonly"]) }}
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
