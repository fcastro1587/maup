<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\TipoCambio;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
Use Exception;

class AdminTController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function admin()
  {
    $tipo = TipoCambio::orderBy('f_dia', 'desc')->first();

    setlocale(LC_ALL, 'es_ES');
    $fecha = Carbon::parse($tipo->f_dia);
    $fecha = $fecha->formatLocalized('%A %d de %B de %G');

    return view('admin.tc.tc-form', compact('fecha','tipo'));
  }


  public function FormTC(Request $request)
  {
  	$tipo 	 = "";
  	$status  = "";
  	$subject = "";

  	$fecha  = date('Y-m-d');
	  setlocale(LC_ALL, 'es_ES');
    $fecha_large = Carbon::parse($fecha);
    $fecha_large = $fecha_large->formatLocalized('%A %d de %B de %G');
  	$subject = $fecha_large;
  	$subject = ucwords($subject);

  	if( !is_numeric($request['date']) || empty($request['date']) ){
        return redirect('/admintc')->with('status', 'Ingresa dato numérico.');
    }
    else
    {
	    $tipo = $request['date'];
		try
		{
		//Inserta registro
	    $conn = DB::connection('db3');
	    $save = $conn->table('tipo_cambio')->insert([
	          'f_dia'        => $fecha,
	          'tcambio'      => $tipo
	    ]);
		}
		catch(QueryException $ex)
		{
		  //dd($ex->getMessage('Error'));
		  return redirect('/admintc')->with('status', 'Error al guardar.');
		}
    }
    try
    {
        Mail::send('admin.tc.tc-template-mail',["fecha_large"=>$fecha_large, "tipo"=>$tipo], function($msj) use ($subject){
            $msj->subject('Tipo de cambio '.$subject);
            $msj->to('web2.meca@gmail.com')
                ->Bcc('fcastro@megatravel.com.mx');
          });
    }
    catch(QueryException $ex)
    {
        return redirect('/admintc')->with('status', 'Error al enviar.');
    }

	  //Session::flash('message','Mensaje enviado correctamente 1');
	  return redirect('/admintc')->with('status', 'Solicitud enviada correctamente');
  }


}
