<?php

//namespace App\Http\ControllersWeb;
namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCambio extends Model
{
/*******************************************************************************
*Conexión remota, siempre tiene que ser con la variable $connection
*******************************************************************************/
  protected $connection = 'db3';

/*******************************************************************************
*Se va conectar a la tabla tipo_cambio, si no se agrega, buscara la
*tabla  tipo_cambios
*******************************************************************************/
  protected $table = "tipo_cambio";

}
