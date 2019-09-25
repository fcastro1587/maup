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
							foreach($seas as $lis){
							foreach($lis->seasons as $li){
							$col= $li->name;
							}}
							echo "PROGRAMAS "."<span style='text-transform: uppercase;'>". $col."</span>";
							@endphp
						</h4>
					</div>
				</div>
			</div>

			<div class="panel-body">
				<table class="table table-striped table-hover">
					<thead>
						<tr class="bg-primary">
							<th>PROGRAMAS</th>
							<th>PUBLICADO EN HOME</th>
							<th>ORDEN</th>
							<th colspan="3">ACCIÓN</th>
						</tr>
					</thead>
					@foreach($seas as $seasr)
					<tbody>
						<tr>
							<td>
								<strong class="text-primary">
									@if(!empty($seasr->travel_mt))
									{{$seasr->travel_mt}}
									@endif

									@if(!empty($seasr->bloqueo_mt))
									{{$seasr->bloqueo_mt}}
									@endif
								</strong>
							</td>
							<td>
								@if($seasr->active_item == 0)
								<span class="label label-danger">inactivo</span>
								@endif
								@if($seasr->active_item == 1)
								<span class="label label-success">activo</span>
								@endif
							</td>
							<td>
								{{$seasr->order_item}}
							</td>
							<td width="10px">
								@can('season_travel.edit')
								<a href="{{ route('season_travel.edit', $seasr->id)}}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-pencil"></i>
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