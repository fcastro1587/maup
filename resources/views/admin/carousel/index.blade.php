@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading">
						<h4><i class="fa fa-fw fa-list-alt"></i>DESTACADOS POR DEPARTAMENTO</h4>
					</div>
				</div>
			</div>

			<div class="panel-body">
				<table id="carousel" class="table table-hover tb-viaje">
					<thead>
						<tr class="dark">
							<th>DEPARTAMENTO</th>
							<th colspan="3">ACCIÓN</th>
						</tr>
					</thead>
					@foreach($depto as $dep)
					@foreach($carousel as $carou)
					@if($dep->code==$carou->carousel_travel_code)
					<tbody>
						<tr>
							<td>
								<strong>{{$dep->name}}</strong>
							</td>
							<td width="10px">
								@can('carousel.list')
								<a href="{{route('carousel.list', $carou->carousel_travel_code)}}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-pencil"></i>
									Todos los MTS
								</a>
								@endcan
							</td>
						</tr>
					</tbody>
					@break
					@endif
					@endforeach
					@endforeach
				</table>

			</div>
		</div>
	</div>
</div>
@endsection