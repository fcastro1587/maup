@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel  panel-primary">
      <div class="panel-heading">
        <strong>Agregar un programa al home</strong>
      </div>
      <div class="panel-body">
        {!! Form::open(['route' => 'main.store']) !!}

        @section('createimg1')
        @foreach($multi as $mul1)
        @if($mul1->type == 8)
        <option value="{{ $mul1->id }}" data-image="{{ asset('https://img1.mtmedia.com.mx/slider-home').'/'.$mul1->name }}">
          {{$mul1->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @section('createimg2')
        @foreach($multi as $mul2)
        @if($mul2->type == 9)
        <option value="{{ $mul2->id }}" data-image="{{ asset('https://img1.mtmedia.com.mx/slider-home').'/'.$mul2->name }}">
          {{$mul2->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @section('createimg3')
        @foreach($multi as $mul3)
        @if($mul3->type == 10)
        <option value="{{ $mul3->id }}" data-image="{{ asset('https://img1.mtmedia.com.mx/slider-home/320x340').'/'.$mul3->name }}">
          {{$mul3->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @section('maincreate')
        <select class="form-control" name="active_item">
          <option value="1"> SI</option>
          <option value="0"> NO</option>
        </select>
        @endsection

        @include('admin.maincarousel.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection