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
					<table class="table table-hover tb-viaje">
						<thead>
							<tr class="dark">
								<th width="200px">ID</th>
								<th>NOMBRE</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						@foreach($users as $user)
						<tbody>
							<tr>
								<td>{{$user->id}}</td>
								<td>{{$user->name}}</td>

								<td width="10px">
									@can('users.show')
									<a href="{{route('users.show',  $user->id)}}" class="btn btn-primary">
										<i class="fa fa-fw fa-plus"></i>
										ver
									</a>
									@endcan
								</td>

								<td width="10px">
									@can('users.edit')
									<a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-success">
										<i class="fa fa-fw fa-pencil"></i>
										editar
									</a>
									@endcan
								</td>

								<td width="10px">
									@can('users.destroy')
									{!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
									<button type="submit" onclick="return confirm('¿Estas seguro que desea eliminar este Tour?')" class="btn btn-sm btn-danger">
										<i class="fa fa-fw fa-remove"></i>Eliminar
									</button>
									{!! Form::close() !!}
									@endcan
								</td>
							</tr>
						</tbody>
						@endforeach
					</table>
					{{$users->render()}}
				</div>
			</div>
		</div>
	</div>
	@endsection