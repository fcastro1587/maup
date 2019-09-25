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
<h1>{{$season->name}}</h1>
<table>
  <tr>
    <th class="th35">NOMBRE DEL PROGRAMA</th>
    <th class="th41">CIUDADES</th>
    <th class="th12">DÍAS</th>
    <th class="th12">PRECIO</th>
  </tr>
  <tbody>
    @foreach($season->travels as $viaje)
    <tr>
      <td>MT-{{$viaje->mt}} {{$viaje->name}}</td>
      <td>
        @foreach($viaje->cities as $ci)
        {{$ci->name}} -
        @endforeach
      </td>
      <td>{{$viaje->days}} Días</td>
      <td>{{$viaje->price_from}} {{$viaje->currency}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
