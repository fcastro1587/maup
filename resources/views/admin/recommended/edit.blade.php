@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <i class="fa fa-fw fa-edit"></i>
        <strong>Modificar imagen de programa recomendado</strong>
      </div>
      <div class="panel-body">
        {!! Form::model($recom, ['route' => ['recommend.update', $recom->id], 'method' => 'PUT']) !!}

        @section('editimg1')
        @foreach($multi as $mul1)
        @if($mul1->type == 11)
        <option value="{{ $mul1->id }}" data-image="{{ asset('https://img2.mtmedia.com.mx/recommend').'/'.$mul1->name }}" @if($recom->multimedia_id_1 == $mul1->id) selected @endif>
          {{$mul1->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @section('recommendedit')
        <select class="form-control" name="active_item">
          <option value="1" @if($recom->active_item ==1) selected @endif> SI</option>
          <option value="0" @if($recom->active_item ==0) selected @endif> NO</option>
        </select>
        @endsection

        @include('admin.recommended.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection