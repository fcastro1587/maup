@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel  panel-primary">
      <div class="panel-heading">
        <strong>Agregar un MT a el home</strong>
      </div>
      <div class="panel-body">
        {!! Form::open(['route' => 'carousel.store']) !!}

        @section('mtcreate')
        <select class="form-control" name="carousel_travel_mt">
          <option value=""></option>
          @foreach($viaje as $vi)
          <option value="{{$vi->mt}}">{{$vi->mt}}</option>
          @endforeach
        </select>
        @endsection

        @section('deptocreate')
        <select class="form-control" name="carousel_travel_code">
          @foreach($depto as $dep)
          <option value="{{$dep->code}}">{{$dep->name}}</option>
          @endforeach
        </select>
        @endsection

        @section('carouselcreate')
        <select class="form-control" name="active">
          <option value="1"> SI</option>
          <option value="0"> NO</option>
        </select>
        @endsection

        @section('multicreate')

        @foreach($multi as $mul)
        @if($mul->type==3 and $mul->title == $col)
        <option value="{{ $mul->id }}" data-image="{{ asset('https://img3.mtmedia.com.mx/promos').'/'.$col.'/'.$mul->name }}">
          {{$mul->name}}
        </option>
        @endif
        @endforeach

        @endsection

        @include('admin.carousel.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection