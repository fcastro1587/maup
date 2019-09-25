<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::get('viaje', function(){
  return datatables()
  ->eloquent(App\Travel::query())

  ->addColumn('action', function($row) {
      return '
       <a href="http://mng.sysmega.net/manager/admin/viaje/'. $row->id .'" class="btn btn-success">Ver</a>'.
      '<a href="http://mng.sysmega.net/manager/admin/viaje/'. $row->id .'/edit" class="btn btn-default">Editar</a>';
  })->make(true);


});*/


/*Route::get('viaje', function() {
  $depto =  Auth::user()->department;
  dd($depto);
      $viaje = Travel::where('department', '=', $depto);

    return datatables()
    ->eloquent($viaje)
    ->addColumn('btn', 'actions')
    ->rawColumns(['btn'])
    ->toJson();
});*/
