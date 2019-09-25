  @extends('adminlte::layouts.app')

  @section('main-content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel panel-default">
          <div class="panel panel-body">
            <div class="panel-heading">
              <h4><i class="fa fa-filter"></i>IMAGEN POR DEPARTAMENTO</h4>
            </div>

          </div>
        </div>

        <div class="panel-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr class="bg-primary">
                <th>IMAGEN DEL DEPARTAMENTO</th>
                <th>MT</th>
                <th>ESTADO</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            @foreach($header as $head)
            @if($department->code == $head->header_department)
            <tbody>
              <tr>
                <td>
                  @foreach($head->multi as $multi)

                  <a href="https://img1.mtmedia.com.mx/deptos/{{$multi->name}}" target="_blank">
                    <img src="https://img1.mtmedia.com.mx/deptos/{{$multi->name}}" alt="panoramica" width="500px">
                  </a>

                  @endforeach
                </td>

                <td>
                  @if(!empty($head->header_mt))
                  {{$head->header_mt}}
                  @endif

                  @if(!empty($head->bloqueo_mt))
                  {{$head->bloqueo_mt}}
                  @endif
                </td>

                <td>
                  @if($head->active_head ==1)
                  <span class="label label-success">Activo</span>
                  @else
                  <span class="label label-danger">Inactivo</span>
                  @endif
                </td>
                <td width="10"><a href="{{ route('department.edit', $head->id) }}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-pencil"></i>editar</a></td>
              </tr>
            </tbody>
            @endif
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection