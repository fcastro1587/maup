@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel  panel-primary">
      <div class="panel-heading">
        <strong>Agregar visa</strong>
      </div>
      <div class="panel-body">
        {!! Form::open(['route' => 'visas.store']) !!}

        @section('citycreate')
        @foreach($country as $co)
        <option value="{{$co->code_iata}}">{{$co->name_country}}</option>
        @endforeach
        @endsection

        @include('admin.visas.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection