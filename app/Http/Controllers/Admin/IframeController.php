<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Travel;
use App\Airline;
use App\Country;
use App\City;
use App\Department;
use App\Season;
use App\SeasonTravel;
use App\Visa;
use App\Http\Controllers\Controller;

class IframeController extends Controller
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

/*******************************************************************************
*
*Recibe las promociones, temporadas, por default muestra promociones
*
*******************************************************************************/
/*******************************************************************************
*Aqui recibe los Destinos, las temporadas y las ciudades
*******************************************************************************/
    public function vi(Request $request)
    {
      $Dest         = $request['Dest'];
      $Country      = $request['Country'];
      $temporada    = $request['temporada'];
      $lmiel        = $request['lmiel'];
      $Dominio      = $request['domi'];
      $Dominioviaja = $request['domiviaja'];
      $fontId       = $request['ff'];
      if (!$fontId) { $fontId = 1; }
      $fontKind = array(	"", "Arial, sans-serif", "Verdana, sans-serif", "Trebuchet MS, sans-serif",
      					"Gill Sans, sans-serif",  "Georgia, sans-serif", "Comic Sans MS, sans-serif",
      					"Lucida Sans Unicode, sans-serif", "Times New Roman, sans-serif",
      					"'Century Gothic', sans-serif", "'Coustard', serif", "'Roboto', sans-serif", "'Roboto Slab', serif" );
      $fontFamily   = $fontKind [$fontId];
      $txtColor     = $request['txtColor'];
      $aColor       = $request['aColor'];
      $ahColor      = $request['ahColor'];
      $thBG         = $request['thBG'];
      $thTxColor    = $request['thTxColor'];
      if ($thBG =="") { $thBG = "666666"; }
      if ($thTxColor =="") { $thTxColor = "CCCCCC"; }


      $colectionMainCarousel = [];
      $colectionProCarousel  = [];
      $colectionTempCarousel = [];
      $colectionBlqCarousel  = [];
      $colectionFavCarousel  = [];

      $cad_items_main        = "";
      $cad_items_pro         = "";
      $cad_items_temp        = "";
      $cad_items_blo         = "";
      $cad_items_fav         = "";

/*******************************************************************************
*modelo de temporada
*******************************************************************************/

/*******************************************************************************
*Cuando no reciben nada muestra el listado de promociones
*******************************************************************************/
            if(empty($temporada) && empty($lmiel)){

            /****** OBTENER PAQUETES DEL CARRUSEL MEGA OFERTAS Y PROMOS VIGENTES ******/
            $season_travel_pro = SeasonTravel::where('active_item',1)
                                ->where('season_code_season','PRO')
                                ->orderBy('order_item')
                                ->get();

            foreach($season_travel_pro as $pro){

                if( $pro->bloqueo_mt != null ){
                    $cad_items_pro .= "mts[]=".$pro->bloqueo_mt."&";
                }

                if( $pro->travel_mt != null && $pro->travels->status == 1 ){

                        /*añade a la colección programas regulares*/
                         $colectionProCarousel[$pro->travels->mt] = [
                         "mt"          => $pro->travels->mt,
                         "name"        => $pro->travels->name,
                         "days"        => $pro->travels->days,
                         "price_from"  => number_format($pro->travels->price_from),
                         "currency"    => $pro->travels->currency,
                         "type"        => "regular",
                        ];
                      }
                    }

                //limpia último & de la cadena de bloqueos
                $cad_items_pro = substr($cad_items_pro, 0, -1);

                /*** API Bloqueos Carousel****/
                $api_pro_carousel = $this->get_data( url('https://www.megatravel.com.mx/tester/mts/'.$cad_items_pro.'') );
                $api_pro_carousel = json_decode($api_pro_carousel,true);

                if( !isset($api_pro_carousel['data'])  )
                { $api_pro_carousel = ""; }
                else
                {

                /*rellena colección con bloqueos*/
                foreach ($api_pro_carousel['data'] as $api_pro_carousel) {

                    $colectionProCarousel[$api_pro_carousel['clv']] = [
                     "mt"          => $api_pro_carousel['clv'],
                     "name"        => $api_pro_carousel['name'],
                     "days"        => $api_pro_carousel['days'],
                     "price_from"  => number_format($api_pro_carousel['from']),
                     "currency"    => $api_pro_carousel['currency_code'],
                     "type"        => "bloqueo",
                    ];
                   }
                 }

                if( $colectionProCarousel != "" )
                {
                  $collection_vi = [];
                  $contador = 0;

                  foreach( $colectionProCarousel as $pro )
                  {
                  $collection_vi [] = "<tr data-price='".$pro['price_from']."' data-duration='". $pro['days']."'>
                                          <td>
                                          <div class='nom_paquete'>
                                          <a href='circuito.php?domi=".$Dominio."&domiviaja=".$Dominioviaja."&viaje=" . $pro['mt'] . "&txtColor=".$txtColor."&thBG=".$thBG."&thTxColor=".$thTxColor."&ff=".$fontId."'>"."MT-".$pro['mt']." ".$pro['name']."</a>
                                          </div>
                                          </td>".
                                          "<td>".$pro['days']." Días"."</td><td id='ciudades'><div class='nom_paquete'>";

                  $collection_vi [] = "</div></td><td>".$pro['price_from']."<small>"." ".$pro['currency']."</small></td></tr>";

                  $contador++;
                  }
                }
}

/*******************************************************************************
*Si recibe lmiel y temporada esta vacio muestra sus respectivos programas
*******************************************************************************/
          if(empty($temporada) && !empty($lmiel)){

          /****** OBTENER PAQUETES DEL CARRUSEL MEGA OFERTAS Y PROMOS VIGENTES ******/
          $season_travel_pro = SeasonTravel::where('active_item',1)
                              ->where('season_code_season', $lmiel)
                              ->orderBy('order_item')
                              ->get();

          foreach($season_travel_pro as $pro){

              if( $pro->bloqueo_mt != null ){
                  $cad_items_pro .= "mts[]=".$pro->bloqueo_mt."&";
              }

              if( $pro->travel_mt != null && $pro->travels->status == 1 ){

                      /*añade a la colección programas regulares*/
                       $colectionProCarousel[$pro->travels->mt] = [
                       "mt"          => $pro->travels->mt,
                       "name"        => $pro->travels->name,
                       "days"        => $pro->travels->days,
                       "price_from"  => number_format($pro->travels->price_from),
                       "currency"    => $pro->travels->currency,
                       "type"        => "regular",
                      ];
                    }
                  }

                  //limpia último & de la cadena de bloqueos
                  $cad_items_pro = substr($cad_items_pro, 0, -1);

                  /*** API Bloqueos Carousel****/
                  $api_pro_carousel = $this->get_data( url('https://www.megatravel.com.mx/tester/mts/'.$cad_items_pro.'') );
                  $api_pro_carousel = json_decode($api_pro_carousel,true);

                  if( !isset($api_pro_carousel['data'])  )
                  { $api_pro_carousel = ""; }
                  else
                  {

                  /*rellena colección con bloqueos*/
                  foreach ($api_pro_carousel['data'] as $api_pro_carousel) {

                      $colectionProCarousel[$api_pro_carousel['clv']] = [

                       "mt"          => $api_pro_carousel['clv'],
                       "name"        => $api_pro_carousel['name'],
                       "days"        => $api_pro_carousel['days'],
                       "price_from"  => number_format($api_pro_carousel['from']),
                       "currency"    => $api_pro_carousel['currency_code'],
                       "type"        => "bloqueo",
                      ];
                     }
                   }

                  if( $colectionProCarousel != "" )
                  {
                    $collection_vi = [];
                    $contador = 0;

                    foreach( $colectionProCarousel as $pro )
                    {
                    $collection_vi [] = "<tr data-price='".$pro['price_from']."' data-duration='". $pro['days']."'>
                                            <td>
                                            <div class='nom_paquete'>
                                            <a href='circuito.php?domi=".$Dominio."&domiviaja=".$Dominioviaja."&viaje=" . $pro['mt'] . "&txtColor=".$txtColor."&thBG=".$thBG."&thTxColor=".$thTxColor."&ff=".$fontId."'>"."MT-".$pro['mt']." ".$pro['name']."</a>
                                            </div>
                                            </td>".
                                            "<td>".$pro['days']." Días"."</td><td id='ciudades'><div class='nom_paquete'>";

                    $collection_vi [] = "</div></td><td>".$pro['price_from']."<small>"." ".$pro['currency']."</small></td></tr>";

                    $contador++;
                    }
                  }

        }

/*******************************************************************************
*Si recibe temporada y lmiel esta vacio muestra sus respectivos programas
*******************************************************************************/
        if(!empty($temporada) && empty($lmiel)){

        /****** OBTENER PAQUETES DEL CARRUSEL MEGA OFERTAS Y PROMOS VIGENTES ******/
        $season_travel_pro = SeasonTravel::where('active_item',1)
                            ->where('season_code_season', $temporada)
                            ->orderBy('order_item')
                            ->get();

        foreach($season_travel_pro as $pro){

            if( $pro->bloqueo_mt != null ){
                $cad_items_pro .= "mts[]=".$pro->bloqueo_mt."&";
            }

            if( $pro->travel_mt != null && $pro->travels->status == 1 ){

                    /*añade a la colección programas regulares*/
                     $colectionProCarousel[$pro->travels->mt] = [
                     "mt"          => $pro->travels->mt,
                     "name"        => $pro->travels->name,
                     "days"        => $pro->travels->days,
                     "price_from"  => number_format($pro->travels->price_from),
                     "currency"    => $pro->travels->currency,
                     "type"        => "regular",
                    ];
                  }
                }

                //limpia último & de la cadena de bloqueos
                $cad_items_pro = substr($cad_items_pro, 0, -1);

                /*** API Bloqueos Carousel****/
                $api_pro_carousel = $this->get_data( url('https://www.megatravel.com.mx/tester/mts/'.$cad_items_pro.'') );
                $api_pro_carousel = json_decode($api_pro_carousel,true);

                if( !isset($api_pro_carousel['data'])  )
                { $api_pro_carousel = ""; }
                else
                {

                /*rellena colección con bloqueos*/
                foreach ($api_pro_carousel['data'] as $api_pro_carousel) {

                    $colectionProCarousel[$api_pro_carousel['clv']] = [

                     "mt"          => $api_pro_carousel['clv'],
                     "name"        => $api_pro_carousel['name'],
                     "days"        => $api_pro_carousel['days'],
                     "price_from"  => number_format($api_pro_carousel['from']),
                     "currency"    => $api_pro_carousel['currency_code'],
                     "type"        => "bloqueo",
                    ];
                   }
                 }

                if( $colectionProCarousel != "" )
                {
                  $collection_vi = [];
                  $contador = 0;

                  foreach( $colectionProCarousel as $pro )
                  {
                  $collection_vi [] = "<tr data-price='".$pro['price_from']."' data-duration='". $pro['days']."'>
                                          <td>
                                          <div class='nom_paquete'>
                                          <a href='circuito.php?domi=".$Dominio."&domiviaja=".$Dominioviaja."&viaje=" . $pro['mt'] . "&txtColor=".$txtColor."&thBG=".$thBG."&thTxColor=".$thTxColor."&ff=".$fontId."'>"."MT-".$pro['mt']." ".$pro['name']."</a>
                                          </div>
                                          </td>".
                                          "<td>".$pro['days']." Días"."</td><td id='ciudades'><div class='nom_paquete'>";

                  $collection_vi [] = "</div></td><td>".$pro['price_from']."<small>"." ".$pro['currency']."</small></td></tr>";

                  $contador++;
                  }
                }

      }

/*******************************************************************************
*Si recibe temporada y lmiel esta vacio muestra sus respectivos programas
*******************************************************************************/
      if(!empty($temporada) && !empty($lmiel)){
        /****** OBTENER PAQUETES DEL CARRUSEL MEGA OFERTAS Y PROMOS VIGENTES ******/
        $season_travel_pro = SeasonTravel::where('active_item',1)
                            ->where('season_code_season', "PRO")
                            ->orderBy('order_item')
                            ->get();

        foreach($season_travel_pro as $pro){

            if( $pro->bloqueo_mt != null ){
                $cad_items_pro .= "mts[]=".$pro->bloqueo_mt."&";
            }

            if( $pro->travel_mt != null && $pro->travels->status == 1 ){

                    /*añade a la colección programas regulares*/
                     $colectionProCarousel[$pro->travels->mt] = [
                     "mt"          => $pro->travels->mt,
                     "name"        => $pro->travels->name,
                     "days"        => $pro->travels->days,
                     "price_from"  => number_format($pro->travels->price_from),
                     "currency"    => $pro->travels->currency,
                     "type"        => "regular",
                    ];
                  }
                }

                //limpia último & de la cadena de bloqueos
                $cad_items_pro = substr($cad_items_pro, 0, -1);

                /*** API Bloqueos Carousel****/
                $api_pro_carousel = $this->get_data( url('https://www.megatravel.com.mx/tester/mts/'.$cad_items_pro.'') );
                $api_pro_carousel = json_decode($api_pro_carousel,true);

                if( !isset($api_pro_carousel['data'])  )
                { $api_pro_carousel = ""; }
                else
                {

                /*rellena colección con bloqueos*/
                foreach ($api_pro_carousel['data'] as $api_pro_carousel) {

                    $colectionProCarousel[$api_pro_carousel['clv']] = [

                     "mt"          => $api_pro_carousel['clv'],
                     "name"        => $api_pro_carousel['name'],
                     "days"        => $api_pro_carousel['days'],
                     "price_from"  => number_format($api_pro_carousel['from']),
                     "currency"    => $api_pro_carousel['currency_code'],
                     "type"        => "bloqueo",
                    ];
                   }
                 }

                if( $colectionProCarousel != "" )
                {
                  $collection_vi = [];
                  $contador = 0;

                  foreach( $colectionProCarousel as $pro )
                  {
                  $collection_vi [] = "<tr data-price='".$pro['price_from']."' data-duration='". $pro['days']."'>
                                          <td>
                                          <div class='nom_paquete'>
                                          <a href='circuito.php?domi=".$Dominio."&domiviaja=".$Dominioviaja."&viaje=" . $pro['mt'] . "&txtColor=".$txtColor."&thBG=".$thBG."&thTxColor=".$thTxColor."&ff=".$fontId."'>"."MT-".$pro['mt']." ".$pro['name']."</a>
                                          </div>
                                          </td>".
                                          "<td>".$pro['days']." Días"."</td><td id='ciudades'><div class='nom_paquete'>";

                  $collection_vi [] = "</div></td><td>".$pro['price_from']."<small>"." ".$pro['currency']."</small></td></tr>";

                  $contador++;
                  }
                }

}

 /*******************************************************************************
 *
 *Recibe el destino y muestra sus programas
 *
 *******************************************************************************/
 /*******************************************************************************
 *Si existe  la variable Destino
 *******************************************************************************/
if(isset($Dest)){


/*******************************************************************************
*Compara el id recibido y trae el code del department para concatenar con la url
*******************************************************************************/
               $api = Department::select('id', 'code')->get();
               foreach($api as $a)
               {
               if($a->id == $Dest){

                   $find_api_department =  $a->code;

               }
              }

/*******************************************************************************
*Conecta con api de bloqueos
*******************************************************************************/
                if(!empty($find_api_department)){


                $api_dest = $this->get_data( url('https://www.megatravel.com.mx/tester/destination/'.$find_api_department.''));
                $api_dest = json_decode($api_dest,true);

                $collection_vi      = [];
                $colectionDestinblq = [];


/*******************************************************************************
*Inicializa vars para filtros range
*******************************************************************************/
                $min_price       = 0;
                $max_price       = 0;
                $min_duration    = 0;
                $max_duration    = 0;
                $array_duration  = [];
                $array_price     = [];


/*******************************************************************************
*Rellena colección con bloqueos
*******************************************************************************/
                foreach ($api_dest['data'] as $api_travel) {

/*******************************************************************************
*Genera cadena con coleccion de ciudades
*******************************************************************************/
//cadena cities
            $collection_cities_cad = "";

            if( is_array($api_travel['cities']) )
            {

                foreach ($api_travel['cities'] as $api_city) {
                     $collection_cities_cad .= $api_city['name'].", ";
                }
                //limpia último & de la cadena de bloqueos
                $collection_cities_cad = substr($collection_cities_cad, 0, -2);

            }
            else
            {
                    //genera cadena con coleccion de ciudades
                    $collection_cities_array = explode(" – ", $api_travel['cities']);
                    foreach ($collection_cities_array as $api_city ) {
                      $search  = array(' - ', ' -', '- ');
                      $replace = array(', ', ', ', ', ');
                      $api_city = str_replace($search, $replace, $api_city);

                      $api_city = ucwords($api_city);
                      $collection_cities_cad .= $api_city.", ";

                    }
                      $collection_cities_cad = substr($collection_cities_cad, 0, -2);

            }

                $collection_cities_cad = substr($collection_cities_cad, 0, -2);

/*******************************************************************************
*Genera cadena con coleccion de imagen
*******************************************************************************/
                $collection_images_cad = '<img class="img-fluid" src="http://mng.xbloq.com/manager/admin/images/travels/siena-fachada-de-la-catedral.jpg" title="'.$api_travel['name'].'">';

/*******************************************************************************
*Arreglo colección de bloqueos
*******************************************************************************/
                 $colectionDestinblq[] = [
                       "mt"          => $api_travel['clv'],
                       "name"        => $api_travel['name'],
                       "days"        => $api_travel['days'],
                       "price_from"  => $api_travel['from'],
                       "currency"    => $api_travel['currency_code'],
                       "cities"      => $collection_cities_cad,
                       "img"         => $collection_images_cad,
                       "type"        => "bloqueo",
                ];
              }


/*******************************************************************************
*Ejecuta consulta de regulares
*******************************************************************************/
              $depto = Department::where('id', '=', $Dest)->first();

              if(!empty($depto)){
              $collection_vi = [];
              $contador = 0;
              $collection_depto = $depto->name;
              foreach($depto->travels as $via){
              if($via->status==1){

                $collection_cities_reg = "";
                foreach($via->cities as $ci){
                $collection_cities_reg .= $ci->name.", ";
               }

               $collection_cities_reg = substr($collection_cities_reg, 0, -2);

                $colectionDestinreg[] = [
                      "mt"          => $via->mt,
                      "name"        => $via->name,
                      "days"        => $via->days,
                      "price_from"  => $via->price_from,
                      "currency"    => $via->currency,
                      "cities"      => $collection_cities_reg,
                      "type"        => "regular",
                      "status"      => $via->status,
               ];
             }
           }

/*******************************************************************************
*une las dos colecciones de arreglos regulares/bloqueos
*******************************************************************************/
           $colectionDestinDuo = array_collapse([$colectionDestinblq,$colectionDestinreg]);

            foreach ($colectionDestinDuo as $via) {

/*******************************************************************************
*une las dos colecciones de arreglos regulares/bloqueos
*******************************************************************************/
              $array_price   []    = $via['price_from'];
              $array_duration[]    = $via['days'];

              $collection_vi  [$via['mt']] = "<tr data-price='".$via['price_from']."' data-duration='". $via['days']."'>
                                   <td>
                                   <div class='nom_paquete'>
                                   <a href='circuito.php?domi=".$Dominio."&domiviaja=".$Dominioviaja."&viaje=" . $via['mt'] . "&txtColor=".$txtColor."&thBG=".$thBG."&thTxColor=".$thTxColor."&ff=".$fontId."'>"."MT-".$via['mt']." ".$via['name']." <span style='font-size:10px'>".$via['type']."</span></a>
                                   </div>
                                   </td>".
                                  "<td>".$via['days']." Días"."</td><td id='ciudades'><div class='nom_paquete'>".$via['cities']."</div></td><td>".number_format($via['price_from'])."<small>"." ".$via['currency']."</small></td></tr>";
              $contador++;
            }

/*******************************************************************************
*muestra sus respectivas precios conforme a su departamento
*******************************************************************************/

if( !empty($array_price) && !empty($array_duration)  )
{
      $minDias    = min($array_duration);
      $maxDias    = max($array_duration);
      $minFare    = min($array_price);
      $maxFare    = max($array_price);
}

                /*if(isset($Dest)){
                if ($Dest==1) {
                  $maxFare = Travel::where('department', '=', 'europa')->max('price_from');
                  $minFare = Travel::where('department', '=', 'europa')->min('price_from');
                  $maxDias = Travel::where('department', '=', 'europa')->max('days');
                  $minDias = Travel::where('department', '=', 'europa')->min('days');
                }
                if ($Dest==2) {
                  $maxFare = Travel::where('department', '=', 'moriente')->max('price_from');
                  $minFare = Travel::where('department', '=', 'moriente')->min('price_from');
                  $maxDias = Travel::where('department', '=', 'moriente')->max('days');
                  $minDias = Travel::where('department', '=', 'moriente')->min('days');
                }
                if ($Dest==7) {
                  $maxFare = Travel::where('department', '=', 'sudamerica')->max('price_from');
                  $minFare = Travel::where('department', '=', 'sudamerica')->min('price_from');
                  $maxDias = Travel::where('department', '=', 'sudamerica')->max('days');
                  $minDias = Travel::where('department', '=', 'sudamerica')->min('days');
                }
                if ($Dest==9) {
                  $maxFare = Travel::where('department', '=', 'camerica')->max('price_from');
                  $minFare = Travel::where('department', '=', 'camerica')->min('price_from');
                  $maxDias = Travel::where('department', '=', 'camerica')->max('days');
                  $minDias = Travel::where('department', '=', 'camerica')->min('days');
                }
                if ($Dest==3) {
                  $maxFare = Travel::where('department', '=', 'canada')->max('price_from');
                  $minFare = Travel::where('department', '=', 'canada')->min('price_from');
                  $maxDias = Travel::where('department', '=', 'canada')->max('days');
                  $minDias = Travel::where('department', '=', 'canada')->min('days');
                }
                if ($Dest==8) {
                  $maxFare = Travel::where('department', '=', 'usa')->max('price_from');
                  $minFare = Travel::where('department', '=', 'usa')->min('price_from');
                  $maxDias = Travel::where('department', '=', 'usa')->max('days');
                  $minDias = Travel::where('department', '=', 'usa')->min('days');
                }
              }*/

/*******************************************************************************
*Cambiar cuando este campo de promociones.
*******************************************************************************/
                if (!empty ($Dest)) {
                switch ($Dest) {
              	case 1:
              	$Destino_tipo = "europa";
              	$Paises_Filtro = Array ("Alemania", "Austria", "Bélgica", "España", "Francia", "Holanda", "Hungría", "Inglaterra - Reino Unido", "Italia", "Rusia", "República Checa", "Suiza");
              	$Paises_Acento = Array ("Alemania", "Austria", "Bélgica", "España", "Francia", "Holanda", "Hungría", "Inglaterra - Reino Unido", "Italia", "Rusia", "República Checa", "Suiza");
              	break;

                case 2:
                $Destino_tipo = "moriente";
                $Paises_Filtro = Array ("Armenia", "Egipto", "Grecia", "Iran", "Israel", "Jordania", "Líbano", "Siria", "Tunez", "Turquía");
                $Paises_Acento = Array ("Armenia", "Egipto", "Grecia", "Iran", "Israel", "Jordania", "Líbano", "Siria", "Tunez", "Turquía");
                break;

                case 3:
              	$Destino_tipo = "canada";
              	break;

                case 4:
                $Destino_tipo = "asia";
                break;

                case 5:
                $Destino_tipo = "africa";
                break;

                case 6:
                $Destino_tipo = "pacifico";
                break;

                case 7:
                $Destino_tipo = "sudamerica";
                $Paises_Filtro = Array ("Argentina", "Brasil", "Colombia", "Chile", "Perú", "Uruguay");
                $Paises_Acento = Array ("Argentina", "Brasil", "Colombia", "Chile", "Perú", "Uruguay");
                break;

                case 8:
                $Destino_tipo = "usa";
                break;

                case 9:
                $Destino_tipo = "camerica";
                $Paises_Filtro = Array ("Colombia", "Costa Rica",  "Guatemala", "Panamá");
                $Paises_Acento = Array ("Colombia", "Costa Rica",  "Guatemala",  "Panamá");
                break;

                case 10:
                $Destino_tipo = "caribe";
                break;

                case 11:
                $Destino_tipo = "mexico";
                break;

                case 12:
                $Destino_tipo = "edeportivo";
                break;

                case 13:
                $Destino_tipo = "cruceros";
                break;
              }

/*******************************************************************************
*Si hay algo en la variable $Country realiza su respectiva consulta
*******************************************************************************/
              if(!empty($Country))
              {





                //dd($Country);

                $country = Country::where('name_country', '=', $Country)->first();

                $collection_vi = [];
                $contador= 0;

                foreach($country->travels as $coutra){
                    if ($Destino_tipo == $coutra->department && $coutra->status == 1) {
                      $collection_vi [] = "<tr data-price='".$coutra->price_from."' data-duration='".$coutra->days."'>
                                           <td>
                                           <div class='nom_paquete'>
                                           <a href='circuito.php?domi=".$Dominio."&domiviaja=".$Dominioviaja."&viaje=".$coutra->mt."&txtColor=".$txtColor."&thBG=".$thBG."&thTxColor=".$thTxColor."&ff=".$fontId."'>"."MT-".$coutra->mt." ".$coutra->name."</a>
                                           </div>
                                           </td>".
                                          "<td>".$coutra->days." Días"."</td><td id='ciudades'><div class='nom_paquete'>";
                                              foreach($coutra->cities as $ci){
                      $collection_vi  [] = "<span class='city_iframe'>".$ci->name." - "."</span>";
                    }
                      $collection_vi  [] = "</div></td><td>".$coutra->price_from."<small>"." ".$coutra->currency."</small></td></tr>";

                      $contador++;
                }
              }
            }


          }
        }
      }
        else{
          return "<p> Esta sección se encuentra en mantenimiento, vuelve pronto</p>";
      }
    }

      return view('admin.tools.vi', compact('collection_vi', 'contador','collection_depto','Dominio', 'Dominioviaja', 'Country', 'collection_dep', 'Paises_Filtro', 'Paises_Acento', 'sqlrange', 'collection_dep', 'fontFamily', 'Dest', 'ahColor', 'aColor', 'thBG', 'fontId', 'txtColor', 'thTxColor', 'maxFare', 'minFare', 'maxDias', 'minDias'));
    }

/*******************************************************************************
*
*Muestra el detalle de cada programa
*
*******************************************************************************/
    public function circuito(Request $request)
    {
     $CLV          = $request['viaje'];
     $Dominio      = $request['domi'];
     $Dominioviaja = $request['domiviaja'];
     $fontId       = $request['ff'];
     if (!$fontId) { $fontId = 1; }
     $fontKind = array(	"", "Arial, sans-serif", "Verdana, sans-serif", "Trebuchet MS, sans-serif",
     					"Gill Sans, sans-serif",  "Georgia, sans-serif", "Comic Sans MS, sans-serif",
     					"Lucida Sans Unicode, sans-serif", "Times New Roman, sans-serif",
     					"'Century Gothic', sans-serif", "'Coustard', serif", "'Roboto', sans-serif",
     					"'Roboto Slab', sans-serif");
     $fontFamily   = $fontKind [$fontId];
     $agencid      = $request['agencid'];
     $txtColor     = $request['txtColor'];
     $thBG         = $request['thBG'];
     if ($thBG == "") { $thBG = "666666"; }
     $thTxColor    = $request['thTxColor'];
     $fontf        =  $request['font'];
     if ($thTxColor == "") { $thTxColor = "CCCCCC"; }

/*******************************************************************************
*Si existe la variable $CLV, muestra su respectiva consulta
*******************************************************************************/
if(isset($CLV)){

  $viajeblq               = [];
  $viajem                 = [];
  $cad_countries          = "";
  $cad_visas              = "";
  $cad_dates              = "";
  $cad_hotels             = "";
  $cad_hotels_comp        = "";
  $cad_cities             = "";
  $cad_airlines           = "";
  $cad_departures         = "";
  $array_imagen           = [];


   $viaje         = Travel::where('mt', '=', $CLV)->first();
   $airlines_gral = Airline::all();
   $visas_gral    = Visa::all();


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
             $array_imagen = ['<div>
             <a class="blq_img">
                 <img src="https://mng.xbloq.com/manager/admin/images/travels/'.$imagen->name.'" alt="'.$imagen->description.'" title="'.$imagen->description.'">
             </a>
             </div>'];
         }
     }

   $viajem = [
                       "mt"             => $viaje['mt'],
                       "name"           => $viaje['name'],
                       "days"           => $viaje['days'],
                       "nights"         => $viaje['nights'],
                       "taxes"          => number_format($viaje['taxes']),
                       "departure_date" => $viaje['departure_date'],
                       "include"        => $viaje['include'],
                       "not_include"    => $viaje['not_include'],
                       "itinerary"      => $viaje['itinerary'],
                       "currency"       => $viaje['currency'],
                       "room_type"      => $viaje['room_type'],
                       "image"          => $array_imagen,
                       "price_from"     => number_format($viaje['price_from']),
                       "price_table"    => $viaje['price_table'],
                       "hotels_table"   => $viaje['hotels_table'],
                       "operator"       => $viaje['operator'],
                       "circuit"        => $viaje['circuit'],
                       "array_cities"   => $viaje->cities,
                       "cities"         => $cad_cities,
                       "array_countries" => $viaje->countries,
                       "countries"      => $cad_countries,
                       "airlines"       => $cad_airlines,
                       "validity"       => $viaje['validity'],
                       "status"         => $viaje['status'],
                       "type"           => "regular",
                     ];
                     if($viajem['status'] == 0)
                     {
                       return "MT Inactivo";
                     }
  }
  elseif( $viaje == null )
  {
  // API Bloqueo
  $viajeblq = $this->get_data( url('https://www.megatravel.com.mx/tester/detail/'.$CLV) );
  $viajeblq = json_decode($viajeblq,true);

  if(isset($viajeblq['code']))
  {
    return "MT Inactivo";
  }
  else{

    $date_item_departure = [];
    foreach ($viajeblq['departures'] as $date_departure) {
        $date_item_departure[] = smartdate($date_departure['date']);
    }

    $date_item_departure2 = [];
  foreach ($date_item_departure as $item_departure) {
        $date_item_departure2[] = explode(".",$item_departure);
    }


    //Cadenas de mes
    $cad_ene = "";
    $cad_feb = "";
    $cad_mar = "";
    $cad_abr = "";
    $cad_may = "";
    $cad_jun = "";
    $cad_jul = "";
    $cad_ago = "";
    $cad_sep = "";
    $cad_oct = "";
    $cad_nov = "";
    $cad_dic = "";


    //recorre arreglo de fechas y crea una cadena para cada mes
  foreach ($date_item_departure2 as $item_departure2) {

  if( $item_departure2[0] == "Ene" ){
             $cad_ene .= $item_departure2[1].", ";
        }
        elseif( $item_departure2[0] == "Feb" ){
             $cad_feb .= $item_departure2[1].", ";
        }
        else if( $item_departure2[0] == "Mar" ){
             $cad_mar .= $item_departure2[1].", ";
        }
        else if( $item_departure2[0] == "Abr" ){
             $cad_abr .= $item_departure2[1].", ";
        }
        else if( $item_departure2[0] == "May" ){
             $cad_may .= $item_departure2[1].", ";
        }
        else if( $item_departure2[0] == "Jun" ){
             $cad_jun .= $item_departure2[1].", ";
        }
        else if( $item_departure2[0] == "Jul" ){
             $cad_jul .= $item_departure2[1].", ";
        }
        else if( $item_departure2[0] == "Ago" ){
             $cad_ago .= $item_departure2[1].", ";
        }
        else if( $item_departure2[0] == "Sept" ){
             $cad_sep .= $item_departure2[1].", ";
        }
        else if( $item_departure2[0] == "Oct" ){
             $cad_oct .= $item_departure2[1].", ";
        }
        else if( $item_departure2[0] == "Nov" ){
             $cad_nov .= $item_departure2[1].", ";
        }
        else if( $item_departure2[0] == "Dic" ){
             $cad_dic .= $item_departure2[1].", ";
        }

    }

      //valida que cadena de mes tienen no esta vacío y lo guarda en cadena general
      if( $cad_ene != "" ){
            $cad_departures .= "<br>Enero: ".$cad_ene;
           $cad_departures = substr($cad_departures, 0, -2);
        }
        if( $cad_feb != "" ){
             $cad_departures .= "<br>Febrero: ".$cad_feb;
           $cad_departures = substr($cad_departures, 0, -2);
        }
        if( $cad_mar != "" ){
             $cad_departures .= "<br>Marzo: ".$cad_mar;
           $cad_departures = substr($cad_departures, 0, -2);
        }
        if( $cad_abr != "" ){
             $cad_departures .= "<br>Abril: ".$cad_abr;
           $cad_departures = substr($cad_departures, 0, -2);
        }
        if( $cad_may != "" ){
             $cad_departures .= "<br>Mayo: ".$cad_may;
           $cad_departures = substr($cad_departures, 0, -2);
        }
        if( $cad_jun != "" ){
             $cad_departures .= "<br>Junio: ".$cad_jun;
           $cad_departures = substr($cad_departures, 0, -2);
        }
        if( $cad_jul != "" ){
             $cad_departures .= "<br>Julio: ".$cad_jul;
           $cad_departures = substr($cad_departures, 0, -2);
        }
        if( $cad_ago != "" ){
             $cad_departures .= "<br>Agosto: ".$cad_ago;
           $cad_departures = substr($cad_departures, 0, -2);
        }
        if( $cad_sep != "" ){
             $cad_departures .= "<br>Septiembre: ".$cad_sep;
           $cad_departures = substr($cad_departures, 0, -2);
        }
        if( $cad_oct != "" ){
             $cad_departures .= "<br>Octubre: ".$cad_oct;
           $cad_departures = substr($cad_departures, 0, -2);
        }
        if( $cad_nov != "" ){
             $cad_departures .= "<br>Noviembre: ".$cad_nov;
           $cad_departures = substr($cad_departures, 0, -2);
        }
        if( $cad_dic != "" ){
             $cad_departures .= "<br>Diciembre: ".$cad_dic;
           $cad_departures = substr($cad_departures, 0, -2);
        }


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
$array_imagen = ['<div>
        <a class="blq_img">
            <img src="'.$viajeblq["image"].'" alt="'.$viajeblq['name'].'" title="'.$viajeblq['name'].'">
        </a>
        </div>'];

//vigencia
$cad_vigencia = "Precios vigentes hasta el ".$viajeblq["expire"];



//recorre catalogo general de aerolineas
foreach ($airlines_gral as $cat_airlines) {

   if( $cat_airlines->code_iata == $viajeblq['airline_code'] ){
        //arma cadena de aerolineas blqueo
        //$cad_airlines .= '<img class="img-fluid lazyload" src="https://mng.xbloq.com/manager/admin/images/airlines/'.$cat_airlines->img_airline.'" alt="'.$cat_airlines->airline.'">';
        $cad_airlines .= '<img class="img-fluid lazyload" src="https://mng.xbloq.com/manager/admin/images/airlines/iata/'.$cat_airlines->code_iata.'.png" alt="'.$cat_airlines->airline.'">';
   }
}


  $viajem = [
                      "mt"                    => $viajeblq['clv'],
                      "name"                  => $viajeblq['name'],
                      "days"                  => $viajeblq['days'],
                      "nights"                => $viajeblq['nights'],
                      "price_from"            => number_format($viajeblq['from']),
                      "taxes"                 => number_format($viajeblq['taxes']),
                      "departure_date"        => $cad_departures,
                      "bloqueos"              => $cad_dates,
                      "include"               => $viajeblq['include_yes'],
                      "not_include"           => $viajeblq['include_not'],
                      "itinerary"             => $viajeblq['itinerary'],
                      "currency"              => $viajeblq['currency_code'],
                      "room_type"             => $viajeblq['room_type'],
                      "image"                 => $array_imagen,
                      "price_table"           => $viajeblq['list_prices'],
                      "hotels_table"          => $cad_hotels_comp,
                      "operator"              => "",
                      "circuit"               => "",
                      "array_cities"          => $viajeblq['cities'],
                      "cities"                => $cad_cities,
                      "array_countries"       => $viajeblq['countries'],
                      "countries"             => $cad_countries,
                      "validity"              => $cad_vigencia,
                      "airlines"              => $cad_airlines,
                      "price_table"           => $viajeblq['list_prices'],
                      "department"            => $viajeblq['destination'],
                      "status"                => 1,
                      "type"                  => "bloqueo",
                    ];
                  }
                }
              }else{
                  return "No existe MT";
                }

      return view('admin.tools.circuito', compact('viajem', 'fontFamily', 'Dominio', 'Dominioviaja', 'txtColor', 'thBG', 'thTxColor'));
    }

    public function Ofertasblq(Request $request)
    {
      $Dest = $request['Dest'];

      //CSS
      $fontId 	   	= $request['ff'];
      $txtColor 		= $request['txtColor'];
      $lblTPaq		  = $request['lblTPaq'];
      $lblTRange		= $request['lblTRange'];
      $lblNumRange	= $request['lblNumRange'];
      $itemBack		  = $request['ItemBack'];
      $itemHov		  = $request['ItemHov'];
      $txtColorHov	= $request['txtColorHov'];
      $lblTPaqHov		= $request['lblTPaqHov'];
      $Dominio	    = $request['domi'];
      $Dominioviaja = $request['domiviaja'];


      $thBG         = $request['thBG'];
      $thTxColor    = $request['thTxColor'];


    //Font
    	if (!$fontId) { $fontId = 1; }
    	$fontKind = array(	"", "Arial, sans-serif", "Verdana, sans-serif", "Trebuchet MS, sans-serif",
    						"Gill Sans, sans-serif",  "Georgia, sans-serif", "Comic Sans MS, sans-serif",
    						"Lucida Sans Unicode, sans-serif", "Times New Roman, sans-serif",
    						"'Century Gothic', sans-serif", "'Coustard', serif", "'Roboto', sans-serif", "'Roboto Slab', sans-serif" );
    	$fontFamily = $fontKind [$fontId];


      //Defaults
      if ($txtColor    =="")   { $txtColor= "000000"; 	}
      if ($lblTPaq     =="") 	   { $lblTPaq="00b3ff"; 	}
      if ($lblTRange   =="")   { $lblTRange="00b3ff";   }
      if ($lblNumRange =="") { $lblNumRange="ff7200";   }
      if ($itemBack    =="")    { $itemBack="eeeeee";   }
      if ($itemHov     =="") 	   { $itemHov="2c3e50";   }
      if ($txtColorHov =="") { $txtColorHov="ffffff";   }
      if ($lblTPaqHov  =="")  { $lblTPaqHov = $lblTPaq; }

      $ofertasblq             = [];
      $viajeoferta            = [];
      $cad_cities             = "";
      $cad_airlines           = "";
      $array_imagen           = [];
      $min_price              = 0;
      $max_price              = 0;
      $min_duration           = 0;
      $max_duration           = 0;
      $array_duration         = [];
      $array_price            = [];


      $viajeoferta = $this->get_data( url('https://www.megatravel.com.mx/tester/'));
      $viajeoferta = json_decode($viajeoferta,true);


      /*rellena colección con bloqueos*/
      foreach ($viajeoferta['data'] as $viajeoferta) {

        //cadena cities
        if( is_array($viajeoferta['cities']) )
        {

            //dd($viajeblq['cities']);
            foreach ($viajeoferta['cities'] as $item_city) {
                 $cad_cities .= $item_city['name'].", ";
            }
            //limpia último & de la cadena de bloqueos
            $cad_cities = substr($cad_cities, 0, -2);

        }
        else
        {
            //dd($viajeblq['cities']);
            $cad_cities     = $viajeoferta['cities'];
            $search_guion   = array(' - ', ' -', '- ');
            $replace_guion  = array(', ', ', ', ', ');
            $cad_cities     = str_replace($search_guion, $replace_guion, $cad_cities);
        }

        //cadena imagen
        $array_imagen = ['<div>
                <a class="blq_img">
                    <img src="'.$viajeoferta["image"].'" alt="'.$viajeoferta['name'].'" title="'.$viajeoferta['name'].'">
                </a>
                </div>'];


      $ofertasblq[$viajeoferta['clv']] = [
                          "mt"                    => $viajeoferta['clv'],
                          "name"                  => $viajeoferta['name'],
                          "days"                  => $viajeoferta['days'],
                          "nights"                => $viajeoferta['nights'],
                          "price_from"            => number_format($viajeoferta['from']),
                          "taxes"                 => number_format($viajeoferta['taxes']),
                          "currency"              => $viajeoferta['currency_code'],
                          "array_cities"          => $viajeoferta['cities'],
                          "cities"                => $cad_cities,
                          "image"                 => $array_imagen,
                          "status"                => 1,
                          "type"                  => "bloqueo",
                        ];
                      }

            foreach ($ofertasblq as $viajeoferta) {
              $array_price   []    = $viajeoferta['price_from'];
              $array_duration[]    = $viajeoferta['days'];
            }

            if( !empty($array_price) && !empty($array_duration)  )
            {
                $minDias    = min($array_duration);
                $maxDias    = max($array_duration);
                $minFare    = min($array_price);
                $maxFare    = max($array_price);
            }



/*******************************************************************************
*Compara el id recibido y trae el code del department para concatenar con la url
*******************************************************************************/
if (isset($Dest)) {

              $ofertasblq             = [];
              $viajeoferta            = [];
              $cad_cities             = "";
              $cad_airlines           = "";
              $array_imagen           = [];
              $min_price              = 0;
              $max_price              = 0;
              $min_duration           = 0;
              $max_duration           = 0;
              $array_duration         = [];
              $array_price            = [];

/*******************************************************************************
*Compara el id recibido y trae el code del department para concatenar con la url
*******************************************************************************/
             $api = Department::select('id', 'code')->get();
             foreach($api as $a)
             {
             if($a->id == $Dest){$find_api_department =  $a->code;}
             }

/*******************************************************************************
*Conecta con api de bloqueos
*******************************************************************************/
              $viajeoferta = $this->get_data( url('https://www.megatravel.com.mx/tester/destination/'.$find_api_department.'') );
              $viajeoferta = json_decode($viajeoferta,true);

              /*rellena colección con bloqueos*/
              foreach ($viajeoferta['data'] as $viajeoferta) {

              //cadena cities
              if( is_array($viajeoferta['cities']) )
              {
              //dd($viajeblq['cities']);
              foreach ($viajeoferta['cities'] as $item_city) {
                   $cad_cities .= $item_city['name'].", ";
              }
              //limpia último & de la cadena de bloqueos
              $cad_cities = substr($cad_cities, 0, -2);
              }
              else
              {
              //dd($viajeblq['cities']);
              $cad_cities     = $viajeoferta['cities'];
              $search_guion   = array(' - ', ' -', '- ');
              $replace_guion  = array(', ', ', ', ', ');
              $cad_cities     = str_replace($search_guion, $replace_guion, $cad_cities);
              }

              //cadena imagen
              $array_imagen = ['<div>
              <a class="blq_img">
                  <img src="'.$viajeoferta["image"].'" alt="'.$viajeoferta['name'].'" title="'.$viajeoferta['name'].'">
              </a>
              </div>'];


              $ofertasblq[] = [
                                  "mt"                    => $viajeoferta['clv'],
                                  "name"                  => $viajeoferta['name'],
                                  "days"                  => $viajeoferta['days'],
                                  "nights"                => $viajeoferta['nights'],
                                  "price_from"            => $viajeoferta['from'],
                                  "taxes"                 => number_format($viajeoferta['taxes']),
                                  "currency"              => $viajeoferta['currency_code'],
                                  "array_cities"          => $viajeoferta['cities'],
                                  "cities"                => $cad_cities,
                                  "image"                 => $array_imagen,
                                  "status"                => 1,
                                  "type"                  => "bloqueo",
                                ];
                              }

            foreach ($ofertasblq as $viajeoferta) {
              $array_price   []    = $viajeoferta['price_from'];
              $array_duration[]    = $viajeoferta['days'];
            }

            if( !empty($array_price) && !empty($array_duration)  )
            {
                $minDias    = min($array_duration);
                $maxDias    = max($array_duration);
                $minFare    = min($array_price);
                $maxFare    = max($array_price);
            }



    }
    else{

    }

      return view('admin.tools.ofertas-viaje', compact('ofertasblq', 'Dest', 'thBG','thTxColor','fontFamily','fontId','txtColor','itemBack','lblTPaq','lblTRange','lblNumRange','itemHov','txtColorHov','lblTPaqHov','Dominio','Dominioviaja', 'maxFare', 'minFare', 'maxDias', 'minDias'));

    }

}
