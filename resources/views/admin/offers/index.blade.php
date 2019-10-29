@extends('adminlte::layouts.app')
@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading">
          <h4><i class="fa fa-fw fa-list-alt"></i>OFERTAS ESPECIALES</h4>
          </div>
          <div class="col-md-6">
          <div class="form-group">
          <a href="{{route('offers.create')}}" class="btn-xs btn-primary pull-left">
            <i class="fa fa-fw fa-plus"></i>crear
          </a>
          </div>
          </div>
				</div>
			</div>
			<div class="panel-body">
      <table id="offer" class="table table-hover tb-viaje">
					<thead>
          <tr class="dark">
            <th>MT</th>
            <th>DEPARTAMENTO</th>
            <th>ORDEN</th>
            <th class="text-right">ACCIONES</th>
          </tr>
					</thead>
					<tfoot>
          <tr class="dark">
            <th>MT</th>
            <th>DEPARTAMENTO</th>
            <th>ORDEN</th>
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
		$('#offer').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "{{ url('offers/dataoffer') }}",
			"columns": [{
					data: 'bloqueo_mt',
					name: 'offers.bloqueo_mt'
				},
				{
					data: 'name',
					name: 'departments.name'
				},
				{
					data: 'order',
					name: 'offers.order'
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
@endsection
@endsection