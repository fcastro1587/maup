<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Models\AgencyAgent;
use App\Travel;
use App\Airline;
use App\Visa;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{

/*******************************************************************************
*
*Función para la conexion de la api y traer bloqueos
*
*******************************************************************************/
  public function get_data($url)
  {
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
  }

    public function pdf(Request $request)
    {
      //$Id_agencia  = $request['id'];    // es para puntos de venta
      $agentId       = $request['agentId']; // agencies_agents id = 8
      $CLV           = $request['viaje'];   // para Travel

      //$Punto = PuntosVenta::find($Id_agencia);           //puntos de venta
      $Agency = AgencyAgent::find($agentId);               //agencie_agents

      //$viaje = Travel::where('mt', '=', $CLV)->first();    //travels

      $separador="<br/><hr/>";

      //if (empty($viaje->hotels_table)) { $viaje->hotels_table = "Consulte los hoteles disponibles para este programa"; }

      if (!empty($Agency->agency->logotype)) { $logotipo = "<img src='https://logo.mtmedia.com.mx/".$Agency->agency->logotype."' alt=".$Agency->agency->name."' width='200' >"; }
      else { $Agency->agency->logotype = "<h3>".$Agency->agency->name."</h3>"; }

      /*if( $viaje->currency != 'EUR' ){ $precios_pagaderos="Precios cotizados en dólares americanos, pagaderos en Moneda Nacional al tipo de cambio del día.<br />"; }
      else{ $precios_pagaderos=""; }*/


       $viajeblq               = [];
       $canonical             = "";
       $collection_visas_cad  = "";
       $colectionTempCarousel = [];
       $colectionRecom        = [];
       $collectionTravelpdf   = [];
       $canonical             = "";
       $cad_countries         = "";
       $cad_cities            = "";
       $cad_visas             = "";
       $cad_airlines          = "";
       $cad_tours             = "";
       $cad_hotels            = "";
       $cad_hotels_comp       = "";
       $cad_dates             = "";
       $cad_items_temp        = "";
       $cad_destination       = "";
       $cad_airlines_secun    = "";
       $cad_departures        = "";
       $colectionTempCarousel = [];
       $colectionRecom        = [];
       $collectionTravel      = [];
       $array_imagen          = [];
       $cad_contrato_ad       = "";
       $cad_contrato_ex       = "";
       $cad_formas_pago       = "";
       $cad_vigencia          = "";


       $viaje  = Travel::where('mt',$CLV)
                       ->where('status', '=', 1)
                       ->first();

       $airlines_gral = Airline::all();
       $visas_gral    = Visa::all();


       if( $viaje != null ){

           //arma cadena de paises regular
           foreach($viaje->countries as $countri){
               $cad_countries .= $countri->name_country.", ";

               //arma cadena de visas por pais regular
               foreach($countri->visas as $visa){
                   if ( count($countri->visas) != 0 ){
                    $cad_visas .= $visa->description;
                   }
               }

           }
           $cad_countries = substr($cad_countries, 0, -2);


           //arma cadena de ciudades regular
           foreach($viaje->cities as $city){
                   $cad_cities .= $city->name.", ";
           }
           $cad_cities = substr($cad_cities, 0, -2);

           //arma cadena de aerolineas regular
           foreach($viaje->airlines as $airline){
                   /*$cad_airlines .= '<img class="img-fluid lazyload" src="https://mng.xbloq.com/manager/admin/images/airlines/'.$airline->img_airline.'" alt="'.$airline->airline.'">';*/
                   $cad_airlines .= '<img class="img-fluid lazyload" src="https://mng.xbloq.com/manager/admin/images/airlines/iata/'.$airline->code_iata.'.png" alt="'.$airline->airline.'">';
           }

           //arma cadena de tours regular
           foreach($viaje->tours as $tours){
                   $cad_tours .= '<strong>'.$tours->title.'</strong><br>'.$tours->especial_itinerary.'<br>';
           }

           //arma cadena de imagenes
           foreach($viaje->multimedia as $imagen){

               if($imagen->video_type==2)
               {
                   $array_imagen = ['<div style="padding:56.25% 0 0 0;position:relative;">
                       <iframe src="https://player.vimeo.com/video/'.$imagen->url.'?title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                       <script src="https://player.vimeo.com/api/player.js"></script>
                       </div>'];
               }
               elseif($imagen->video_type==1)
               {
                   $array_imagen = ['<div class="embed-responsive embed-responsive-16by9" id="cont_video">
               <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/'.$imagen->url.'?rel=0"  width="100%" height="100%" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
               </div>'];

               }
               elseif($imagen->type==1)
               {
                   $array_imagen = ['<div class="cont_img_paq">
                   <a class="blq_img">
                       <img itemprop="image" src="https://mng.xbloq.com/manager/admin/images/travels/'.$imagen->name.'" alt="'.$imagen->description.'" title="'.$imagen->description.'"  class="img_paq">
                   </a>
                   </div>'];
                  $img_shared = "https://mng.xbloq.com/manager/admin/images/travels/".$imagen->name;
               }
           }

           $cad_vigencia = "Precios vigentes hasta el ".$viaje->validity;

           /*Cadena con liga de la seccion*/
            switch ($viaje->department) {
                case "europa":
                    $cad_destination = "viajes-europa";
                    $cad_contrato_ad = "05-europa-salidas-regulares.pdf";
                    $cad_contrato_ex = "10-ex-europa-salidas-regulares.pdf";
                    $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#mgop'>Consulta nuestras opciones de Pago para viajes Mega Travel Europa</a>";
                    break;
                case "sudamerica":
                    $cad_destination = "viajes-sudamerica";
                    $cad_contrato_ad = "02-bloqueos-mega-travel-operadora.pdf";
                    $cad_contrato_ex = "07-ex-bloqueos-mega-travel-operadora.pdf";
                    $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#mgop'>Consulta nuestras opciones de Pago para viajes Mega Travel Sudamérica</a>";
                    break;
                case "camerica":
                    $cad_destination = "viajes-centroamerica";
                    $cad_contrato_ad = "02-bloqueos-mega-travel-operadora.pdf";
                    $cad_contrato_ex = "07-ex-bloqueos-mega-travel-operadora.pdf";
                    $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#mgop'>Consulta nuestras opciones de Pago para viajes Mega Travel CEntroámerica</a>";
                    break;
                case "usa":
                    $cad_destination = "viajes-estados-unidos";
                    $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                    $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                    $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel Estados Unidos</a>";
                    break;
                case "caribe":
                    $cad_destination = "viajes-al-caribe";
                    $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                    $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                    $cad_formas_pago = "";
                    break;
                case "moriente":
                    $cad_destination = "viajes-medio-oriente";
                    $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                    $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                    $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel Medio Oriente</a>";
                    break;
                case "canada":
                    $cad_destination = "viajes-canada";
                    $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                    $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                    $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel Canadá</a>";
                    break;
                case "asia":
                    $cad_destination = "viajes-asia";
                    $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                    $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                    $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel Asia</a>";
                    break;
                case "mexico":
                    $cad_destination = "viajes-por-mexico";
                    $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                    $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                    $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel México</a>";
                    break;
                case "pacifico":
                    $cad_destination = "viajes-pacifico";
                    $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                    $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                    $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel Pacífico</a>";
                    break;
                case "africa":
                    $cad_destination = "viajes-africa";
                    $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                    $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                    $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel África</a>";
                    break;
                case "cruceros":
                    $cad_destination = "cruceros";
                    $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                    $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                    $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel CRuceros</a>";
                    break;
                case "edeportivo":
                    $cad_destination = "eventos-especiales";
                    $cad_contrato_ad = "02-bloqueos-mega-travel-operadora.pdf";
                    $cad_contrato_ex = "07-ex-bloqueos-mega-travel-operadora.pdf";
                    $cad_formas_pago = "";
                    break;
                case "exoticos":
                    $cad_destination = "viajes-exoticos-y-a-la-medida";
                    $cad_contrato_ad = "02-bloqueos-mega-travel-operadora.pdf";
                    $cad_contrato_ex = "07-ex-bloqueos-mega-travel-operadora.pdf";
                    $cad_formas_pago = "";
                    break;
                case "jviajera":
                    $cad_destination = "juventud-viajera";
                    $cad_contrato_ad = "02-bloqueos-mega-travel-operadora.pdf";
                    $cad_contrato_ex = "07-ex-bloqueos-mega-travel-operadora.pdf";
                    $cad_formas_pago = "";
                    break;
            }


           $collectionTravel=[
                               "mt"             => $viaje['mt'],
                               "name"           => $viaje['name'],
                               "days"           => $viaje['days'],
                               "nights"         => $viaje['nights'],
                               "price_from"     => number_format($viaje['price_from']),
                               "taxes"          => number_format($viaje['taxes']),
                               "departure_date" => $viaje['departure_date'],
                               "bloqueos"       => "",
                               "include"        => $viaje['include'],
                               "not_include"    => $viaje['not_include'],
                               "itinerary"      => $viaje['itinerary'],
                               "currency"       => $viaje['currency'],
                               "room_type"      => $viaje['room_type'],
                               "image"          => $array_imagen,
                               "price_table"    => $viaje['price_table'],
                               "hotels_table"   => $viaje['hotels_table'],
                               "operator"       => $viaje['operator'],
                               "circuit"        => $viaje['circuit'],
                               "array_cities"   => $viaje->cities,
                               "cities"         => $cad_cities,
                               "array_countries" => $viaje->countries,
                               "countries"      => $cad_countries,
                               "visas"          => $cad_visas,
                               "airlines"       => $cad_airlines,
                               "airlines_secun" => "",
                               "tours"          => $cad_tours,
                               "additional_notes" => "",
                               "cancellation_policies" => "",
                               "destination"    => $cad_destination,
                               "department"     => $viaje->department,
                               "contrato_ad"    => $cad_contrato_ad,
                               "contrato_ex"    => $cad_contrato_ex,
                               "formas_pago"    => $cad_formas_pago,
                               "vigencia"       => $cad_vigencia,
                               "status"         => $viaje['status'],
                               "type"           => "regular",
                             ];
       }
       elseif( $viaje == null )
       {
       // API Bloqueo
       $viajeblq = $this->get_data( url('https://www.megatravel.com.mx/tester/detail/'.$CLV.'') );
       $viajeblq = json_decode($viajeblq,true);

       //COnvierte fechas mes
       function smartdate($fecha)
           {
              if ($fecha)
              {
                 $f=explode("-",$fecha);
                 $nummes=(int)$f[1];
                 $mes1="0-Ene.-Feb.-Mar.-Abr.-May.-Jun.-Jul.-Ago.-Sept.-Oct.-Nov.-Dic.";
                 $mes1=explode("-", $mes1);
                 $desfecha = "$mes1[$nummes] $f[2]";
                 return $desfecha;
              }
           }


           $date_item_departure = [];
           foreach ($viajeblq['departures'] as $date_departure) {
               $date_item_departure[] = $date_departure['date'];
           }
           //ordena en ascendente
           asort($date_item_departure);
           foreach ($date_item_departure as $date_item_departure) {
               $cad_departures .= smartdate($date_item_departure).", ";
           }
           $cad_departures = substr($cad_departures, 0, -2);


           foreach ($viajeblq['bloqueos'] as $date_blq) {
               $date_item = smartdate($date_blq['date']);
               $cad_dates .= $date_item.', ';
           }

           //cadena cities
           if( is_array($viajeblq['cities']) )
           {
               //dd($viajeblq['cities']);
               foreach ($viajeblq['cities'] as $item_city) {
                    $cad_cities .= $item_city['name'].", ";
               }
               //limpia último & de la cadena de bloqueos
               $cad_cities = substr($cad_cities, 0, -2);

           }
           else
           {
               //dd($viajeblq['cities']);
               $cad_cities     = $viajeblq['cities'];
               $search_guion   = array(' - ', ' -', '- ');
               $replace_guion  = array(', ', ', ', ', ');
               $cad_cities     = str_replace($search_guion, $replace_guion, $cad_cities);
           }

           //cadena countries
           foreach ($viajeblq['countries'] as $country) {
               $cad_countries .= $country['name'].", ";
              //recorre catalogo general de visas
               foreach ($visas_gral as $cat_visas) {
                  if( $cat_visas->country_code == strtolower($country['code']) ){
                       //arma cadena de visas blqueo
                       $cad_visas.= $cat_visas->description;
                  }
               }
           }
           $cad_countries = substr($cad_countries, 0, -2);

           if( !empty($viajeblq['hotels']) && is_array($viajeblq['hotels']) == true ){
               //cadena hotels
               foreach ($viajeblq['hotels'] as $hotel_blq) {
                   $cad_hotels .= '<tr>
                                   <td>'.$hotel_blq['name'].'</td>
                                   <td>'.$hotel_blq['city'].'</td>
                                   <td>'.$hotel_blq['type'].'</td>
                                   <td>'.$hotel_blq['country'].'</td>
                                   </tr>';
               }
               $cad_hotels_comp.='<table width="100%"><thead><td>Hotel</td><td>Ciudad</td><td>Tipo</td><td>Pais</td></thead>'.$cad_hotels.'</table>';
           }
           elseif(!empty($viajeblq['hotels']) && is_array($viajeblq['hotels']) == false )
           {
               $cad_hotels_comp = $viajeblq['hotels'];
           }

           //cadena imagen
           $array_imagen = ['<div class="cont_img_paq">
                   <a class="blq_img">
                       <img itemprop="image" src="'.$viajeblq["image"].'" alt="'.$viajeblq['name'].'" title="'.$viajeblq['name'].'" class="img_paq">
                   </a>
                   </div>'];

                   $cad_vigencia = "Precios vigentes hasta el ".$viajeblq["expire"];


          /*Cadena con liga de la seccion*/
           switch ($viajeblq['destination']) {
               case "Europa":
                   $cad_destination = "viajes-europa";
                   $cad_contrato_ad = "03-europa-bloqueos-gral.pdf";
                   $cad_contrato_ex = "08-ex-europa-bloqueos-gral.pdf";
                   $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#mgop'>Consulta nuestras opciones de Pago para viajes Mega Travel Europa</a>";
                   break;
               case "Sudamerica":
                   $cad_destination = "viajes-sudamerica";
                   $cad_contrato_ad = "02-bloqueos-mega-travel-operadora.pdf";
                   $cad_contrato_ex = "07-ex-bloqueos-mega-travel-operadora.pdf";
                   $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#mgop'>Consulta nuestras opciones de Pago para viajes Mega Travel Sudamérica</a>";
                   break;
               case "Centroamerica":
                   $cad_destination = "viajes-centroamerica";
                   $cad_contrato_ad = "02-bloqueos-mega-travel-operadora.pdf";
                   $cad_contrato_ex = "07-ex-bloqueos-mega-travel-operadora.pdf";
                   $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#mgop'>Consulta nuestras opciones de Pago para viajes Mega Travel Centroamérica</a>";
                   break;
               case "Usa":
                   $cad_destination = "viajes-estados-unidos";
                   $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                   $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                   $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel Estados Unidos</a>";
                   break;
               case "Caribe":
                   $cad_destination = "viajes-al-caribe";
                   $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                   $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                   break;
               case "MOriente":
                   $cad_destination = "viajes-medio-oriente";
                   $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                   $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                   $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel Medio Oriente</a>";
                   break;
               case "Canada":
                   $cad_destination = "viajes-canada";
                   $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                   $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                   $cad_formas_pago = "";
                   break;
                   $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel Canadá</a>";
               case "Asia":
                   $cad_destination = "viajes-asia";
                   $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                   $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                   $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel Asia</a>";
                   break;
               case "Mexico":
                   $cad_destination = "viajes-por-mexico";
                   $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                   $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                   $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel México</a>";
                   break;
               case "Pacifico":
                   $cad_destination = "viajes-pacifico";
                   $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                   $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                   $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel Pacífico</a>";
                   break;
               case "Africa":
                   $cad_destination = "viajes-africa";
                   $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                   $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                   $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel África</a>";
                   break;
               case "cruceros":
                   $cad_destination = "cruceros";
                   $cad_contrato_ad = "01-bloqueos-astromundo.pdf";
                   $cad_contrato_ex = "06-ex-bloqueos-astromundo.pdf";
                   $cad_formas_pago = "<a href='https://megatravel.com.mx/info/formas-de-pago#astro'>Consulta nuestras opciones de Pago para viajes Mega Travel Cruceros</a>";
                   break;
               case "Edeportivo":
                   $cad_destination = "eventos-especiales";
                   $cad_contrato_ad = "02-bloqueos-mega-travel-operadora.pdf";
                   $cad_contrato_ex = "07-ex-bloqueos-mega-travel-operadora.pdf";
                   $cad_formas_pago = "";
                   break;
               case "Exoticos":
                   $cad_destination = "viajes-exoticos-y-a-la-medida";
                   $cad_contrato_ad = "02-bloqueos-mega-travel-operadora.pdf";
                   $cad_contrato_ex = "07-ex-bloqueos-mega-travel-operadora.pdf";
                   $cad_formas_pago = "";
                   break;
               case "Juvi":
                   $cad_destination = "juventud-viajera";
                   $cad_contrato_ad = "02-bloqueos-mega-travel-operadora.pdf";
                   $cad_contrato_ex = "07-ex-bloqueos-mega-travel-operadora.pdf";
                   $cad_formas_pago = "";
                   break;
           }

               //contrato y extracto 12059 y 12159
               if($viajeblq['clv'] == 12059 || $viajeblq['clv'] == 12159)
               {
                   $cad_contrato_ad  = "12-mt12059-mt12159.pdf";
                   $cad_contrato_ex  = "11-ex-mt12059-mt12159.pdf";
               }

               //contrato y extracto Quinceañeras de europa
               if($viajeblq['clv'] == 12115 || $viajeblq['clv'] == 12118)
               {
                   $cad_contrato_ad  = "04-europa-quinceaneras.pdf";
                   $cad_contrato_ex  = "09-ex-europa-quinceaneras.pdf";
               }


           //recorre catalogo general de aerolineas
           foreach ($airlines_gral as $cat_airlines) {
              if( $cat_airlines->code_iata == $viajeblq['airline_code'] ){
                   //arma cadena de aerolineas blqueo
                   //$cad_airlines .= '<img class="img-fluid lazyload" src="https://mng.xbloq.com/manager/admin/images/airlines/'.$cat_airlines->img_airline.'" alt="'.$cat_airlines->airline.'">';
                   $cad_airlines .= '<img class="img-fluid lazyload" src="https://mng.xbloq.com/manager/admin/images/airlines/iata/'.$cat_airlines->code_iata.'.png" alt="'.$cat_airlines->airline.'">';
              }

              foreach ($viajeblq['airlines'] as $airline_sec) {
                  //arma cadena de aerolineas blqueo campo secundario airlines
                  if( $cat_airlines->code_iata == $airline_sec['code'] ){
                      $cad_airlines_secun .= '<img class="img-fluid lazyload" src="https://mng.xbloq.com/manager/admin/images/airlines/iata/'.$cat_airlines->code_iata.'.png" alt="'.$cat_airlines->airline.'">';
                  }
              }
        }

           $collectionTravel = [
                               "mt"             => $viajeblq['clv'],
                               "name"           => $viajeblq['name'],
                               "days"           => $viajeblq['days'],
                               "nights"         => $viajeblq['nights'],
                               "price_from"     => number_format($viajeblq['from']),
                               "taxes"          => number_format($viajeblq['taxes']),
                               "departure_date" => $cad_departures,
                               "bloqueos"       => $cad_dates,
                               "include"        => $viajeblq['include_yes'],
                               "not_include"    => $viajeblq['include_not'],
                               "itinerary"      => $viajeblq['itinerary'],
                               "currency"       => $viajeblq['currency_code'],
                               "room_type"      => $viajeblq['room_type'],
                               "image"          => $array_imagen,
                               "price_table"    => $viajeblq['list_prices'],
                               "hotels_table"   => $cad_hotels_comp,
                               "operator"       => "",
                               "circuit"        => "",
                               "array_cities"   => $viajeblq['cities'],
                               "cities"         => $cad_cities,
                               "array_countries" => $viajeblq['countries'],
                               "countries"      => $cad_countries,
                               "visas"          => $cad_visas,
                               "airlines"       => $cad_airlines,
                               "airlines_secun" => $cad_airlines_secun,
                               "tours"          => $viajeblq['tours'],
                               "additional_notes" => $viajeblq['additional_notes'],
                               "cancellation_policies" => $viajeblq['cancellation_policies'],
                               "department"     => $viajeblq['destination'],
                               "destination"    => $cad_destination,
                               "contrato_ad"    => $cad_contrato_ad,
                               "contrato_ex"    => $cad_contrato_ex,
                               "formas_pago"    => $cad_formas_pago,
                               "vigencia"       => $cad_vigencia,
                               "status"         => 1,
                               "type"           => "bloqueo",
                             ];
       }
       elseif( !isset($viajeblq['data']) && empty($viaje) )
       {
           return Redirect::to('/');
       }




    //return view('admin.pdf.download', compact('collectionTravel', 'logotipo', 'Agency'));
    $pdf     = PDF::loadView('admin.pdf.download', compact('collectionTravel', 'logotipo', 'Agency'));
    return $pdf->download($collectionTravel['name'].'_'.$collectionTravel['mt'].'.pdf');  // con esto bajara el archivo y se llamara listado


    }
}
