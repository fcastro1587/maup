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
<table>
  @foreach($filter as $fil)
  @if($fil->city==$citie->id && !empty($fil->name) && !empty($fil->city ))
  @foreach($fil->multi as $mul)
  <img src="http://mng.xbloq.com/manager/admin/images/deptos/{{$mul->name}}" width="100%">
  @endforeach
  @endif
  @endforeach

  <tr>
  <th class="th35">NOMBRE</th>
  <th class="th35">CIUDADES</th>
  <th class="th12">DÍAS</th>
  <th class="th12">DESDE</th>
  </tr>
  <tbody>
    @foreach($citie->travels as $city)
    <tr>
      <td><a href='http://mng.xbloq.com/admin/viaje/{{$city->id}}_{{$city->slug}}.html'>MT-{{$city->mt}} {{$city->name}}</a></td>
      <td>
      @foreach($city->cities as $ci )
      {{$ci->name}} -
      @endforeach
      </td>
      <td>{{$city->days}} Días</td>
      <td>{{$city->price_from}} {{$city->currency}}</td>
    </tr>
    @endforeach
  </tbody>


</table>
@endsection
