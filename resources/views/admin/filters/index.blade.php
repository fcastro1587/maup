@extends('adminlte::layouts.app')

@section('main-content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel panel-default">
          <div class="panel panel-body">
            <div class="panel-heading">
              <h4><i class="fa fa-filter"></i>SECCIONES</h4>
            </div>

            <div class="col-md-6">
              <div class="form-group">
								@can('filters.create')
                <a href="{{route('filters.create')}}" class="btn btn-primary">
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
                <th>PAIS / CIUDAD</th>
                <th>IMAGEN DE LA SECCIÓN</th>
                <th colspan="3">&nbsp;</th>
              </tr>
            </thead>
            @foreach($filter as $fil)
              <tbody>
                @if(!empty($fil->name) && !empty($fil->city) )
                <tr>
                  <td>
                    @foreach($country as $coun)
                    @if($coun->code_iata ==$fil->name)
                    @php
                    foreach($city as $ci)
                    {
                    if($ci->id == $fil->city)
                    {
                    echo "<strong>".$coun->name_country.'/'.$ci->name."</strong>";
                    }
                    }
                    @endphp
                    @endif
                    @endforeach
                  </td>
                  <td>
                    @foreach($fil->multi as $mul)
                    <a href="https://img1.mtmedia.com.mx/deptos/{{$mul->name}}" target="_blank"><img src="https://img1.mtmedia.com.mx/deptos/{{$mul->name}}" alt="panoramica" width="250px"></a>
                    @endforeach
                  </td>
                  <td width="10">
										@can('filters.show')
										<a href="{{ route('filters.show',$fil->name.'/'.$fil->city) }}" class="btn btn-sm btn-info"><i class="fa fa-fw fa-eye"></i>
											ver
										</a>
										@endcan
									</td>
                  <td width="10">
										@can('filters.edit')
										<a href="{{ route('filters.edit', $fil->id) }}" class="btn btn-sm btn-default"><i class="fa fa-fw fa-pencil"></i>
										editar
									  </a>
										@endcan
								</td>
                  <td width="10">
									@can('filters.destroy')
                  {!! Form::open(['route' => ['filters.destroy', $fil->id], 'method' => 'DELETE']) !!}
                  <button type="submit" onclick="return confirm('¿Estas seguro que desea eliminar esta habitación??')" class="btn btn-sm btn-warning">
                    <i class="fa fa-fw fa-remove"></i>Eliminar
                  </button>
                  {!! Form::close() !!}
									@endcan
                  </td>
                </tr>
                @else
                <tr>
                  <td>
                    @foreach($country as $coun)
                    @if($coun->code_iata ==$fil->name)
                    <strong>{{$coun->name_country}}</strong>
                    @endif
                    @endforeach
                  </td>
                  <td>
                    @foreach($fil->multi as $mul)
                    <a href="https://img1.mtmedia.com.mx/deptos/{{$mul->name}}" target="_blank"><img src="https://img1.mtmedia.com.mx/deptos/{{$mul->name}}" alt="panoramica" width="250px"></a>
                    @endforeach
                    </td>
                  <td width="10">
										@can('filters.show')
										<a href="{{ route('filters.show',$fil->name) }}" class="btn btn-sm btn-info"><i class="fa fa-fw fa-eye"></i>
											ver
										</a>
										@endcan
									</td>
                  <td width="10">
										@can('filters.edit')
										<a href="{{ route('filters.edit', $fil->id) }}" class="btn btn-sm btn-default"><i class="fa fa-fw fa-pencil"></i>
											editar
										</a>
										@endcan
									</td>
                  <td width="10">
									@can('filters.destroy')
                  {!! Form::open(['route' => ['filters.destroy', $fil->id], 'method' => 'DELETE']) !!}
                  <button type="submit" onclick="return confirm('¿Estas seguro que desea eliminar esta habitación??')" class="btn btn-sm btn-warning">
                    <i class="fa fa-fw fa-remove"></i>Eliminar
                  </button>
                  {!! Form::close() !!}
									@endcan
                  </td>
                </tr>
                @endif
              </tbody>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
