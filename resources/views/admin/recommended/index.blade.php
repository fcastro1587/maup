@extends('adminlte::layouts.app')
@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel panel-default">
        <div class="panel panel-body">
          <div class="panel-heading">
            <h4><i class="fa fa-filter"></i>DETALLE DE PAQUETE | RECOMENDADOS POR DESTINO</h4>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              @can('recommend.create')
              <a href="{{route('recommend.create')}}" class="btn-dark pull-left">
                <i class="fa fa-fw fa-plus"></i>crear
              </a>
              @endcan
            </div>
          </div>
        </div>
      </div>

      <div class="panel-body">
        <table id="recommend" class="table table-hover tb-viaje">
          <thead>
            <tr class="dark">
              <th>DEPARTAMENTO</th>
              <th>ESTADO</th>
              <th colspan="2">&nbsp;</th>
            </tr>
          </thead>
          @foreach($recom as $reco)
          <tbody>
            <tr>
              @if(empty($reco->bloqueo_mt))
              <td>
                <h5>REGULAR</h5>
                {{$reco->code_department}}
              </td>
              @endif

              @if(empty($reco->travel_mt))
              <td>
                <h5>BLOQUEO</h5>
                {{$reco->code_department}}
              </td>
              @endif

              <td>
                @if($reco->active_item == 1)
                <span class="label label-success">activo</span>
                @else
                <span class="label label-danger">inactivo</span>
                @endif
              </td>
              <td width="10">
                @can('recommend.edit')
                <a href="{{ route('recommend.edit', $reco->id) }}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-edit"></i>
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