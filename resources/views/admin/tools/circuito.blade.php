<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MC - {{$viajem['name']}}</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" />
  </head>
  <style type="text/css">
  body {
  	font-family: @php echo $fontFamily; @endphp;
  	font-size: 14px;
  	color: #@php echo $txtColor; @endphp;
  	margin: 0px;
  	padding: 0px;
  	@php if ( $fontFamily == "'Coustard', serif" ){ @endphp
  		  font-weight:400;
  	@php } @endphp
  }
  #DetalleCircuito {
  	width:100%;
  	margin:0;
  	padding: 0;
  	height:auto;
  	display:block;
  }




  #Circuito{ width:100%; }

  /*MAPA*/
  #map { width: 45%; height: 500px; margin:70px 20px 40px 30px; display:block; float:right; }

  /*Por debajo de 768px green*/
  @media only screen and (max-width: 768px){

  /*MAPA*/
  #map { width: 100%; height: 150px; margin:0 auto; display:block; float:none; }

  }


  #DetalleCircuito p{
  	line-height:150%;
  	text-align:justify;
  }

  #DetalleCircuito h1 {
  	font-size:20px;
  	padding:0;
  	margin:0;
  }
  #img_paquete_mt{
  	width:100%;
  	max-width:290px;
  	float:right;
  	margin:0 0 20px 20px;
  }
  .titulo_desc_mt{
  	font-size:18px;
  	font-weight:bold;
  	margin:35px 0 10px 0;
  }
  th {
  	font-size: 14px;
  	font-weight: bold;
  	background-color: #@php echo $thBG; @endphp;
  	color: #@php echo $thTxColor; @endphp;
  }
  td {
  	font-size: 13px;
  	border-bottom-width: 1px;
  	border-bottom-style: solid;
  	border-bottom-color: #CCCCCC;
  }
  #imgboton{
      overflow: hidden;
  }
  #imgboton #bloque1{
      display: block;
      float: left;
  }
  #imgboton #bloque2{
     display: block;
     float: right;
  }
  #cotizaventa{
     display: none;
  }
  #cotizaventa input{
  	width: 80%;
      display: block;
      margin-bottom: 10px;
      height: 39px;
      border-radius: 5px;
      background: #fff;
      border: solid 1px rgba(0,0,0,.3);
      padding: 10px;
      box-sizing: border-box;
      -web-kit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      -o-box-sizing: border-box;
  }
  #cotizaventa textarea{
  	width: 95%;
      border-radius: 10px;
      border: solid 1px rgba(0,0,0,.4);
      margin-bottom: 10px;
      padding: 10px;
      box-sizing: border-box;
      -web-kit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      -o-box-sizing: border-box;
      height: 130px;
  }
  .cotizar{
      background: #0AB004;
      color: #fff;
      padding: 10px 0;
      border-radius: 10px;
      text-decoration: none;
      text-transform: capitalize;
      font-size: 15px;
      cursor: pointer;
      display: block;
      float: right;
      margin-bottom: 15px;
      width: 350px;
      text-align: center;
      font: 17px;
  }
  .cotizar:hover{
  	background: rgba(10,176,4,.8);
  }
  #cotizaventa #envia{
  	width: 150px;
  	cursor: pointer;
  }
  @media screen and (max-width: 768px){
  table{
  	width:100%;
  }
  #img_paquete_mt{
  	width:100%;
  	float:none;
  	margin:0 auto 20px auto;
  }

  }
  </style>

  <body>


@if(isset($viajem))
     <div id='DetalleCircuito'><h1>MT-{{$viajem['mt']}} {{$viajem['name']}}</h1>
     <p style='text-transform:capitalize;'><strong>Ciudades Visitadas:</strong>
    {!! $viajem['cities'] !!}


    </p>
    <div id='imgboton'><div id='bloque1'>
      @foreach($viajem['image'] as $image)
				{!! $image !!}
			@endforeach
    </div>
    <div id='bloque2'>
       @if(!empty($Dominio) && $Dominio == "travelpro" )
         <a class='cotizar' id='cotizar' >quiero cotizar</a>
         <form id='cotizaventa' action='http://travelpro.exodus.mx/send-out.php' method='post' >

           <input name='nombrePaquete' class='txtCotiza' type='text' value='MT - {{$viajem->mt}} - {{$viajem->name}}'>
           <input name='clv' class='txtCotiza' type='hidden' value='{{$viajem->mt}}'>

           <div class='cont'>
             <input name='nombres' class='txtCotiza2' type='text' placeholder='Nombres'>
           </div>

           <div class='contgroup'>
             <input name='telefono' class='txtCotiza2' type='text' placeholder='Telefono'>
           </div>

           <div class='contgroup'>
             <input name='email' class='txtCotiza2' type='email' placeholder='E-mail'>
           </div>

           <textarea name='comentarios' placeholder='Comentarios adicionales o requeriminetos especiales para su viaje'>
           </textarea>

           <input id='envia' type='submit' value='enviar'>
         </form>
       @endif

     @if(!empty($Dominioviaja) && $Dominioviaja == "exoudsvs.exodus.mx")
       <a class='cotizar' id='cotizar' >quiero cotizar</a>
       <form id='cotizaventa' action='http://www.agenciaviajabonito.com/send-out.php' method='post' >

         <input name='nombrePaquete' class='txtCotiza' type='text' value='MT - {{$viajem->mt}} -  {{$viajem->name}}'>
         <input name='clv' class='txtCotiza' type='hidden' value='$viajem->mt '>

         <input name='nombres' class='txtCotiza2' type='text' placeholder='Nombre Completo'>

         <input name='telefono' class='txtCotiza2' type='text' placeholder='Telefono'>

         <input name='email' class='txtCotiza2' type='email' placeholder='E-mail'>

         <textarea name='comentarios' placeholder='Comentarios adicionales o requeriminetos especiales para su viaje'>
         </textarea>
         <div class='g-recaptcha' data-sitekey='6LdU3CEUAAAAAA0TVpPm7JshPNZ1g1j_qx4pqU0q'></div>
         <input id='envia' type='submit' value='enviar'>

        </form>
        @endif


      </div>
      </div>

      <p><strong>Duración:</strong> {{$viajem['days']}} Días y {{$viajem['nights']}} Noches</p>
      <p><strong>Desde:</strong>{{$viajem['price_from']}} {{$viajem['currency']}}</p>
      <p><strong>Fecha(s) de salida:</strong>{!!$viajem['departure_date']!!}</p>
      <p><strong>Vigencia:</strong>{{$viajem['validity']}}</p>


      <div>
      <p><strong>Aerolinea</strong></p>
      {!! $viajem['airlines'] !!}
      </div>


      <div id='Circuito'>
      <div id='map'></div>
      <div class="titulo_desc_mt">Itinerario</div>
      <p>{!!nl2br($viajem['itinerary'])!!}<br><strong>...FIN DE NUESTROS SERVICIOS</strong>
      </p>
      </div>
      <div class='titulo_desc_mt'>Precios y Hoteles:</div>
      {!!$viajem['price_table']!!}<br><br><br>
      <div>{!!$viajem['hotels_table']!!}</div>
      <div class='titulo_desc_mt'>  El paquete incluye</div>
      {!!nl2br($viajem['include'])!!}
      <div class='titulo_desc_mt'>El paquete no incluye:</div>
      {!!nl2br($viajem['not_include'])!!}

       @if($viajem['currency']=="USD")
       <p>Precios cotizados en dólares americanos, pagaderos en Moneda Nacional al tipo de cambio del día
             Los precios indicados son informativos y deben ser conformados antes de su compra ya que están sujetos a cambio sin previo aviso. Para obtener el costo exacto a pagar a tipo de cambio del día, comuníquese con nosotros. Consulte impuestos y suplementos.
       </p>
      </div>;
      @endif

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
    <!-- Maps -->
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">
    $(document).ready(function(){

        $("#cotizar").click(function(){
            $("#cotizaventa").fadeToggle();
        });


@if( $viajem['type'] == "bloqueo" && is_array($viajem['array_cities'])   )
/*render map*/
$(function(){

//requires Map
@php
  $longsLats	 		= [];
  $ruta	 	 		    = [];
  $printMap 			= 1;
  $j 					    = 0;

  //foreach cities
  foreach( $viajem['array_cities'] as $city ){

    if ($j==0) {
      //definir punto inicial
      $puntoInicial	= "var map = L.map('map').setView([".$city['longitude']. ", "  .$city['latitude']." ], 5);";
      $llInicio 		= "[".$city['longitude']. ", "  .$city['latitude']." ]";
    }

    $j++;

    if ($j>0) {
      //Obtener Logitud y latitud de cada punto
      $longsLats[] 	= "[".$city['longitude'].", ".$city['latitude']."],";
      //Generar ruta pin  y pop-up
      $ruta[]			= "var marker= L.marker([" .$city['longitude'].", ".$city['latitude']."],{icon: IconTacha".$j."}).addTo(map).bindPopup(\"" .$j."- ".$city['name']. ", ".$city['name']."\");\n";
    }
  }//foreach cities

@endphp
//requires Map


//function construct Map
@php
if ($printMap != 0) {
@endphp
  //Coordenadas iniciales
  var map = L.map('map').setView( {{ $llInicio }}, 6);
  //imagen del mapa
  //Actual
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18
  }).addTo(map);

  //Propiedades del puntero de megatravel
  var propIcon = L.Icon.extend({
    options: {
        //shadowUrl: 'sombratachuela.png',
        iconSize:     [40, 40],
        //shadowSize:   [50, 64],
        iconAnchor:   [13, 37],
        //shadowAnchor: [4, 62],
        popupAnchor:  [2, -30]
      }
  });


  //Declaración de variable que va a contener liga de la imagen del puntero megatravel
  @php
  for ($flag=1; $flag<=30; $flag++) {
    echo "var IconTacha".$flag." = new propIcon({iconUrl: 'https://www.megatravel.com.mx/imagenes_mapas/puntero_mega".$flag.".png'});\n";
  }

  //Imprimir coordenadas de cada ciudad que se visista y globo
  foreach($ruta as $extrae_ruta){
    echo $extrae_ruta;
  }
  @endphp


  //*********Bloque que hace el trazo entre cada punto*****************
  var polygon = L.polygon([ @foreach($longsLats as $longsLats) {{$longsLats}} @endforeach ],{
    color: '#2ca1d7',
    //fillColor: 'none',
    fillColor: '#abd8ff',
    fillOpacity: 0.3
  }).addTo(map);
  polygon.bindPopup("Ruta del itinerario: MT-@php echo $viajem['mt'] . " " . $viajem['name']; @endphp");

  //*********Circulo que indica la primer Ciudad a visitar*****************
  var circle = L.circle( {{ $llInicio }}, 50000, {
      color: 'red',
      fillColor: '#abd8ff',
      fillOpacity: 0.4
    }).addTo(map);

    circle.bindPopup("Inicia el circuito");

@php
}
@endphp
//function construct Map
});
@endif


@if( $viajem['type'] == "regular" )
/*render map*/
$(function(){
	//requires Map
	@php
		$longsLats	 		= [];
		$ruta	 	 		    = [];
		$printMap 			= 1;
		$j 					    = 0;

		//foreach cities
		foreach( $viajem['array_cities'] as $city ){
			//foreach countries
			foreach($viajem['array_countries'] as $countri){
				if( $countri['code_iata'] == $city['country_code_iata'] ){
			        $country_city = $countri['name_country'];
			    }
			}//foreach countries

			if ($j==0) {
				//definir punto inicial
				$puntoInicial	= "var map = L.map('map').setView([".$city['longitude']. ", "  .$city['latitude']." ], 5);";
				$llInicio 		= "[".$city['longitude']. ", "  .$city['latitude']." ]";
			}
			$j++;
			if ($j>0) {
				//Obtener Logitud y latitud de cada punto
				$longsLats[] 	= "[".$city['longitude'].", ".$city['latitude']."],";

				//Generar ruta pin  y pop-up
				$ruta[]			= "var marker= L.marker([" .$city['longitude'].", ".$city['latitude']."],{icon: IconTacha".$j."}).addTo(map).bindPopup(\"" .$j."- ".$city['name']. ", ".$country_city."\");\n";
			}
		}//foreach cities
	@endphp
	//requires Map
	//function construct Map
	@php
	if ($printMap != 0) {
	@endphp

	//Coordenadas iniciales
		var map = L.map('map').setView( {{ $llInicio }}, 6);
		//imagen del mapa
		//Actual
		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 18
		}).addTo(map);

		//Propiedades del puntero de megatravel
		var propIcon = L.Icon.extend({
	    options: {
	        //shadowUrl: 'sombratachuela.png',
	        iconSize:     [40, 40],
	        //shadowSize:   [50, 64],
	        iconAnchor:   [13, 37],
	        //shadowAnchor: [4, 62],
	        popupAnchor:  [2, -30]
    	}
		});

		//Declaración de variable que va a contener liga de la imagen del puntero megatravel
		@php
		for ($flag=1; $flag<=30; $flag++) {
			echo "var IconTacha".$flag." = new propIcon({iconUrl: 'https://www.megatravel.com.mx/img/imagenes_mapas/puntero_mega".$flag.".png'});\n";
		}

		//Imprimir coordenadas de cada ciudad que se visista y globo
		foreach($ruta as $extrae_ruta){
			echo $extrae_ruta;
		}
		@endphp

		//*********Bloque que hace el trazo entre cada punto*****************
		var polygon = L.polygon([ @foreach($longsLats as $longsLats) {{$longsLats}} @endforeach ],{
			color: '#2ca1d7',
		    //fillColor: 'none',
			fillColor: '#abd8ff',
		    fillOpacity: 0.3
		}).addTo(map);

		polygon.bindPopup("Ruta del itinerario: MT-@php echo $viajem['mt'] . " " . $viajem['name']; @endphp");

		//*********Circulo que indica la primer Ciudad a visitar*****************
		var circle = L.circle( {{ $llInicio }}, 50000, {

		    color: 'red',
		    fillColor: '#abd8ff',
		    fillOpacity: 0.4
			}).addTo(map);

			circle.bindPopup("Inicia el circuito");
      @php
    	}
    	@endphp
    	//function construct Map
    });
    /* fin render map*/
    @endif
    });

</script>

@endif

  </body>
</html>
