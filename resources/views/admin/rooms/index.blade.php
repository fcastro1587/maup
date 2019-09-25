@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel panel-default">
        <div class="panel panel-body">
          <div class="panel-heading">
            <h4><i class="fa fa-fw fa-list-alt"></i>TIPOS DE HABITACIÓN</h4>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              @can('rooms.create')
              <a href="{{route('rooms.create')}}" class="btn-dark pull-left">
                <i class="fa fa-fw fa-plus"></i>
                crear
              </a>
              @endcan
            </div>
          </div>
        </div>
      </div>

      <div class="panel-body">
        <table id="rooms" class="table table-hover tb-viaje">
          <thead>
            <tr class="dark">
              <th>TIPO DE HABITACIÓN</th>
              <th colspan="2">&nbsp;</th>
            </tr>
          </thead>
          @foreach($rooms as $rom)
          <tbody>
            <tr>
              <td>{{$rom->name}}</td>

              <td width="10">
                @can('rooms.edit')
                <a href="{{ route('rooms.edit', $rom->id) }}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-pencil"></i>
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