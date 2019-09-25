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
        {!! Form::model($carousel, ['route' => ['carousel.update', $carousel->id], 'method' => 'PUT']) !!}

        @section('mtedit')
        {{ Form::text('carousel_travel_mt', null, ['class' => 'form-control']) }}
        @endsection

        @section('deptoedit')
        {{Form::select('carousel_travel_code', $department, null, ['class' => 'form-control', 'placeholder'=>'Seleccionar Seccion' , 'id' => 'department']) }}
        @endsection

        @section('carouseledit')
        <select class="form-control" name="active">
          <option value="1" @if($carousel->active ==1) selected @endif> SI</option>
          <option value="0" @if($carousel->active ==0) selected @endif> NO</option>
        </select>
        @endsection

        @section('multiedit')
        @foreach($multi as $mul)
        @foreach($carousel->carouselmulti as $caro)
        @if($mul->type==3 and $mul->title == $carousel->carousel_travel_code)
        <option value="{{ $mul->id }}" data-image="{{ asset('https://img3.mtmedia.com.mx/promos').'/'.$carousel->carousel_travel_code.'/'.$mul->name }}" @if($mul->id == $carousel->multimedia_id) selected @endif>
          {{$mul->name}}
        </option>
        @endif
        @endforeach
        @endforeach
        @endsection

        @include('admin.carousel.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection