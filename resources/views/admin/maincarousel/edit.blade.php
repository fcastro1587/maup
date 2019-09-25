@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <i class="fa fa-fw fa-edit"></i>
        <strong>Modificar imagenes para programa en carrusel</strong>
      </div>
      <div class="panel-body">
        {!! Form::model($home, ['route' => ['main.update', $home->id], 'method' => 'PUT']) !!}

        @section('editimg1')
        @foreach($multi as $mul1)
        @if($mul1->type == 8)
        <option value="{{ $mul1->id }}" data-image="{{ asset('https://img1.mtmedia.com.mx/slider-home').'/'.$mul1->name }}" @if($home->multimedia_id_1 == $mul1->id) selected @endif>
          {{$mul1->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @section('editimg2')
        @foreach($multi as $mul2)
        @if($mul2->type == 9)
        <option value="{{ $mul2->id }}" data-image="{{ asset('https://img1.mtmedia.com.mx/slider-home').'/'.$mul2->name }}" @if($home->multimedia_id_2 == $mul2->id) selected @endif>
          {{$mul2->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @section('editimg3')
        @foreach($multi as $mul3)
        @if($mul3->type == 10)
        <option value="{{ $mul3->id }}" data-image="{{ asset('https://img1.mtmedia.com.mx/slider-home/320x340').'/'.$mul3->name }}" @if($home->multimedia_id_3 == $mul3->id) selected @endif>
          {{$mul3->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @section('mainedit')
        <select class="form-control" name="active_item">
          <option value="1" @if($home->active_item ==1) selected @endif> SI</option>
          <option value="0" @if($home->active_item ==0) selected @endif> NO</option>
        </select>
        @endsection

        @include('admin.maincarousel.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection