<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
    </title>
    <link href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<style media="print">
@page :left {
 margin-left: 0.5cm;
 margin-right: 0.5cm;
}
</style>
<style>
body{
    overflow-x: hidden;
    width: 900PX;
    display: block;
    margin:0 auto;
    font-family: 'Arimo', sans-serif;
    color: #000;
    font-size: 14px!important;
    line-height: 145%;
}
p{
    margin-top: 10px!important;
    margin-bottom: 10px!important;
    line-height: 145%!important;
    font-size: 14px!important;
}
#cont_dates_agency{
    text-align: left;
    width: 100%;
    display: block;
    /*overflow: hidden;*/
}
.blq_dates_agency{
    display: inline-block;
    vertical-align: middle;
    text-align: left;
    line-height: 145%;
}
#logo{
    max-width: 200px;
    width: 100%;
    padding-left: 15px;
    margin-bottom: -5px;
}
#logo img{
    max-width: 200px!important;
    width: 100%;
    display: block;
}
#dates{
    max-width: 350px;
    margin-left: 100px;
    font-size: 15px;
}
#cont_nom_dur {
    font-family: 'Arimo', sans-serif;
    width: 100%;
    display: block;
    vertical-align: middle;
    text-align: center;
    border-right: 1px solid #fff;
}
#nom {
    width: 100%;
    display: block;
    text-align: left;
    padding: 10px 0 0 0;
    margin: 0;
}
#nom small{
    font-weight: 700;
    font-size: 12px;
    display: block;
}
#nom h1 {
    font-weight: 700;
    font-size: 30px;
    margin: 0 0 3px 0;
    padding: 0;
}
.cont_img_paq{
  width:50%;
  display: inline-block;
  vertical-align: top;
  padding-right: 15px;
}
.img_paq{
  width:100%;
}
#fligths {
   text-align: left;
   padding: 0;
   margin: 0;
   width:43%;
   display: inline-block;
   vertical-align: top;
   padding-right: 15px;
}
#fligths h4 {
    font-family: 'Arimo', sans-serif;
    font-weight: 700;
    color: #353745;
    text-transform: uppercase;
    padding-left: 15px;
    line-height: 80%;
    margin-top: 26px;
    margin-bottom: 10px;
    font-size: 30px;
    border-left: solid 5px #2ca1d7;
}
#fligths img {
    width: 120px;
    margin-bottom: 0;
}
#psalidas{
    line-height: 130%!important;
}
#btn_cotization_travel2{
    display: none;
}
#cont_blq_inf_two_menu{
    text-align: left;
    width: 100%;
    max-width: 844px;
    margin: 26px auto 0 auto;
    display: none;
}
.blq_inf_two_menu {
    width: 32.5%;
    font-family: 'Arimo', sans-serif;
    font-weight: 700;
    font-size: 18px;
    margin-top: 0;
    margin-bottom: 0;
    display: inline-block;
    vertical-align: top;
    background-color: #d3d2d2;
}
.blq_inf_two_menu h5 {
    font-family: 'Arimo', sans-serif;
    font-weight: 700;
    font-size: 16px;
    margin-top: 0;
    margin-bottom: 0;
}
.card {
    border:none!important;
    text-align: center;
}
.card-body{
    width: 100%;
    font-family: 'Lato', sans-serif;
    font-weight: 400;
    color: #000;
    line-height: 145%;
    text-align: justify;
    border-left:none;
    display: inline-block;
    padding: 0;
}
#collapseItineray{
    padding-top: 0;
}
#collapseItineray p{
    padding-left: 0;
    margin-top: 20px;
    margin-bottom: 20;
}
#collapseItineray p strong {
    font-weight: 700;
    color: #25539b;
}
#collapseItineray h1,h2,h3,h5,h6{
    font-family: 'Arimo', sans-serif;
    font-weight: 700;
    display: block;
    color: #25539b;
    text-transform: uppercase;
    margin-top: 26px;
    margin-bottom: 20px;
    font-size: 20px;
}
#collapseItineray h4{
    font-family: 'Arimo', sans-serif;
    font-weight: 400;
    color: #353745;
    text-transform: uppercase;
    padding-left: 15px;
    line-height: 80%;
    margin-top: 26px;
    margin-bottom: 26px;
    font-size: 30px;
    border-left:solid 5px #2ca1d7;
}
#collapseIncludes {
    font-family: 'Arimo', sans-serif;
    color: #000000;
    margin-top: 0!important;
    margin-bottom: 0;
}
#collapseIncludes h4{
    font-family: 'Arimo', sans-serif;
    font-weight: 400;
    color: #353745;
    text-align: left;
    text-transform: uppercase;
    line-height: 80%;
    padding-left: 15px;
    margin-top: 26px;
    margin-bottom: 26px;
    font-size: 30px;
    border-left:solid 5px #2ca1d7;
}
#collapseIncludes ul {
    margin: 0;
    padding: 0;
}
#collapseIncludes ul li{
    /*list-style: circle;*/
    font-weight: 400;
    font-size: 14px;
    margin: 0 0 5px 20px;
    line-height: 130%;
}
#collapseFares {
    font-family: 'Arimo', sans-serif;
    color: #000000;
   margin-top: 0;
}
#collapseFares h4{
    font-family: 'Arimo', sans-serif;
    font-weight: 400;
    color: #353745;
    text-transform: uppercase;
    padding-left: 15px;
    line-height: 80%;
    margin-top: 26px;
    margin-bottom: 26px;
    font-size: 30px;
    border-left:solid 5px #2ca1d7;
}
#collapseFares table{
    font-family: 'Arimo', sans-serif;
    width: 100%!important;
    border: solid 1px #e8e8e8;
    font-size: 12px;
    font-weight: 400;
}
#collapseFares thead{
    font-size: 14px;
    font-weight: 700;
}
#collapseFares td{
    padding: 3px;
    line-height: 145%;
    border: solid 1px #dedede;
}
#collapseFares p{
    margin: 0;
    padding: 0;
}
#collapseFares tbody tr:hover {
    background-color: #E3F2FF;
}
#collapseFares td:nth-child(1n+2) {
    border-left: solid 1px #969696;
}
.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fAfAfA;
}
.table {
    margin-bottom: 0;
}
#collapseMap h4{
    font-family: 'Arimo', sans-serif;
    font-weight: 400;
    color: #353745;
    text-align: left;
    text-transform: uppercase;
    padding-left: 15px;
    line-height: 80%;
    margin-top: 100px;
    margin-bottom: 26px;
    font-size: 30px;
    border-left:solid 5px #2ca1d7;
}
#collapseAditionals{
    padding-top: 0;
}
#collapseAditionals strong{
    margin-top: 26px;
}
#collapseAditionals p {
    padding-left: 0;
    margin-top: 20px;
    margin-bottom: 20;
}
#collapseAditionals p strong {
    font-weight: 700;
    color: #25539b;
}
#collapseAditionals h1,h2,h3,h5,h6{
    font-family: 'Arimo', sans-serif;
    font-weight: 700;
    display: block;
    color: #25539b;
    text-transform: uppercase;
    margin-top: 26px;
    margin-bottom: 20px;
    font-size: 20px;
}
#collapseAditionals h4{
    font-family: 'Arimo', sans-serif;
    font-weight: 400;
    color: #353745;
    text-transform: uppercase;
    padding-left: 15px;
    line-height: 80%;
    margin-top: 26px;
    margin-bottom: 26px;
    font-size: 30px;
    border-left:solid 5px #2ca1d7;
}
#collapseVisas{
    padding-top: 0;
}
#collapseVisas strong{
    margin-top: 26px;
}
#collapseVisas p {
    padding-left: 0;
    margin-top: 20px;
    margin-bottom: 20;
}
#collapseVisas p strong {
    font-weight: 700;
    color: #25539b;
}
#collapseVisas h1,h2,h3,h5,h6{
    font-family: 'Arimo', sans-serif;
    font-weight: 700;
    display: block;
    color: #25539b;
    text-transform: uppercase;
    margin-top: 26px;
    margin-bottom: 20px;
    font-size: 20px;
}
#collapseVisas h4{
    font-family: 'Arimo', sans-serif;
    font-weight: 400;
    color: #353745;
    text-transform: uppercase;
    padding-left: 15px;
    line-height: 80%;
    margin-top: 100px;
    margin-bottom: 26px;
    font-size: 30px;
    border-left:solid 5px #2ca1d7;
}
</style>
</head>
<body>

<div class="container-fluid">
<!-- row -->
<div class="row">

  <div id='cont_dates_agency'>

    <div class='blq_dates_agency' id='logo'>
    
    @if(empty($logotipo))
    {{$Agency->agency->name}}
    @else
    {!!$logotipo!!}
    @endif
    </div>

  <div class='blq_dates_agency'  id='dates'>
  <strong>{{$Agency->agency->name}}</strong><br>
  {{$Agency->agency->billing_address}} Colonia: {{$Agency->agency->billing_colony}}<br>
  C.P.: {{$Agency->agency->billing_postal_code}} {{$Agency->agency->city->name}} {{$Agency->agency->state->name}}<br>
  <strong>Tel: </strong>{{ ($Agency->lada) }} {{$Agency->phone}} {{$Agency->fax}} {{$Agency->celphone}} {{$Agency->agency->social_facebook}} {{$Agency->agency->social_twitter}} {{$Agency->agency->skype}}<br>
  <strong>Mail: </strong>{{$Agency->email}}
  </div>

  <hr>

  </div>



  <div class="" id="">

    <div id="nom">
    <small>MT-{{ $collectionTravel['mt'] }}</small>
    <h1>{{$collectionTravel['name'] }}</h1>
    Viaje de {{ $collectionTravel['days'] }} días y {{ $collectionTravel['nights'] }} noches

    <p>
    Desde ${{ $collectionTravel['price_from']}} {{$collectionTravel['currency'] }} |
    {{$collectionTravel['room_type']}} + {{$collectionTravel['taxes']}} IMP
    <br>
    Viaje de México a {{ $collectionTravel['countries'] }}, visitando {{ $collectionTravel['cities'] }}
    <br>
    </p>

    @foreach( $collectionTravel['image'] as $img )
      {!! ($collectionTravel['image'][0]) !!}
    @endforeach

    <div id="fligths">
    @if ($collectionTravel['airlines'] != "" && $collectionTravel['airlines'] != "solo crucero")
      <strong>Incluye vuelo:</strong><br>
      {!! $collectionTravel['airlines'] !!}
    @elseif ($collectionTravel['airlines'] != "" && $collectionTravel['airlines'] == "solo crucero")
      <strong>Solo Crucero</strong>
    @endif

    {!! $collectionTravel['airlines_secun'] !!}

    <p id="psalidas">
        <strong>Salidas:</strong>{!!$collectionTravel['departure_date'] !!}
    </p>
    </div>

    </div>

    <hr>
    </div>
<!-- blq 2 -->


  <div id="accordion">

  <div class="card">
    <div id="collapseItineray" class="tapgral collapse tapshow">
      <div class="card-body">
        <h4 id="lnkItinerary"><strong>ITINERARIO</strong></h4>

        @php
        $format_itinerary = "";
        $format_itinerary = $collectionTravel['itinerary'];
        $search  = array('<br>','<h1>','<h2>','<h4>','<h5>','<h6>');
        $replace = array('','<h3>','<h3>','<h3>','<h3>','<h3>');
        $format_itinerary = str_ireplace($search, $replace, $format_itinerary);
        @endphp

        {!! $format_itinerary !!}

        <hr>
        <strong>Fín de nuestros servicios.</strong>
      </div>
    </div>
  </div>


  <div class="card">
    <div id="collapseFares" class="tapgral collapse tapshow">
      <div class="card-body">
        <h4 id="lnkFares"><strong>TARIFAS</strong></h4>
      @php
        $search   = array('background-color:#ffffff', 'background-color:white', 'width:80.0%');
        $replace  = array('');
        $TPrecios = str_ireplace($search, $replace, $collectionTravel['price_table']);
      @endphp
      <div class="table-responsive">
        {!! $TPrecios !!}
      </div>


    <h4><strong>HOTELES</strong></h4>
      @php
        $search   = array('background-color:#ffffff', 'background-color:white', 'width:80.0%');
        $replace  = array('');
        $THoteles = str_ireplace($search, $replace, $collectionTravel['hotels_table']);
      @endphp
        <div class="table-responsive">
          {!! $THoteles !!}
        </div>
      </div>
    </div>
  </div>


  <div class="card">
    <div id="collapseIncludes" class="tapgral collapse tapshow">
      <div class="card-body">
        <h4 id="lnkIncludes"><strong>EL VIAJE</strong> INCLUYE</h4>
        @php
            ##Convierte saltos de línea en listas
            function nl2li($str,$ordered = 0, $type = "1") {

            //check if its ordered or unordered list, set tag accordingly
            if ($ordered)
            {
             $tag="ol";
             //specify the type
             $tag_type="type=$type";
            }
            else
            {
             $tag="ul";
             //set $type as NULL
             $tag_type=NULL;
            }
            // add ul / ol tag
            // add tag type
            // add first list item starting tag
            // add last list item ending tag

            $str = "<$tag $tag_type><li>" . $str ."</li></$tag>";

            //replace /n with adding two tags
            // add previous list item ending tag
            // add next list item starting tag
            $str = str_replace("\n","</li>\n<li>",$str);

            //spit back the modified string
            return $str;
            }
        @endphp
          {!! nl2li($collectionTravel['include']) !!}
          <h4><strong>EL VIAJE</strong> NO INCLUYE</h4>
          {!! nl2li($collectionTravel['not_include']) !!}
      </div>
    </div>
  </div>


  <!-- OPTIONALS -->
  @if ( $collectionTravel['tours'] != ""  )
  <div class="card">
    <div id="collapseAditionals" class="tapgral collapse tapshow">
      <div class="card-body">
        <h4 id="lnkAditionals"><strong>TOURS</strong> OPCIONALES</h4>
    @php
    $format_aditionals = "";
    $format_aditionals = $collectionTravel['tours'];
    $search  = array('<br>','<h1>','<h2>','<h4>','<h5>','<h6>');
    $replace = array('','<h3>','<h3>','<h3>','<h3>','<h3>');
    $format_aditionals = str_ireplace($search, $replace, $format_aditionals);
    @endphp
    {!! $format_aditionals !!}
      </div>
    </div>
  </div>
  @endif


  <div class="card">
    <div id="collapseVisas" class="tapgral collapse tapshow">
      <div class="card-body">
        <br>
    <strong>POLÍTICAS DE CONTRATACIÓN Y CANCELACIÓN</strong>

    <!--<p>
      <a href="https://www.megatravel.com.mx/contrato/{{$collectionTravel['contrato_ad']}}" target="_blank">Contrato de adhesión</a>
    </p>-->

    <!--<p>
      {!! $collectionTravel['formas_pago'] !!}
   </p>-->


        <p>
      <strong>Precios indicados en {!! $collectionTravel['currency'] !!}, pagaderos en Moneda Nacional al tipo de cambio del día.<br>
      Los precios indicados en este sitio web, son de carácter informativo y deben ser confirmados para realizar su reservación ya que están sujetos a modificaciones sin previo aviso.</strong>
       </p>


        <p>
          <strong>{!! $collectionTravel['vigencia'] !!}</strong>
       </p>

      </div>
    </div>
  </div>



 @if ( $collectionTravel['destination'] == "viajes-canada" )
  <div class="card">
    <div id="collapseVisas" class="tapgral collapse tapshow">
      <div class="card-body">
        <br>
    <strong>LOS CIUDADANOS DE MÉXICO NECESITARÁN UNA ETA  PARA VIAJAR A CANADÁ O TRANSITAR POR VÍA AÉREA POR CANADÁ..</strong>
      <p>
        <ul>
        <li>Solo cuesta 7 CAN</li>
        <li>Esta electrónicamente vinculada al número de pasaporte introducido al solicitar una eTA, lo que significa que la persona debe viajar a Canadá con ese pasaporte.</li>
        <li>Tiene vigencia por 5 años o hasta que el pasaporte expire, lo que suceda primero.</li>
        <li>Permite entradas múltiples a Canadá.</li>
        </ul>
      </p>

    <strong>¿Quién necesita una eTA?</strong>
       <p>
      Los ciudadanos de países que no requieren visa para entrar a Canadá, con excepción de los ciudadanos de los Estados Unidos (EUA), deberán obtener una eTA antes de volar a Canadá o transitar por vía aérea.
       </p>
        <p>
          Los viajeros que ya tengan una visa canadiense en vigor, pueden continuar viajando con ella después del 1 de diciembre del 2016, hasta que expire. Una vez que su visa canadiense haya expirado, los viajeros necesitarán una eTA para cualquier futuro <strong>viaje por vía aérea a Canadá</strong>.
       </p>

      <strong>¿Cómo se puede pagar una eTA?</strong>

        <p>
      Las únicas formas aceptables de pago son Visa, Master Card y American Express, incluyendo las tarjetas de Visa, Master Card y American Express de prepago. El costo de la solicitud de la eTA no es reembolsable.
        </p>

      <p>
        Tramita una eTa <a href="https://www.canada.ca/en/immigration-refugees-citizenship/services/visit-canada/eta/apply.html" target="_blank">dando clic en este enlace</a>
     </p>
      </div>
    </div>
  </div>
 @endif


  </div>
 </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
  //function estilo tables
  $( function() {
    $("#collapseFares table").addClass('table table-striped');
  });
});
</script>
</body>
</html>
