@extends('adminlte::layouts.app')

@section('main-content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <i class="fa fa-fw fa-edit"></i>
          <strong>Modificar Top Ten</strong>
        </div>
        <div class="panel-body">
          {!! Form::model($top, ['route' => ['toptravels.update', $top->id], 'method' => 'PUT']) !!}


          @section('mtedit')
          @foreach($viaje as $vi)
          <option value="{{$vi->mt}}" @if($vi->mt==$top->top_travel_mt) selected @endif>{{$vi->mt}}</option>
          @endforeach
          @endsection

          @section('deptoedit')
          @foreach($department as $depto)
          <option value="{{$depto->code}}" @if($depto->code==$top->top_travel_code) selected @endif>{{$depto->name}}</option>
          @endforeach
          @endsection

          @include('admin.toptravel.partials.form')

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
