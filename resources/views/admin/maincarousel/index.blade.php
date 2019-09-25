@extends('adminlte::layouts.app')
@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel panel-default">
        <div class="panel panel-body">
          <div class="panel-heading">
            <h4><i class="fa fa-filter"></i>IMAGENES PARA CARRUSEL DE HOME</h4>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              @can('main.create')
              <a href="{{route('main.create')}}" class="btn-dark pull-left">
                <i class="fa fa-fw fa-plus"></i>crear
              </a>
              @endcan
            </div>
          </div>
        </div>
      </div>

      <div class="panel-body">
        <table id="main" class="table table-hover tb-viaje">
          <thead>
            <tr class="dark">
              <th>NOMBRE</th>
              <th>ORDEN</th>
              <th colspan="2">&nbsp;</th>
            </tr>
          </thead>
          @foreach($home as $main)
          <tbody>
            <tr>
              @if(empty($main->bloqueo_mt))
              @foreach($main->travels as $viaje)
              <td>
                <h5>REGULAR</h5>
                {{$viaje->mt}}-{{$viaje->name}}
              </td>
              @endforeach
              @endif

              @if(empty($main->travel_mt))
              <td>
                <h5>BLOQUEO</h5>
                {{$main->bloqueo_mt}}
              </td>
              @endif

              <td>
                {{$main->order_item}}
              </td>

              <td width="10">
                @can('main.edit')
                <a href="{{ route('main.edit', $main->id) }}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-edit"></i>
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