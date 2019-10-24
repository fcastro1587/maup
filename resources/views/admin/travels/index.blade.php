@extends('adminlte::layouts.app')


@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading">
						<h4><i class="fa fa-fw fa-list-alt"></i>LISTADO DE PROGRAMAS</h4>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							@can('viaje.create')
							<a href="{{route('viaje.create')}}" class="btn-xs btn-primary pull-left">
								<i class="fa fa-fw fa-plus"></i>crear
							</a>
							@endcan
						</div>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<table id="viajes" class="table table-striped table-hover tb-viaje">
					<thead>
						<tr class="dark">
							<th width="7">MT</th>
							<th>NOMBRE</th>
							<th>DEPARTAMENTO</th>
							<th>VIGENCIA</th>
							<th class="text-right">ACCIONES</th>
						</tr>
					</thead>
					<tfoot>
						<tr class="dark">
							<th width="7">MT</th>
							<th>NOMBRE</th>
							<th>DEPARTAMENTO</th>
							<th>VIGENCIA</th>
							<th class="text-right">ACCIONES</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#viajes').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "{{ url('role/viaje') }}",
			"columns": [{
					data: 'mt'
				},
				{
					data: 'name'
				},
				{
					data: 'department'
				},
				{
					data: 'validity'
				},
				{
					data: 'btn'
				},
			],
			"lengthMenu": [
				[10, 20, 50, -1],
				[10, 20, 50, "Todos"]
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
<script>
	$('#delete').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var cat_id = button.data('viajeid')
		var modal = $(this)
		modal.find('.modal-body #viaje_id').val(cat_id);
	})
</script>
@endsection
@endsection