@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel  panel-primary">
      <div class="panel-heading">
        <strong>Agregar un tipo de Habitación</strong>
      </div>
      <div class="panel-body">
        {!! Form::open(['route' => 'rooms.store']) !!}

        @include('admin.rooms.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection