@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <i class="fa fa-fw fa-edit"></i>
        <strong>Modificar Usuarios</strong>
      </div>
      <div class="panel-body">
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}

        @include('admin.users.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection