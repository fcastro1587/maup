@extends('adminlte::layouts.app')

@section('main-content')
<style>
  .inner img {
    display: block;
    margin: auto;
  }
  .inner p{
    font-size: 15px;
    padding-top: 5px;
    text-align: center;
    font-weight: bold;
  }
  .inner span{
    font-size: 13px;
    display: block;
  }
</style>


<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <h4>SELECCIONAR EL TIPO DE IMAGEN A CARGAR</h4>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <img src="https://img1.mtmedia.com.mx/covers/ronda-iberica.jpg" width="82%" alt="">
        <p>
        Detalle y Mosaico
        <span>844x474</span>
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      @can('file.create')
      @php $var = 1; @endphp
      <a href="{{route('file.createfile', $var)}}" class="small-box-footer">Crear <i class="fa fa-arrow-circle-right"></i></a>
      @endcan
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <img src="https://img1.mtmedia.com.mx/deptos/viajes-a-canada.jpg" width="100%" alt="">
        <p>
        Panoramica por depto
        <span>1918x300</span>
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      @can('file.create')
      @php $var = 2; @endphp
      <a href="{{route('file.createfile', $var)}}" class="small-box-footer">Crear <i class="fa fa-arrow-circle-right"></i></a>
      @endcan
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <img src="https://img3.mtmedia.com.mx/promos/canada/novios-en-las-rocosas-vancouver-victoria.jpg" width="35%" alt="">
        <p>
        Destacado por depto
        <span>230x300</span>
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      @can('file.create')
      @php $var = 3; @endphp
      <a href="{{route('file.createfile', $var)}}" class="small-box-footer">Crear <i class="fa fa-arrow-circle-right"></i></a>
      @endcan
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <img src="https://img3.mtmedia.com.mx/home/megaofertas/3.jpg" width="43%" alt="">
        <p>
        Mega Ofertas
        <span>256x278</span>
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      @can('file.create')
      @php $var = 4; @endphp
      <a href="{{route('files.createupload', $var)}}" class="small-box-footer">Crear <i class="fa fa-arrow-circle-right"></i></a>
      @endcan
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <img src="https://img3.mtmedia.com.mx/home/otono-invierno/escapada-invernal.jpg" width="94%" alt="">
        <p>
        Temporada Otoño Invierno
        <span>256x278</span>
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      @can('file.create')
      @php $var = 5; @endphp
      <a href="{{route('file.createfile', $var)}}" class="small-box-footer">Crear <i class="fa fa-arrow-circle-right"></i></a>
      @endcan
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <img src="https://img3.mtmedia.com.mx/home/bloqueo/mega-millennials-17-dias-de-invierno.jpg" width="43%" alt="">
        <p>
        Bloqueos
        <span>291x384</span>
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      @can('file.create')
      @php $var = 6; @endphp
      <a href="{{route('file.createfile', $var)}}" class="small-box-footer">Crear <i class="fa fa-arrow-circle-right"></i></a>
      @endcan
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <img src="https://img3.mtmedia.com.mx/home/favoritos/magia_europea.jpg" width="43%" alt="">
        <p>
        Favoritos
        <span>291x384</span>
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      @can('file.create')
      @php $var = 12; @endphp
      <a href="{{route('file.createfile', $var)}}" class="small-box-footer">Crear <i class="fa fa-arrow-circle-right"></i></a>
      @endcan
    </div>
  </div>
 <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <img src="https://img3.mtmedia.com.mx/banner-depto/usa/banner-san-fco-v.jpg" width="49%" alt="">
        <p>
        Banner listado
        <span>por depto</span>
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      @can('file.create')
      @php $var = 7; @endphp
      <a href="{{route('files.createupload', $var)}}" class="small-box-footer">Crear <i class="fa fa-arrow-circle-right"></i></a>
      @endcan
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <img src="https://img1.mtmedia.com.mx/slider-home/magia-europea.jpg" width="100%" alt="">
        <p>
        Slider Principal
        <span>1700x566</span>
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      @can('file.create')
      @php $var = 8; @endphp
      <a href="{{route('files.createupload', $var)}}" class="small-box-footer">Crear <i class="fa fa-arrow-circle-right"></i></a>
      @endcan
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <img src="https://img2.mtmedia.com.mx/recommend/europa.jpg" width="71%" alt="">
        <p>
        Recomendado en MT
        <span>324x152</span>
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      @can('file.create')
      @php $var = 11; @endphp
      <a href="{{route('files.createupload', $var)}}" class="small-box-footer">Crear <i class="fa fa-arrow-circle-right"></i></a>
      @endcan
    </div>
  </div>

  @endsection