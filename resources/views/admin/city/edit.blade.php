@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <i class="fa fa-fw fa-edit"></i>
        <strong>Modificar ciudades</strong>
      </div>
      <div class="panel-body">
        {!! Form::model($city, ['route' => ['city.update', $city->id], 'method' => 'PUT']) !!}

        @section('cityedit')
        @foreach($country as $cou)
        <option value="{{$cou->code_iata}}" @if($cou->code_iata== $city->country_code_iata) selected @endif>{{$cou->name_country}}</option>
        @endforeach
        @endsection
        @include('admin.city.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection