@extends('adminlte::layouts.app')

@section('main-content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<strong>Agregar Revista Mensual</strong>
				</div>
				<div class="panel-body">
					{!! Form::open(['route' => 'revistas.store']) !!}

					   @include('admin.revistas.partials.form')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

@endsection
