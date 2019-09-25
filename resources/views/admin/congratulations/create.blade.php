@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel  panel-primary">
      <div class="panel-heading">
        <strong>Agregar una Felicitación</strong>
      </div>
      <div class="panel-body">
        {!! Form::open(['route' => 'congratulations.store']) !!}

        @include('admin.congratulations.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection