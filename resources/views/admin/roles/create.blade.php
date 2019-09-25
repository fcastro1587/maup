@extends('adminlte::layouts.app')

@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<strong>Agregar Rol</strong>
				</div>
				<div class="panel-body">
					{!! Form::open(['route' => 'roles.store']) !!}

					@include('admin.roles.partials.form')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
