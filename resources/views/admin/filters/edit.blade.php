@extends('adminlte::layouts.app')

@section('main-content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <i class="fa fa-fw fa-edit"></i>
          <strong>Modificar tipo de habitación</strong>
        </div>

        <div class="panel-body">
          {!! Form::model($filter, ['route' => ['filters.update', $filter->id], 'method' => 'PUT', 'files' => true]) !!}

          @section('country_edit')
          @foreach($country as $coun)
          <option value="{{$coun->code_iata}}" @if($coun->code_iata == $filter->name) selected @endif>{{$coun->name_country}}</option>
          @endforeach
          @endsection

          @section('city_edit')
          @foreach($city as $cit)
          <option value="{{$cit->id}}" @if($cit->id ==$filter->city) selected @endif>{{$cit->name}}</option>
          @endforeach
          @endsection

          @section('department_edit')
          @foreach($department as $depto)
          <option value="{{$depto->code}}" @if($depto->code == $filter->department) selected @endif>{{$depto->name}}</option>
          @endforeach
          @endsection

          @section('file_edit')
          @foreach($multi as $mul)
          @if($mul->type == 2)
          <option value="{{ $mul->id }}" data-image="{{ asset('https://img1.mtmedia.com.mx/deptos').'/'.$mul->name }}" @if($filter->multimedia_id_1 == $mul->id) selected @endif>
            {{$mul->name}}
          </option>
          @endif
          @endforeach
          @endsection

          @include('admin.filters.partials.form')

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
