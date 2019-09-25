@extends('adminlte::layouts.app')

@section('main-content')
<div class="container">
		<div class="row">
			<div class="col-md-12">
			 <div class="panel panel-default">
			   <div class="panel panel-default">
					 <div class="panel-body">
						<div class="panel-heading">
						<h4><i class="fa fa-fw fa-list-alt"></i>TOURS OPCIONALES</h4>
				   	</div>

            <div class="col-md-6">
            {!! Form::open(['route' => 'toptravels.index', 'method' => 'GET']) !!}
            <div class="input-group">
              {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Search', 'aria-describedby' => 'search']) !!}
              <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" arial-hidden='true'></span></span>
            </div>
            {!! Form::close() !!}
            </div>

						<div class="col-md-6">
						<div class="form-group">
						<a href="{{route('toptravels.create')}}" class="btn btn-primary pull-right">
							<i class="fa fa-fw fa-plus"></i>crear
						</a>
				  	</div>
						</div>
						</div>
					</div>

					<div class="panel-body">
						<table class="table table-striped table-hover">
						<thead>
							<tr class="bg-primary">
								<th width="10px">MT</th>
								<th>DEPARTAMENTO</th>
								<th colspan="2">&nbsp;</th>
							</tr>
						</thead>
								@foreach($top as $to)
									<tbody>
										<tr>
											<td>{{$to->top_travel_mt}}</td>
											@php
											foreach($department as $depto)
											{
												if($to->top_travel_code == $depto->code)
												{
												echo "<td>".$depto->name."</td>";
											}
											}
											@endphp
											<td width="10px"><a href="{{ route('toptravels.edit', $to->id) }}" class="btn btn-sm btn-default"><i class="fa fa-fw fa-pencil"></i>editar</a></td>
											<td width="10px">
												{!! Form::open(['route' => ['toptravels.destroy', $to->id], 'method' => 'DELETE']) !!}
												<button type="submit" onclick="return confirm('¿Estas seguro que desea eliminar este Tour?')" class="btn btn-sm btn-danger">
													<i class="fa fa-fw fa-remove"></i>Eliminar
												</button>
												{!! Form::close() !!}
											</td>
										</tr>
									</tbody>
								@endforeach
						</table>
						{{ $top->render() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
