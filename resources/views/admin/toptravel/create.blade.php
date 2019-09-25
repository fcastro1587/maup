@extends('adminlte::layouts.app')

@section('main-content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel  panel-primary">
        <div class="panel-heading">
          <strong>Agregar un programa especial</strong>
        </div>
        <div class="panel-body">
          {!! Form::open(['route' => 'toptravels.store']) !!}

          @section('mtcreate')
          @foreach($viaje as $vi)
          <option value="{{$vi->mt}}">{{$vi->mt}}</option>
          @endforeach
          @endsection

          @section('deptocreate')
          @foreach($department as $depto)
          <option value="{{$depto->code}}">{{$depto->name}}</option>
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
