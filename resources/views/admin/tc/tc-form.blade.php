<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin - Tipo de cambio</title>
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


  input{
	font-family: 'Lato', sans-serif;
    font-weight: 700;
    width: 240px;
    border: none;
    font-size: 16px;
    padding: 10px 5px;
    color: #000;
   }

  #btn-send{
	font-family: 'Lato', sans-serif;
    font-weight: 700;
    width: 250px;
    background-color: #009e01;
    border: none;
    font-size: 16px;
    padding: 10px 0;
    color: #fff;
    display: inline-block;
   }

   .alert-success{
 	color: #FFF;
   }

  </style>
  </head>

  <body>

	@include('admin.tc.errors')

	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif

<br>

<div class="row">

	<!-- form
	<form name="form_tc" method="POST" action="https://www.megatravel.com.mx/admintc/sendtc">-->
	<form name="form_tc" method="POST" action="{{route('FormTC.send')}}">

	<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>

	<div>
		<!-- input -->
		<div>
	      <input type="number" step="any" class="form-control" name="date" id="date" value="" autocomplete="off">
	    </div>
	    <br>
		<!-- //input -->
	    <button type="submit" id="btn-send" class="btn">Enviar</button>
	    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>-->
	</div>

    </form>
    <!-- /form -->

</div>


<br>


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
