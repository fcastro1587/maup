@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <i class="fa fa-fw fa-edit"></i>
        <strong>Modificar MT</strong>
      </div>
      <div class="panel-body">
        {!! Form::model($header, ['route' => ['department.update', $header->id],'method' => 'PUT', 'files' => true]) !!}

        @section('editheader')
        {{Form::select('header_department', $department, null, ['class' => 'form-control', 'placeholder'=>'Seleccionar Seccion' , 'id' => 'department']) }}
        @endsection

        @section('deptoedit')
        <select class="form-control" name="active_head">
          <option value="1" @if($header->active_head ==1) selected @endif> SI</option>
          <option value="0" @if($header->active_head ==0) selected @endif> NO</option>
        </select>
        @endsection

        @section('editdepto')
        @foreach($multi as $mul)
        @if($mul->type == 2)
        <option value="{{ $mul->id }}" data-image="{{ asset('https://img1.mtmedia.com.mx/deptos').'/'.$mul->name }}" @if($header->img == $mul->id) selected @endif>
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