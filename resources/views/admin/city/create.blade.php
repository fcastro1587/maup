@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel  panel-primary">
      <div class="panel-heading">
        <strong>Agregar una ciudad</strong>
      </div>
      <div class="panel-body">
        {!! Form::open(['route' => 'city.store']) !!}

        @section('citycreate')
        @foreach($country as $cou)
        <option value="{{$cou->code_iata}}">{{$cou->name_country}}</option>
        @endforeach
        @endsection
        @include('admin.city.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection