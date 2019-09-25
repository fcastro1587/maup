@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="panel  panel-primary">
      <div class="panel-heading">
        <strong>Agregar un MT a el home</strong>
      </div>
      <div class="panel-body">
        {!! Form::open(['route' => 'season_travel.store']) !!}

        @section('tempcreate')
        <select class="form-control" name="season_code_season">
          @foreach($season as $seas)
          <option value="{{$seas->code_season}}">{{$seas->name}}</option>
          @endforeach
        </select>
        @endsection

        @section('homecreate')
        <select class="form-control" name="home">
          <option value="">Seleccione</option>
          <option value="1">SI</option>
          <option value="0">NO</option>
        </select>
        @endsection

        @section('sectioncreate')
        <select class="form-control" name="section">
          <option value="">Seleccione</option>
          <option value="1">SI</option>
          <option value="0">NO</option>
        </select>
        @endsection

        @section('create_img1')
        @foreach($multi as $mul)
        @if($mul->type == 4 && $mul->title == 'megaofertas')
        <option value="{{ $mul->id }}" data-image="{{ asset('https://img3.mtmedia.com.mx/home/megaofertas').'/'.$mul->name }}">
          {{$mul->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @section('create_img2')
        @foreach($multi as $mul)
        @if($mul->type == 5 && $mul->title == 'otono-invierno')
        <option value="{{ $mul->id }}" data-image="{{ asset('https://img3.mtmedia.com.mx/home/otono-invierno').'/'.$mul->name }}">
          {{$mul->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @section('create_img3')
        @foreach($multi as $mul)
        @if($mul->type == 6 && $mul->title == 'bloqueo')
        <option value="{{ $mul->id }}" data-image="{{ asset('https://img3.mtmedia.com.mx/home/bloqueo').'/'.$mul->name }}">
          {{$mul->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @section('create_img4')
        @foreach($multi as $mul)
        @if($mul->type == 12 && $mul->title == 'favoritos')
        <option value="{{ $mul->id }}" data-image="{{ asset('https://img3.mtmedia.com.mx/home/favoritos').'/'.$mul->name }}">
          {{$mul->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @section('activecreate')
        <select class="form-control" name="active_item">
          <option value="">Seleccione</option>
          <option value="1"> SI</option>
          <option value="0"> NO</option>
        </select>
        @endsection

        @include('admin.seasontravels.partials.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection