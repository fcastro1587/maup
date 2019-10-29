@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading">
						<h4><i class="fa fa-fw fa-list-alt"></i>TOURS OPCIONALES</h4>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							@can('tours.create')
							<a href="{{route('tours.create')}}" class="btn-xs btn-primary pull-left">
								<i class="fa fa-fw fa-plus"></i>crear
							</a>
							@endcan
						</div>
					</div>
				</div>
			</div>

			<div class="panel-body">
				<table id="tours" class="table table-hover tb-viaje">
					<thead>
						<tr class="dark">
							<th width="10px">DEPARTAMENTO</th>
							<th>TITULO DEL TOUR</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tours as $to)
						<tr>
							@php
							foreach($department as $depto)
							{
							if($to->department == $depto->code)
							{
							echo "<td>".$depto->name."</td>";
							}
							}
							@endphp
							<td>{{$to->title}}</td>

							<td width="10px">
								@can('tours.edit')
								<a href="{{ route('tours.edit', $to->id) }}" class="btn btn-xs btn-success"><i class="fa fa-fw fa-pencil"></i>
									
								</a>
								@endcan
							</td>

							<td width="10px">
								@can('tours.destroy')
								{!! Form::open(['route' => ['tours.destroy', $to->id], 'method' => 'DELETE']) !!}
								<button type="submit" onclick="return confirm('¿Estas seguro que desea eliminar este Tour?')" class="btn btn-xs btn-danger">
									<i class="fa fa-fw fa-remove"></i>
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
		$('#tours').DataTable({
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