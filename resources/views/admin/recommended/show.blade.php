@extends('adminlte::layouts.app')
@section('main-content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel panel-default">
          <div class="panel panel-body">
            <div class="panel-heading">
              <h4><i class="fa fa-filter"></i>Recommendados</h4>
            </div>

          </div>
        </div>

        <div class="panel-body">
          @foreach($recom as $reco)

          @if(empty($reco->bloqueo_mt))
          @foreach($reco->travels as $viaje)
          {{$viaje->mt}}
          <br>
          {{$viaje->department}}
          @endforeach
          @endif

          @if(empty($reco->travel_mt))
          {{$reco->bloqueo_mt}}
          <br>
          {{$reco->code_department}}
          @endif

          @foreach($reco->multimedia as $mul)
          @if($mul->type==11)
          <img src="{{asset('images/recommend/').'/'.$mul->name}}" alt="" ><br>
          @endif
          @endforeach

          @endforeach
        </div>


      </div>
    </div>
  </div>
</div>
@endsection
