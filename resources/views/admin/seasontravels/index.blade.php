@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading">
						<h4><i class="fa fa-fw fa-list-alt"></i>AGREGAR MTS CON SU RESPECTIVA IMAGEN PARA HOME</h4>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							@can('season_travel.create')
							<a href="{{ route('season_travel.create') }}" class="btn-dark pull-left">
								<i class="fa fa-fw fa-plus"></i>crear
							</a>
							@endcan
						</div>
					</div>
				</div>
			</div>

			<div class="panel-body">
				<table id="season_travel" class="table table-hover tb-viaje">
					<thead>
						<tr class="dark">
							<th>TEMPORADA</th>
							<!--<th>HOME</th>-->
							<th colspan="3">ACCIÓN</th>
						</tr>
					</thead>
					@foreach($season as $se)
					@foreach($seastravel as $seas)
					@if($seas->season_code_season == $se->code_season)
					<tbody>
						<tr>
							<td>
								<strong>{{$se->name}}</strong>
							</td>
							<td width="10px">
								@can('seasontravel.list')
								<a href="{{ route('seasontravel.list', $seas->season_code_season) }}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-pencil"></i>
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