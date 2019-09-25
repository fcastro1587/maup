<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
  <style>
  body{
  background-color:#1c1b29;
  text-align:center;
  }
  #fondo{
  	background-image:url('https://tools.megatravel.com.mx/tc/tipo-de-cambioch.jpg');
  	background-repeat:no-repeat;
  	width:459px;
  	height:400px;
  	margin:0 auto;
  }
  #fecha_hoy{
  	font-family: 'Oswald', Arial, Helvetica, sans-serif;
  	font-style: normal;
  /*	letter-spacing: -2px;*/
  	font-size: 20px;
  	color:#435c6f;
  	width:459px;
  	height:100px;
  	padding-top: 85px;
  	margin:0 auto;
  	text-align:center;
  	text-transform: capitalize;
  }

  #tipo_cambio{
  	font-family: Arial;
  	font-style: normal;
  	font-weight:bold;
  	letter-spacing: -1px;
  	font-size: 45px;
  	color:#FFFFFF;
  	width:200px;
  	height:100px;
  	margin-top: -18px;
  	float: right;
  	text-align:center;
  	text-transform: uppercase;
  }
  </style>
  </head>
  <body>
  <div id="fondo">
  <div id="fecha_hoy">
  {{$fecha}}
  </div>
  <div id="tipo_cambio">
  @php
  $tipo = str_replace(",", ".", $tipo->tcambio);
  echo $tipo;
  @endphp
  </div>
  </div>
</body>
</html>
