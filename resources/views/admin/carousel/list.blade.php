@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading">
						<h4><i class="fa fa-fw fa-list-alt"></i>
							@php
							foreach($list as $lis){
							$col= $lis->carousel_travel_code;
							}
							echo "PROGRAMAS DESTACADOS DE "."<span style='text-transform: uppercase;'>". $col."</span>";
							@endphp
						</h4>
					</div>

					<div class="col-md-6">
						<div class="form-group">

							@can('carousel.createv')
							<a href="{{route('carousel.createv', $col)}}" class="btn btn-dark pull-left">
								<i class="fa fa-fw fa-plus"></i>crear
							</a>
							@endcan

						</div>
					</div>
				</div>
			</div>

			<div class="panel-body">
				<table class="table table-striped table-hover">
					<thead>
						<tr class="bg-primary">
							<th>PROGRAMAS</th>
							<th>ORDEN</th>
							<th>STATUS</th>
							<th>ACCIÓN</th>
						</tr>
					</thead>
					@foreach($list as $lis)
					<tbody>
						<tr>
							<td>
								<strong>
									@if(!empty($lis->carousel_travel_mt))
									{{$lis->carousel_travel_mt}}
									@else
									{{$lis->bloqueo_mt}}
									@endif
								</strong>
							</td>
							<td>
								{{$lis->order}}
							</td>
							<td>
								@if($lis->active)
								<span class="label label-success">activo</span>
								@else
								<span class="label label-danger">inactivo</span>
								@endif
							</td>
							<td width="10px">
								@can('carousel.edit')
								<a href="{{route('carousel.edit', $lis->id)}}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-pencil"></i>
									editar
								</a>
								@endcan
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>

			</div>
		</div>
	</div>
</div>

@endsection