@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <i class="fa fa-fw fa-edit"></i>
        <strong>Modificar Visa</strong>
      </div>
      <div class="panel-body">
        {!! Form::model($visas, ['route' => ['visas.update', $visas->id], 'method' => 'PUT']) !!}

        @section('cityedit')
        @foreach($country as $co)
        <option value="{{$co->code_iata}}" @if($co->code_iata==$visas->country_code) selected @endif>{{$co->name_country}}</option>
        @endforeach
        @endsection

        @include('admin.visas.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection