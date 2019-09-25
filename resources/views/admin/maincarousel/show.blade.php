@extends('adminlte::layouts.app')
@section('main-content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel panel-default">
          <div class="panel panel-body">
            <div class="panel-heading">
              <h4><i class="fa fa-filter"></i>IMAGENES PARA CARRUSEL DE HOME</h4>
            </div>

          </div>
        </div>

        <div class="panel-body">
          @foreach($home as $main)

          @if(empty($main->bloqueo_mt))
          {{$main->travel_mt}}
          @endif

          @if(empty($main->travel_mt))
          {{$main->bloqueo_mt}}
          @endif

<br>

          @foreach($main->img1 as $mul1)
          @if($mul1->type==8)
          <img src="{{asset('images/slider-home/').'/'.$mul1->name}}" alt="" ><br>
          @endif
          @endforeach

          @foreach($main->img2 as $mul2)
          @if($mul2->type==9)
          <img src="{{asset('images/slider-home/').'/'.$mul2->name}}" alt="" ><br>
          @endif
          @endforeach

          @foreach($main->img3 as $mul3)
          @if($mul3->type==10)
          <img src="{{asset('images/slider-home/320x340/').'/'.$mul3->name}}" alt="" ><br>
          @endif
          @endforeach

          @endforeach
        </div>


      </div>
    </div>
  </div>
</div>
@endsection
