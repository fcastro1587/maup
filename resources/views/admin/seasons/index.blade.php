@extends('adminlte::layouts.app')

@section('main-content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel panel-default">
          <div class="panel panel-body">
            <div class="panel-heading">
              <h4><i class="fa fa-filter"></i>TEMPORADAS</h4>
            </div>

          </div>
        </div>

        <div class="panel-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr class="bg-primary">
                <th>NOMBRE</th>
                <th colspan="2">&nbsp;</th>
              </tr>
            </thead>
            @foreach($seasons as $seas)
            <tbody>
              <tr>
                <td>{{$seas->name}}</td>
                <td width="10"><a href="{{ route('seasons.vie', $seas->code_season) }}" class="btn btn-sm btn-info"><i class="fa fa-fw fa-eye"></i>ver</a></td>
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
