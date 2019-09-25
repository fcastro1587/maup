@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <i class="fa fa-fw fa-edit"></i>
        <strong>Modificar tipo de habitación</strong>
      </div>
      <div class="panel-body">
        {!! Form::model($ofer, ['route' => ['offers.update', $ofer->id], 'method' => 'PUT']) !!}

        @section('departedit')
        @foreach($depto as $dep)
        <option value="{{$dep->code}}" @if($ofer->department_code == $dep->code) selected @endif>{{$dep->name}}</option>
        @endforeach
        @endsection

        @include('admin.offers.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection