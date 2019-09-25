@extends('adminlte::layouts.app')

@section('main-content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel  panel-primary">
        <div class="panel-heading">
          <strong>Agregar un filtro</strong>
        </div>
        <div class="panel-body">
          {!! Form::open(['route' => 'filters.store', 'files' => true]) !!}

          @section('department_create')
          @foreach($department as $depto)
          <option value="{{$depto->code}}">{{$depto->name}}</option>
          @endforeach
          @endsection

          @section('country_create')
          @foreach($country as $coun)
          <option value="{{$coun->code_iata}}">{{$coun->name_country}}</option>
          @endforeach
          @endsection

          @section('city_create')
          @foreach($city as $cit)
          <option value="{{$cit->id}}">{{$cit->name}}</option>
          @endforeach
          @endsection

          @section('file_create')
          @foreach($multi as $mul)
          @if($mul->type == 2)
          <option value="{{ $mul->id }}" data-image="{{ asset('https://img1.mtmedia.com.mx/deptos').'/'.$mul->name }}">
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
