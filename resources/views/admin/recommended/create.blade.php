@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel  panel-primary">
      <div class="panel-heading">
        <strong>Agregar un programa al home</strong>
      </div>
      <div class="panel-body">
        {!! Form::open(['route' => 'recommend.store']) !!}

        @section('createimg1')
        @foreach($multi as $mul1)
        @if($mul1->type == 11)
        <option value="{{ $mul1->id }}" data-image="{{ asset('https://img2.mtmedia.com.mx/recommend').'/'.$mul1->name }}">
          {{$mul1->name}}
        </option>
        @endif
        @endforeach
        @endsection


        @section('recommendcreate')
        <select class="form-control" name="active_item">
          <option value="1"> SI</option>
          <option value="0"> NO</option>
        </select>
        @endsection


        @include('admin.recommended.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection