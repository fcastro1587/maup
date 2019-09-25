@extends('adminlte::layouts.app')


@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading">
						<h4><i class="fa fa-fw fa-list-alt"></i>Roles</h4>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							@can('roles.create')
							<a href="{{route('roles.create')}}" class="btn-dark pull-left">
								<i class="fa fa-fw fa-plus"></i>crear
							</a>
							@endcan
						</div>
					</div>
				</div>
			</div>

			<div class="panel-body">
				{{ $roles->render()}}
				<table class="table table-hover tb-viaje">
					<thead>
						<tr class="dark">
							<th>ID</th>
							<th>ROLES</th>
							<th colspan="3">&nbsp;</th>
						</tr>
					</thead>
					@foreach($roles as $role)
					<tbody>
						<tr>
							<td>{{$role->id }}</td>
							<td>{{$role->name }}</td>

							<td width="10">
								@can('roles.show')
								<a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-info"><i class="fa fa-fw fa-eye"></i>
									ver
								</a>
								@endcan
							</td>
							<td width="10">
								@can('roles.edit')
								<a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-pencil"></i>
									editar
								</a>
								@endcan
							</td>
							<td width="10">
								@can('roles.destroy')
								{!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE']) !!}
								<button class="btn btn-danger">
									Eliminar
								</button>
								{!! Form::close() !!}
								@endcan
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
				{{ $roles->render()}}
			</div>
		</div>
	</div>
</div>

@endsection