@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel panel-default">
        <div class="panel panel-body">
          <div class="panel-heading">
            <h4><i class="fa fa-filter"></i>IMAGEN PANORAMICA POR DEPARTAMENTO</h4>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              @can('department.create')
              <a href="{{route('department.create')}}" class="btn-dark pull-left">
                <i class="fa fa-fw fa-plus"></i>crear
              </a>
              @endcan
            </div>
          </div>

        </div>
      </div>

      <div class="panel-body">
        <table id="department" class="table table-hover tb-viaje">
          <thead>
            <tr class="dark">
              <th>NOMBRE</th>
              <th>IMAGEN DEL DEPARTAMENTO</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          @foreach($department as $depto)
          <tbody>
            <tr>
              <td>{{$depto->name}}</td>
              <td>

                @foreach($header as $head)
                @if($depto->code==$head->header_department and $head->active_head == 1)
                @foreach($head->multi as $multi)
                <a href="https://img1.mtmedia.com.mx/deptos{{$multi->name}}" target="_blank"><img src="https://img1.mtmedia.com.mx/deptos/{{$multi->name}}" alt="panoramica" width="250px"></a>
                @endforeach
                @break
                @endif
                @endforeach
              </td>
              <td width="30">
                @can('department.list')
                <a href="{{ route('department.list', $depto->code) }}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-pencil"></i>
                  editar imagenes de departamento
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