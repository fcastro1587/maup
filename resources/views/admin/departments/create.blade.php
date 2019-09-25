@extends('adminlte::layouts.app')


@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <strong>Agregar Programa</strong>
      </div>
      <div class="panel-body">
        {!! Form::open(['route' => 'department.store']) !!}

        @section('createheader')
        <select class="form-control" name="header_department">
          @foreach($deparment as $depto)
          <option value="{{$depto->code}}">{{$depto->name}}</option>
          @endforeach
        </select>
        @endsection

        @section('deptocreate')
        <select class="form-control" name="active_head">
          <option value="1"> SI</option>
          <option value="0"> NO</option>
        </select>
        @endsection

        @section('createdepto')
        @foreach($multi as $mul)
        @if($mul->type == 2)
        <option value="{{ $mul->id }}" data-image="{{ asset('https://img1.mtmedia.com.mx/deptos').'/'.$mul->name }}">
          {{$mul->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @include('admin.departments.partials.form')


        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection