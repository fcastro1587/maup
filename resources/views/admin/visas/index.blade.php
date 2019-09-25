@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading">
						<h4><i class="fa fa-fw fa-list-alt"></i>VISAS</h4>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							@can('visas.create')
							<a href="{{route('visas.create')}}" class="btn-dark pull-left">
								<i class="fa fa-fw fa-plus"></i>crear
							</a>
							@endcan
						</div>
					</div>
				</div>
			</div>

			<div class="panel-body">
				<table id="visas" class="table table-hover tb-viaje">
					<thead>
						<tr class="dark">
							<th width="10px">ID</th>
							<th>PAÍS</th>
							<th>DESCRIPCION</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@foreach($visas as $vi)
						<tr>
							<td>{{$vi->id}}</td>
							@php
							foreach($country as $con)
							{
							if($con->code_iata ==$vi->country_code)
							{
							echo "<td>".$con->name_country."</td>";
							}
							}
							@endphp
							<td>{!! str_limit($vi->description, $limit = 100, $end = '...') !!}</td>

							<td width="10px">
								@can('visas.edit')
								<a href="{{ route('visas.edit', $vi->id) }}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-pencil"></i>
									editar
								</a>
								@endcan
							</td>

							<td width="10px">
								@can('visas.destroy')
								{!! Form::open(['route' => ['visas.destroy', $vi->id], 'method' => 'DELETE']) !!}
								<button type="submit" onclick="return confirm('¿Estas seguro que desea eliminar este Tour?')" class="btn btn-sm btn-danger">
									<i class="fa fa-fw fa-remove"></i>Eliminar
								</button>
								{!! Form::close() !!}
								@endcan
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#visas').DataTable({
			"lengthMenu": [
				[10, 30, 50, -1],
				[10, 30, 50, "Todos"]
			],

			"order": [
				[0, "desc"]
			],
			"language": {
				"sProcessing": "Procesando...",
				"sLengthMenu": "Mostrar _MENU_ registros",
				"sZeroRecords": "No se encontraron resultados",
				"sEmptyTable": "Ningún dato disponible en esta tabla",
				"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix": "",
				"sSearch": "Buscar:",
				"sUrl": "",
				"sInfoThousands": ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst": "Primero",
					"sLast": "Último",
					"sNext": "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
			}
		});
	});
</script>
@endsection
@endsection