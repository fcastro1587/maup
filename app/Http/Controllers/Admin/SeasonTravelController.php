<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SeasonTravelStoreRequest;
use App\Http\Requests\SeasonTravelUpdateRequest;
use App\SeasonTravel;
use App\Season;
use App\Multimedia;
use App\Http\Controllers\Controller;

class SeasonTravelController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:season_travel.create')->only(['create', 'store']);
        $this->middleware('permission:season_travel.index')->only('index');
        $this->middleware('permission:season_travel.edit')->only(['edit', 'update']);
        $this->middleware('permission:seasontravel.list')->only('list');
    }

    public function index(Request $request)
    {
      $seastravel = SeasonTravel::where('season_code_season', '=', 'BLO' )
                                 ->orwhere('season_code_season', '=', 'OTOINV' )
                                 ->orwhere('season_code_season', '=', 'FAV' )
                                 ->orwhere('season_code_season', '=', 'PRO' )->get();
      $season     = Season::all();

      return view('admin.seasontravels.index', compact('seastravel', 'season'));
    }

    public function create()
    {
      $multi   = Multimedia::all();
      $season  = Season::all();

      return view('admin.seasontravels.create', compact('multi', 'season'));
    }

    public function store(SeasonTravelStoreRequest $request)
    {
        //almacenar
        $multi = SeasonTravel::create($request->all());

        return redirect()->route('season_travel.index')->with('info', 'Programa creado con exito');
    }


    public function list($season)
    {
      $seas = SeasonTravel::where('season_code_season',  $season)
                           ->where('home', 1)
                           ->orderby('active_item', 'desc')
                           ->orderby('order_item', 'asc')
                           ->get();

      return view('admin.seasontravels.list', compact('seas'));
    }

    public function edit($id)
    {
      $seas    = SeasonTravel::find($id);
      $multi   = Multimedia::all();
      $season  = Season::where('code_season', '=', 'BLO' )
                                 ->orwhere('code_season', '=', 'OTOINV' )
                                 ->orwhere('code_season', '=', 'FAV' )
                                 ->orwhere('code_season', '=', 'PRO' )->get();

      return view('admin.seasontravels.edit', compact('seas', 'multi', 'season'));
    }

    public function update(SeasonTravelUpdateRequest $request, $id)
    {
      //dd($request->all());
      $season = SeasonTravel::find($id);

      $season->fill($request->all())->save();

      return redirect()->route('seasontravel.list', $season->season_code_season)->with('info', 'MT actualizado con éxito');
    }

    public function show()
    {

    }

    public function destroy($id)
    {
      $seastrave  = SeasonTravel::find($id)->delete();

      return back()->with('info', 'Mt borrado de la sección ');
    }
}
