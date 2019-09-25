@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel  panel-primary">
      <div class="panel-heading">
        <strong>Agregar Tour</strong>
      </div>
      <div class="panel-body">
        {!! Form::open(['route' => 'tours.store']) !!}

        @section('deptocreate')
        {{Form::select('department', $department, null, ['class' => 'form-control', 'placeholder'=>'Seleccionar Seccion' , 'id' => 'department']) }}
        @endsection

        @include('admin.tours.partials.form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection