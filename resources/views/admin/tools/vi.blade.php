<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>MC - @if(isset($Dest)){!!$collection_depto!!} @endif</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Coustard:400,900|Roboto:400,700|Roboto+Slab:400,700,300,100|Great+Vibes" />
    <!-- Jquery UI -->
    </script>	<link href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <style type="text/css">
    body {
    	font-family: @php echo $fontFamily; @endphp;
    	color: #@php echo $txtColor; @endphp;
    	margin: 0px;
    	padding: 0px;
    	@php if ( $fontFamily == "'Coustard', serif" ){ @endphp
    		  font-weight:400;
    	@php } @endphp
    }
    body .city_iframe{
      display: none;
    }
    body table .city_iframe{
      display: initial;
    }
    label, legend {
    	font-family: Arial, Helvetica, sans-serif;
    	color: #@php echo $txtColor; @endphp;
    	font-size: 12px;
    	}
    #activa_filtros{
    	width:127px;
    	margin:20px auto 10px auto;
    	display:none;
    }
    .cont_filtros_barra{
    	width:20%;
    	height:auto;
    	margin:10px 5px 10px 20px;
    	padding:10px;
    	text-align:center;
    	/*background-color:#EFBE2E;*/
    	border: dashed 1px #B4B4B4;
    	display: block;
    	float:left;
    		@php if ( $Dest == 3 || $Dest == 8 ){ @endphp
    		  width:90%;
    		  float:none;
    		  margin:20px auto 5px auto;
    		@php } @endphp
    }
    .filtros {
    	font-family: Arial, Helvetica, sans-serif;
    	font-size: 12px;
    	width:auto;
    	margin:10px auto 10px auto;
    	/*background-color:#7FE7DF;*/
    	display:inline-block;"
    	}
    .etiqueta_rango{
    	width:80%;
    	border:0;
    	color: #<? echo $thBG; ?>;
    	font-weight:bold;
    	font-size:13px;
    	margin:5px auto;
    	text-align:center;
    	background-color:transparent;
    	/*background-color:#8CC2E9;*/
    }
    .barra_filtro{
    	width:120px;
    	text-align: center;
    	margin:0 auto;
    	padding:0;
    	/*background-color:#DB9E9F;*/
    }
    /*.ui-widget { font-size: 1em; }*/
    .cont_botones_check{
    	width:70%;
    	height:auto;
    	text-align:left;
    	margin:10px 20px 10px 5px;
    	padding:10px;
    	border: dashed 1px #B4B4B4;
    	display:block;
    	float: right;
    }
    .botones_check{
    	width:auto;
    	min-width:70px;
    	display: inline-block;
    	margin:5px;
    	text-align:left;
    	/*border:solid 1px #B4B4B4;*/
    }
    .botones_mostrar_filtros{
    	height:30px;
    	display:inline-block;
    	vertical-align: bottom;
    	margin:5px 5px 5px 5px
    }
    #table-rp{
    	width:100%;
    	border:none;
    	padding:5px 0;
    	margin:0;
    	border-collapse: separate;
    	border-spacing:0;
    }
    #table-rp th {
    	font-size: 15px;
    	letter-spacing:-1px;
    	font-weight: normal;
    	padding:0; margin:0;
    	/*border:solid 1px #C40003;*/
    	border:none;
    	background-color: #@php echo $thBG; @endphp;
    	color: #@php echo $thTxColor; @endphp;

    	@php if ( $fontFamily == "'Coustard', serif" ){ @endphp
    		  font-weight: normal;
    	@php } @endphp
    }
    #table-rp tr {
    	padding:0; margin:0;
    	border:none;
    }
    #table-rp td {
    	font-size: 13px;
    	border-bottom-width: 1px;
    	border-bottom-style: solid;
    	border-bottom-color: #CCCCCC;
    	padding:10px 5px;
    	text-align:center;
    }
    #table-rp a{ text-decoration:none;  }
    .nom_paquete{ text-align:left; padding:0 0 0 10px; }
    .ShortMsg {
    	font-size: 13px;
    	border-bottom-width: 1px;
    	border-bottom-style: solid;
    	border-bottom-color: #CCCCCC;
    	font-style: italic;
    	font-weight: bold;
    	text-align: right;
    	margin-right: 15px;
    	color: #@php echo $ahColor; @endphp;
    }
    tr.alt td {
      background-image: url('https://img2.mtmedia.com.mx/bg-td-mega-enlace.png');
    	background-repeat: repeat;
    }
    a {
    	color: #<? echo $aColor; ?>;
    	font-size: 13px;
    }
    a:hover {
    	color: #<? echo $ahColor; ?>;
    }
    #imageField {
    	padding-top: 0px;
    }
    /*Por debajo de 1050px yellow2*/
    @media screen and (max-width: 1050px){

    	.cont_filtros_barra{ width:25%;
    		@php if ( $Dest == 3 || $Dest == 8 ){ @endphp
    		  width:90%;
    		  float:none;
    		  margin:20px auto 5px auto;
    		@php } @endphp
    	}
    	.cont_botones_check{ width:60%; }
    }
    /*Por debajo de 768px green*/
    @media only screen and (max-width: 768px){
    	#ciudades{ display: none; }
    	#tit_ciudades_visitadas{ display: none; }

    #activa_filtros{
    	display: block;
    }
    .cont_filtros_barra{
    	width:90%;
    	padding:0;
    	margin:0 auto;
    	float:none;
    	display:none;
    }
    .filtros {
    	display:block;
    }
    .cont_botones_check{
    	float:none;
    	margin:10px auto 10px auto;
    	padding:0;
    	width:90%;
    	display:none;
    }
    .nom_paquete{ text-align:left; padding:0 0 0 0; }
    }
    </style>
  </head>

  <body>
    <!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-6575743-1', 'auto');  // Replace with your property ID.
ga('send', 'pageview');

</script>
<!-- End Google Analytics -->

    @if(isset($Dest))
    @if($Dest==3 || $Dest==8)
    <form>
    <fieldset>
    <legend>Mostrar los paquetes que incluyen:</legend>

    <a href="#" id="activa_filtros"><img src="https://img1.mtmedia.com.mx/bt-filtrar-resultados-mega-enlace.jpg" alt="Activar Filtros" /></a>
    <!--Barra filtro-->
    <div class="cont_filtros_barra">
    <!-- filtro rango de precio-->
    <div class="filtros">Buscar rango de precio:
        <div>
        <input type="text" id="amount" class="etiqueta_rango"/>
        <div id="slider-range" class="barra_filtro"></div>
        </div>
    </div>

    <!-- filtro rango de días-->
    <div class="filtros">Buscar rango de dias:
        <div>
        <input type="text" id="amount2" class="etiqueta_rango" />
        <div id="slider-range2" class="barra_filtro"></div>
        </div>
    </div>
    </div>
    <!--fin barra filtro-->

     </fieldset>
     </form>
    @endif<!--muestra los destinos en if-->

       @if(isset($Paises_Filtro))
       @php
       $Des= "Dest=".$Dest;
       @endphp
       <form action="{{  route('vi.vi', $Des) }}" method="post">
        {!! csrf_field() !!}

       <fieldset>
       <legend>Mostrar los paquetes que incluyen:</legend>

       <a href="#" id="activa_filtros"><img src="https://img1.mtmedia.com.mx/bt-filtrar-resultados-mega-enlace.jpg" alt="Activar Filtros" /></a>

       @if($Dest==1 || $Dest==2 || $Dest==7 || $Dest==9)
       <!--Barra filtro-->
       <div class="cont_filtros_barra">

       <!-- filtro rango de precio-->
       <div class="filtros">Buscar rango de precio:
          <div>
          <input type="text" id="amount" class="etiqueta_rango"/>
          <div id="slider-range" class="barra_filtro"></div>
          </div>
       </div>

       <!-- filtro rango de días-->
       <div class="filtros">Buscar rango de dias:
          <div>
          <input type="text" id="amount2" class="etiqueta_rango" />
          <div id="slider-range2" class="barra_filtro"></div>
          </div>
       </div>

       </div>
       <!--fin barra filtro-->

      <!-- botones checkbox -->
      <div class="cont_botones_check">
      @php
      if(empty($Country)) { $Country = Array(); }
      $k = 0;
    	foreach ($Paises_Filtro as $LabelCountry) {
    	echo "<div class='botones_check'><input type='checkbox' name='Country[]' value='".$LabelCountry."'";

    	if (in_array($LabelCountry, $Country)) { echo "checked"; }
    	echo "><label>".$Paises_Acento[$k] . "</label></div>";
    	$k++;
      }
      @endphp
      <br>
      <input type="image" name="imageField" id="imageField" src="https://img1.mtmedia.com.mx/bt-buscar-mega-enlace.jpg" class="botones_mostrar_filtros" />
      <input type="hidden" name="thBG" value="{{$thBG}}" />
      <input type="hidden" name="thTxColor" value="{{$thTxColor}}" />
      <input type="hidden" name="txtColor" value="{{$txtColor}}" />
      <input type="hidden" name="aColor" value="{{$aColor}}" />
      <input type="hidden" name="ahColor" value="{{$ahColor}}" />
      <input type="hidden" name="Dest" value="{{$Dest}}" />
      <input type="hidden" name="domi" value="{{$Dominio}}" />
      <input type="hidden" name="domiviaja" value="{{$Dominioviaja}}" />

      @php
      echo "<a href='vi.php?Dest=".$Dest."&txtColor=".$txtColor."&thBG=".$thBG."&thTxColor=".$thTxColor."&ff=".$fontId."&aColor=".$aColor."&ahColor=".$ahColor."' class='botones_mostrar_filtros'>
      <img src='https://img1.mtmedia.com.mx/bt-mostrar-todo-mega-enlace.jpg'/>
      </a>";
      @endphp
      </div>
      <!-- botones checkbox -->

      </fieldset>
      </form>
    @endif
    @endif
    @endif<!--valida que hay un Des-->

    @if(empty($Dest))
   <form action="{{  route('vi.vi') }}" method="post">
      {!! csrf_field() !!}
    <fieldset>
    <legend>Mostrar los paquetes que incluyen:</legend>

    @php
    $temporada = "SEM";
    $lmiel = "LMIEL";
    			echo "Semana Santa: <input type='checkbox' name='temporada' value='".$temporada."'>";
    			echo "&nbsp;&nbsp;";
         	echo "Luna de miel: <input type='checkbox' name='lmiel' value='".$lmiel."'>";
    @endphp

    <input type="hidden" name="thBG" value="{{$thBG}}" />
    <input type="hidden" name="thTxColor" value="{{$thTxColor}}" />
    <input type="hidden" name="txtColor" value="{{$txtColor}}" />
    <input type="hidden" name="aColor" value="{{$aColor}}" />
    <input type="hidden" name="ahColor" value="{{$ahColor}}" />
    <input type="hidden" name="Dest" value="{{$Dest}}" />
    <input type="hidden" name="domi" value="{{$Dominio}}" />
    <input type="hidden" name="domiviaja" value="{{$Dominioviaja}}" />

    <input type="image" name="imageField" id="imageField" src="https://img1.mtmedia.com.mx/bt-buscar-mega-enlace.jpg" />
    <br><a href='vi.php?Dest={{$Dest}}&txtColor={{$txtColor}}&thBG={{$thBG}}&thTxColor={{$thTxColor}}&ff={{$fontId}}&aColor={{$aColor}}&ahColor={{$ahColor}}' class='botones_mostrar_filtros'>Mostrar ofertas</a>
    </fieldset>
    </form>
    @endif

        <!--<a href="http://localhost:8000/tools/circuito.php?viaje=45124"><img src="{{asset('images/exodus/quinceaneras_europa2019.jpg')}}" width="100%"></a>-->
    <table id="table-rp" class="myTable">
    <thead>
    <tr>
    <th style="width:30%;">Paquete</th>
    <th style="width:auto">Duraci&oacute;n</th>
    <th style="width:30%;" id="tit_ciudades_visitadas">Ciudades Visitadas</th>
    <th style="width:auto;">Precio</th>
    </tr>
    <thead>
    <tbody>
    @foreach($collection_vi as $viaje)
    {!!$viaje!!}
    @endforeach
    </tbody>
    </table>

    @if($contador < 1)
    <p> Esta sección se encuentra en mantenimiento, vuelve pronto</p>
    @elseif($contador == 1)
    <p class='ShortMsg'> Se encontró 1 Circuito</p>
    @elseif($contador >= 2)
    <p class="ShortMsg">Se encontraron publicados {{$contador}} paquetes</p>
    @endif


    <script>
    $(function() {
      $(".myTable tr:even").addClass("alt");
    });
    </script>

    <script>
    @php
    // Activa filtros solo si el Dest es válido
    if(isset($Dest)){
    if( $Dest ==1 || $Dest ==2 || $Dest ==7 || $Dest ==9 || $Dest ==3 || $Dest ==8 ){
    @endphp

    /*----------------inicia funcion barra que filtra por precio-----------------------*/
    $(function() {
        function showProducts(minPrice, maxPrice) {
          $("tbody tr").hide().filter(function() {
          var price = parseInt($(this).data("price"), 10);
          return price >= minPrice && price <= maxPrice;
          }).show();
        }

        var options = {
            range: true,
            min: <?= $minFare ?>,
            max: <?= $maxFare ?>,
            values: [<?= $minFare ?>, <?= $maxFare ?>],
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
        $("tbody tr").hide().filter(function() {
            var duration = parseInt($(this).data("duration"), 10);
            return duration >= minDuration && duration <= maxDuration;
        }).show();
       }

        var options = {
            range: true,
            min: <?= $minDias ?>,
            max: <?= $maxDias ?>,
            values: [<?= $minDias ?>, <?= $maxDias ?>],
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
    @php }} @endphp

    $(function() {
        $("#activa_filtros").click(function() {
            $(".cont_filtros_barra").slideToggle('slow');
            $(".cont_botones_check").slideToggle('slow');
        });

    $(window).resize(function() {
        //pantalla escritorio
        var ventana_ancho = $(window).width();
        if ( ventana_ancho < 768 ){
          $(".cont_filtros_barra").css("display","none");
          $(".cont_botones_check").css("display","none");
        }

        if ( ventana_ancho > 768 ){
          $(".cont_filtros_barra").css("display","block");
          $(".cont_botones_check").css("display","block");
        }
    });
    });
    </script>
  </body>
</html>
