<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Multimedia;
use App\MultimediaTravel;
use App\Http\Controllers\Controller;

class BloqueoController extends Controller
{
    public function __construct()
    {
      $this->middleware('permission:bloqueos.index')->only('index');
      $this->middleware('permission:bloqueos.edit')->only(['edit', 'update']);
    }

    public function index(Request $request)
    {
      //$bloqueo = \DB::table('multimedia_travel')->select('*')->get();

      return view('admin.bloqueos.index');
    }

    public function mt(Request $request)
    {
      

      $bloqueo = MultimediaTravel
      ::join('multimedia', 'multimedia.id', '=', 'multimedia_travel.multimedia_id')
      ->select('multimedia.id','multimedia.name',
               'multimedia_travel.id AS multimedia_travel_id','multimedia_travel.bloqueo_mt', 'multimedia_travel.multimedia_id')
      ->whereNotNull('multimedia_travel.bloqueo_mt');

       

      return datatables()
      ->eloquent($bloqueo)
      ->addColumn('btn', 'admin.bloqueos.actions')
      ->rawColumns(['btn'])
      ->toJson();
              

    }

    public function edit($mt)
    {
      $bloqueo   = \DB::table('multimedia_travel')->where('id', $mt)->first();
      $multimedia = Multimedia::all();

      return view('admin.bloqueos.edit', compact('bloqueo', 'multimedia'));
    }

    public function update(Request $request, $mt)
    {
      $bloqueo = \DB::table('multimedia_travel')->where('id', $mt)
      ->update([
                'bloqueo_mt'    => $request['bloqueo_mt'],
                'multimedia_id' => $request['multimedia_id'],
                'multimedia_id_2' => $request['multimedia_id_2']
              ]);

      return redirect()->route('bloqueos.index')->with('info', 'MT actualizado con éxito');
    }
}
