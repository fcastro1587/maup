@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel  panel-primary">
      <div class="panel-heading">
        <strong>Agregar un programa especial</strong>
      </div>
      <div class="panel-body">
        {!! Form::open(['route' => 'offers.store']) !!}

        @section('departcreate')
        @foreach($depto as $dep)
        <option value="{{$dep->code}}">{{$dep->name}}</option>
        @endforeach
        @endsection

        @include('admin.offers.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection