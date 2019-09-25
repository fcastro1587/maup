@extends('adminlte::layouts.app')

@section('main-content')

<style media="screen">
  table{
      width: 100%;
      vertical-align: top;
      border: none;
      padding: 5px;
      border-collapse: separate;
      border-spacing: 0;
      background-color: #EBE6E1;
      border-radius: 3px;
      -moz-border-radius: 3px;
      -webkit-border-radius: 3px;
      background-color: #EAEAEA;
  }
  table th{
      background-color: #1E2D55;
      font-weight: bold;
      color: #FFF;
      font-size: 16px;
      text-transform: uppercase;
      padding: 10px;
  }
  table .th35{
     width: 35%;
  }
  table .th41{
     width: 41%;
  }
  table .th12{
     width: 12%;
  }
  table .th12{
     width: 12%;
  }
  table td{
    padding: 7px 5px;
    font-size: 15px;
    text-align: left;
  }
  table td a{
    color: #1E2D55;
    font-weight: bold;
    letter-spacing: -1px;
  }
</style>
<h1>PANORAMICAS DE LA SECCION</h1>
@foreach($department->headers as $head)
@foreach($department->travels  as $vi)
@if($head->header_mt == $vi->mt)
<img src="http://mng.xbloq.com/public/{{$head->img}}" width="100%">

{{$vi->mt}}<br>
{{$vi->name}}<br>
{{$vi->price_from}} {{$vi->currency}}<br>
{{$vi->days}} Días
{{$vi->nights}} Noches

@endif
@endforeach
@endforeach



<h1>CARRUSEL DE LA SECCION</h1>

@foreach($department->carousels as $carousel)
@foreach($department->travels as $vi)
@if($carousel->carousel_travel_mt == $vi->mt)

@foreach($vi->multimedia as $ima)
@if($ima->type==1)
<img src="{{asset('images/travels/').'/'.$ima->name}}" alt="" width="900" height="650">
@break
@endif
@endforeach

<br>
{{$vi->mt}}<br>
{{$vi->name}}<br>
{{$vi->price_from}} {{$vi->currency}}<br>
{{$vi->days}} Días
{{$vi->nights}} Noches
<br>
@endif
@endforeach
@endforeach

<h1>BANNER DE DESTINO</h1>
@foreach($department->banners as $baner)
{{$baner->days}} Días<br>
Desde {{$baner->price_from}}<br>
{{$baner->alt}}<br>
{{$baner->url}}<br>

@foreach($baner->multimedia1 as $multi1)
 {{$multi1->name}}
@endforeach
<br>
@foreach($baner->multimedia2 as $multi2)
 {{$multi2->name}}
@endforeach
<br>

@endforeach
<table >
  <thead>
    <th class="th35">NOMBRE DEL PROGRAMA</th>
    <th class="th41">CIUDADES</th>
    <th class="th12">DÍAS</th>
    <th class="th12">PRECIO</th>
  </thead>
  <tbody>
    @foreach($department->travels as $depto)
    <tr>
      <td><a href='http://mng.xbloq.com/admin/viaje/{{$depto->id}}_{{$depto->slug}}.html'>MT-{{$depto->mt}} {{$depto->name}}</a></td>
      <td>
      @foreach($depto->cities as $city )
      {{$city->name}} -
      @endforeach
      </td>
      <td>{{$depto->days}} Días</td>
      <td>{{$depto->price_from}} {{$depto->currency}}</td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection
