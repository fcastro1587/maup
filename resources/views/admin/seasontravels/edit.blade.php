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
        {!! Form::model($seas, ['route' => ['season_travel.update', $seas->id], 'method' => 'PUT']) !!}


        @section('tempedit')
        <select class="form-control" name="season_code_season">
          @foreach($season as $sea)
          <option value="{{$sea->code_season}}" @if($seas->season_code_season == $sea->code_season) selected @endif>{{$sea->name}}</option>
          @endforeach
        </select>
        @endsection

        @section('homeedit')
        <select class="form-control" name="home">
          <option value="1" @if($seas->home ==1) selected @endif> SI</option>
          <option value="0" @if($seas->home ==0) selected @endif> NO</option>
        </select>
        @endsection

        @section('sectionedit')
        <select class="form-control" name="section">
          <option value="1" @if($seas->section ==1) selected @endif> SI</option>
          <option value="0" @if($seas->section ==0) selected @endif> NO</option>
        </select>
        @endsection

        @section('multi_img1')
        @foreach($multi as $mul)
        @if($mul->type == 4 && $mul->title== 'megaofertas' )
        <option value="{{ $mul->id }}" data-image="{{ asset('https://img3.mtmedia.com.mx/home/megaofertas').'/'.$mul->name }}" @if($seas->multimedia_id_1 == $mul->id) selected @endif>
          {{$mul->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @section('multi_img2')
        @foreach($multi as $mul)
        @if($mul->type == 5 && $mul->title== 'otono-invierno')
        <option value="{{ $mul->id }}" data-image="{{ asset('https://img3.mtmedia.com.mx/home/otono-invierno').'/'.$mul->name }}" @if($seas->multimedia_id_2 == $mul->id) selected @endif>
          {{$mul->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @section('multi_img3')
        @foreach($multi as $mul)
        @if($mul->type == 6 && $mul->title== 'bloqueo')
        <option value="{{ $mul->id }}" data-image="{{ asset('https://img3.mtmedia.com.mx/home/bloqueo').'/'.$mul->name }}" @if($seas->multimedia_id_3 == $mul->id) selected @endif>
          {{$mul->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @section('multi_img4')
        @foreach($multi as $mul)
        @if($mul->type == 12 && $mul->title== 'favoritos')
        <option value="{{ $mul->id }}" data-image="{{ asset('https://img3.mtmedia.com.mx/home/favoritos').'/'.$mul->name }}" @if($seas->multimedia_id_4 == $mul->id) selected @endif>
          {{$mul->name}}
        </option>
        @endif
        @endforeach
        @endsection

        @section('activeedit')
        <select class="form-control" name="active_item">
          <option value="1" @if($seas->active_item ==1) selected @endif> SI</option>
          <option value="0" @if($seas->active_item ==0) selected @endif> NO</option>
        </select>
        @endsection

        @include('admin.seasontravels.partials.form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection