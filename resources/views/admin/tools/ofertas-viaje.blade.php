

<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1">

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Coustard:400,900|Roboto:400,700|Roboto+Slab:400,700,300,100|Great+Vibes" />

<!-- Jquery UI -->
<link href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />

<style type="text/css">
body {
	font-family: @php echo $fontFamily; @endphp;
	margin: 0px;
	padding: 0px;
	<?php if ( $fontFamily == "'Coustard', serif" ){ ?>
		  font-weight:400;
	<?php } ?>
}

#cont_of{
	width: auto;
    display: block;
    margin: 0 auto;
    text-align: center;
}

.Item{
	width:250px;
	height:320px;
	margin:5px;
	font-size:14px;
	display:inline-block;
	vertical-align:top;
    text-align: left;
	border:1px solid #E4E4E4;
	background-color:#@php echo $itemBack; @endphp;
}

.Item a { color:#@php echo $txtColor; @endphp; text-decoration:none; }

.Item:hover{background-color:#@php echo $itemHov; @endphp;}
.Item a:hover{color:#@php echo $txtColorHov; @endphp;}


.ImPaquete{
	width:250px;
	height:170px;
	padding:0 !important;
	display:block;
	overflow: hidden;
}

.ImPaquete img{
	width:100%;
}

.Item .DPaquete{
		width:auto;
		height: 138px;
	    overflow: hidden;
		box-sizing: border-box;
 		padding:5px 10px;
		line-height:136%;
}

.Item h3{
	width:100%;
	margin: 8px 0;
	color:#<?=$lblTPaq?>;
}

.Item h3:hover{ color:#@php echo $lblTPaqHov; @endphp; }


.cont_filtros_barra{
	width: 70%;
    height: auto;
    margin: 10px auto;
    padding: 10px;
    text-align: center;
    /*border: dashed 1px #B4B4B4;*/
    display: block;
}

#btn_filtros{
	width:160px;
	font-weight:bold;
	text-decoration:none;
	padding:12px 0;
	margin:15px auto;
	color:#FFFFFF;
	cursor:pointer;
	background-color:#00b3ff;
	-webkit-box-shadow: 3px 3px 3px -1px rgba(0,0,0,0.59);
	-moz-box-shadow: 3px 3px 3px -1px rgba(0,0,0,0.59);
	box-shadow: 3px 3px 3px -1px rgba(0,0,0,0.59);
	display:none;
}

#btn_filtros:hover{
	/*background-color:#2c3e50;*/
	background-color:#00b3ff;
}
/*#btn_filtros:visited:after {
 	content: " (YA VISITADO)";
	background-color:#00b3ff;
}*/


#show_filtros{display:inline-block; width:100%;}
.dblock{ display:inline-block !important;}

.filtros {
	width:auto;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
	font-weight:bold;
	color:#<?=$lblTRange?>;
	margin:10px;
	display:inline-block;
	vertical-align: middle;
}

.etiqueta_rango{
	width:80%;
	border:0;
	color: #@php echo $lblNumRange; @endphp;
	font-weight:bold;
	font-size:15px;
	margin:5px auto;
	text-align:center;
	background-color:transparent;
}

.barra_filtro{
	width:120px;
	text-align: center;
	margin:0 auto;
	padding:0;
	touch-action: manipulation !important;
	/*background-color:#DB9E9F;*/
}


#filtro_destinos select{
	width: 240px;
    height: 41px;
    padding: 0 0 0 10px;
    font-size: 15px;
    font-weight: bold;
    color: #000000;
    border: solid 1px #C0C0C0;
    background-image: url(https://www.tools.megatravel.com.mx/puntos-de-venta/icono-list.jpg);
    background-position: bottom right;
    background-repeat: no-repeat;
    -moz-appearance: none;
    -webkit-appearance: none;
}

/*Por debajo de 1050px yellow2*/
@media screen and (max-width: 1050px){
}

/*Por debajo de 768px green*/
@media only screen and (max-width: 768px){

.cont_filtros_barra{
	width: 100%;  padding: 10px 5px;
}
#btn_filtros{ display: block; }
#show_filtros{ display:none; }

#filtro_destinos select{ width: 200px;}

}


@media only screen and (max-width: 300px){

	.cont_filtros_barra{ width: 100%;  padding: 10px 0; }

	.filtros { width:100%; margin:10px 0; }

	#filtro_destinos select{
	width: 100%;
	font-size: 12px;
    font-weight: bold;
	}
	.Item{ width:90%; height:auto; }
	.ImPaquete{ width:100%; height:auto; }
}
</style>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>
<!--<script src="https://raw.githubusercontent.com/furf/jquery-ui-touch-punch/master/jquery.ui.touch-punch.min.js"></script>-->



<script>

$(function() {

//$('.widget').draggable();


	$("#input_destino").change(function(){

	 var input_destino = this.value;

	 location.href="ofertas-viaje.php?Dest="+input_destino+"&txtColor={{$txtColor}}&lblTPaq={{$lblTPaq}}&lblTRange={{$lblTRange}}&lblNumRange={{$lblNumRange}}&ItemBack={{$itemBack}}&ItemHov={{$itemHov}}&txtColorHov={{$txtColorHov}}&ff={{$fontId}}";
	 //location.href="ofertas-viaje.php?Dest="+input_destino;
	});

$("#btn_filtros").click(function(){
	$("#show_filtros").toggleClass("dblock");
});


});




</script>

<script type="text/javascript">

</script>

<script>

/*----------------inicia funcion barra que filtra por precio-----------------------*/
var  $min_duration = @php echo $minDias; @endphp;
var $max_duration = @php echo $maxDias; @endphp;
var $min_price 	  = @php echo $minFare; @endphp;
var $max_price 	  = @php echo $maxFare; @endphp;

$(function() {
		function showProducts(minPrice, maxPrice) {
			//$("tbody tr").hide().filter(function() {
			$(".Item").hide().filter(function() {
			var price = parseInt($(this).data("price"), 10);
			return price >= minPrice && price <= maxPrice;
			}).show();
		}

    var options = {
        range: true,
        min: $min_price,
        max: $max_price,
        values: [$min_price, $max_price],
        slide: function(event, ui) {
            var min = ui.values[0],
                max = ui.values[1];

            $("#amount").val("$" + min + " - $" + max);
            showProducts(min, max);
        }
    }, min, max;

    $("#slider-range").slider(options);

    min = $("#slider-range").slider("values", 0);
    max = $("#slider-range").slider("values", 1);

    $("#amount").val("$" + min + " - $" + max);
    showProducts(min, max);
});
/*----------------termina funcion barra que filtra por precio-----------------------*/
/*----------------inicia funcion barra que filtra por dias-----------------------*/

$(function() {

   function showProducts(minDuration, maxDuration) {
    $(".Item").hide().filter(function() {
        var duration = parseInt($(this).data("duration"), 10);
        return duration >= minDuration && duration <= maxDuration;
    }).show();
   }

    var options = {
        range: true,
        min: $min_duration,
        max: $max_duration,
        values: [$min_duration, $max_duration],
        slide: function(event, ui) {
            var min = ui.values[0],
                max = ui.values[1];

            $("#amount2").val(min + " días - " + max + " días");
            showProducts(min, max);
        }
    }, min, max;

    $("#slider-range2").slider(options);

    min = $("#slider-range2").slider("values", 0);
    max = $("#slider-range2").slider("values", 1);

    $("#amount2").val(min + " días - " + max + " días");

    showProducts(min, max);
});
/*----------------termina funcion barra que filtra por dias-----------------------*/



</script>


<title>MC - @php #$lblDest @endphp</title>
</head>
<body>

  <div id="cont_of">
  <!--Barra filtro-->
  <div class="cont_filtros_barra">

  <a id="btn_filtros">Filtrar Resultados</a>

  <!--show filtros-->
  <div id="show_filtros">
      <!-- filtro rango de precio-->
      <div class="filtros">
        Filtrar por tarifa:
        <div>
        <input type="text" id="amount" class="etiqueta_rango"/>
        <div id="slider-range" class="barra_filtro widget" style="	touch-action: manipulation !important;">
        </div>
        </div>
      </div>

      <!-- filtro rango de días-->
      <div class="filtros">
        Filtrar por duración:
        <div>
        <input type="text" id="amount2" class="etiqueta_rango" />
        <div id="slider-range2" class="barra_filtro widget">
        </div>
        </div>
      </div>

      <!-- filtro rango de días-->
      <div class="filtros">
            <form name="filtro_destinos" id="filtro_destinos" action="{{  route('Ofertasblq.Ofertasblq') }}" method="post">
          <select name="destino" class="required" id="input_destino" required >
                            <option value="" selected="selected">Filtrar por destino:</option>
                            <option value="">Todos</option>
                            <option value="1">Europa</option>
                            <option value="2">Medio Oriente</option>
                            <option value="3">Canadá</option>
                            <option value="4">Asia</option>
                            <option value="5">África</option>
                            <option value="6">Pacífico</option>
                            <option value="7">Sudamérica</option>
                            <option value="8">Estados Unidos</option>
                            <option value="9">Centroamérica</option>
                            <option value="10">Cuba y Caribe</option>
                            <option value="11">México</option>
                            <option value="13">Cruceros</option>
          </select>
        </form>
     </div>
  </div><!--show filtros-->
</div>
<!--fin barra filtro-->

<!-- VISTA OFERTAS -->
@foreach($ofertasblq as $blq)

<div data-price='{{$blq['price_from']}}' data-duration='{{$blq['days']}}' class='Item'>


  <div class='ImPaquete'>
  @foreach($blq['image'] as $image)
    {!! $image !!}
  @endforeach
  </div>
  <a href="https://www.megatravel.com.mx/tools/circuito.php?domi={{$Dominio}}&domiviaja={{$Dominioviaja}}&viaje={{$blq['mt']}}&txtColor={{$txtColor}}&thBG={{$thBG}}&thTxColor={{$thTxColor}}&ff={{$fontId}}">
  <div class='DPaquete'>
  <h3 class='NPaquete'>MT- {{$blq['mt']}}  {{$blq['name']}}</h3>
  Viaje de {{$blq['days']}} Días y {{$blq['nights']}} Noches<br/>
  <strong>Desde ${{$blq['price_from']}} <small>{{$blq['currency']}}</small> + ${{$blq['taxes']}} <small>IMP</small></strong><br/>
  Visitando {{$blq['cities']}}
  </div>
  </a>

  </div>
@endforeach
  </div>


  </body>
  </html>
