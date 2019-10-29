@extends('adminlte::layouts.app')


@section('main-content')
<div class="row">
	<div class="col-md-12 col-md-offset-0">
		<div class="panel panel-default">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading">
						<h4><i class="fa fa-fw fa-list-alt"></i>EDITAR IMAGEN DE BLOQUEO</h4>
					</div>
				</div>
			</div>
			<div class="panel-body table-responsive">
				<table id="blq" class="table table-hover tb-viaje">
					<thead>
						<tr class="dark">
							<th>MT</th>
							<th>IMAGEN</th>
							<th class="text-right">ACCION</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#blq').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "{{ url('bloqueo/mt') }}",
			"columns": [{
					data: 'bloqueo_mt',
					name: 'multimedia_travel.bloqueo_mt'
				},
				{
					data: 'name',
					name: 'multimedia.name',
					render: function(data, type, row) {
						return '<img src="https://img1.mtmedia.com.mx/covers/' + data + '" width="190"/>';
					}
				},
				{
					data: 'btn',
					name: 'btn'
				},

			],
			"lengthMenu": [
				[5, 20, 50, -1],
				[5, 20, 50, "Todos"]
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