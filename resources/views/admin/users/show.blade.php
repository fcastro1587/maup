@extends('adminlte::layouts.app')

@section('main-content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading">
						<h4><i class="fa fa-fw fa-list-alt"></i>Usuarios</h4>
					</div>
				</div>

				<div class="panel-body">
					<p><strong>Nombre</strong>{{ $user->name }}</p>
					<p><strong>Email</strong>{{ $user->email }}</p>
					<p></p>
				</div>

			</div>
		</div>
	</div>
@endsection