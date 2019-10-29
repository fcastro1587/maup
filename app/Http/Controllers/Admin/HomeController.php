<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\TravStoreRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TravUpdateRequest;
use App\Travel;
use App\Department;
use App\Room;
use App\Currency;
use App\Airline;
use App\Country;
use App\City;
use App\Multimedia;
use App\Tour;
use App\Season;
use App\Section;
use App\Filter;
use App\Visa;
use App\Operator;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('permission:viaje.create')->only(['create', 'store']);
    $this->middleware('permission:viaje.index')->only('index');
    $this->middleware('permission:viaje.show')->only('show');
    $this->middleware('permission:viaje.edit')->only(['edit', 'update']);
  }

  public function tags(Request $request)
  {
    return Multimedia::where('name', 'LIKE', '%' . $request['q'] . '%')->paginate(10);
  }

  public function index(Request $request)
  {
    return view('admin/travels.index');
  }

  public function viaje(Request $request)
  {
    $depto =  Auth::user()->department;

    $viajes = Travel
      ::join('departments', 'departments.code', '=', 'travels.department')
      ->select(
        'travels.id', 
        'travels.mt', 
        'travels.days',
        'travels.nights',
        'travels.name as name_mt', 
        'travels.department', 
        'travels.validity',
        'travels.status',
        'departments.name'
      );

    if ($depto <> 'admin') {
      $viajes->where('department', '=', $depto);
    }

    return datatables()
      ->eloquent($viajes)
      ->addColumn('btn', 'admin.travels.actions')
      ->rawColumns(['btn'])
      ->toJson();
  }

  public function load()
  {
    return view('admin.travels.welcome');
  }

  public function img(Request $request)
  {
    $search = $request['q'];

    $data = Multimedia::select(['id', 'name', 'description'])
      ->where('name', 'like', '%' . $search . '%')
      ->paginate(30);

    return response()
      ->json([
        'items'      => $data->toArray()['data'],
        'pagination' => $data->nextPageUrl() ? true : false
      ]);
  }

  public function alert(Request $request)
  {
    return view('admin.alert.index', compact('viaje'));
  }

  public function datalert()
  {
    $alert = Travel::select('id', 'mt', 'name', 'department', 'validity')
      ->where('status', 1)
      ->whereRaw('validity <= curdate()');

    return datatables()
      ->eloquent($alert)
      ->addColumn('btn', 'admin.alert.actions')
      ->rawColumns(['btn'])
      ->toJson();
  }

  public function create()
  {
    $rooms           = Room::all();
    $currencies      = Currency::orderby('currency_travels', 'desc')->get();
    $airlines        = Airline::all();
    $countries       = Country::all();
    $multimedia      = Multimedia::select('*')
      ->where('type', '=', 1)
      ->orWhere('video_type', '=', 1)
      ->orWhere('video_type', '=', 2)
      ->get();

    $cities          = City::all();
    $season          = Season::select('*')
      ->where('code_season', '<>', 'BLO')
      ->where('code_season', '<>', 'CONCVIVO')
      ->where('code_season', '<>', 'DEPVIVO')
      ->where('code_season', '<>', 'EDE')
      ->where('code_season', '<>', 'EURNAVIDAD')
      ->where('code_season', '<>', 'INV')
      ->where('code_season', '<>', 'MEJVIVO')
      ->where('code_season', '<>', 'NAVIDAD')
      ->where('code_season', '<>', 'OTO')
      ->where('code_season', '<>', 'RECVIVO')
      ->where('code_season', '<>', 'SEM')
      ->where('code_season', '<>', 'TEAVIVO')
      ->where('code_season', '<>', 'TICKVIVO')
      ->get();
    return view('admin/travels.create', compact('rooms', 'currencies', 'airlines', 'countries', 'cities', 'multimedia', 'season'));
  }

  public function store(TravStoreRequest $request)
  {
    //almacenar
    $viaje = Travel::create($request->all());
    $viaje->sections()->attach($request->get('section'));
    $viaje->airlines()->attach($request->get('airline'));
    $viaje->countries()->attach($request->get('countri'));
    $viaje->cities()->attach($request->get('cities'));
    $viaje->multimedia()->attach($request->get('video'));
    $viaje->seasons()->attach($request->get('season'));
    $viaje->tours()->attach($request->get('tours'));
    $viaje->filters()->attach($request->get('filter'));

    return redirect()->route('viaje.index')->with('info', 'Programa creado con exito');
  }

  public function show($id)
  {
    //detalle del programa
    $viaje      = Travel::find($id);
    $room       = Room::all();
    $tours       = Tour::all();

    //dd($cities->modeloCiudad);
    return view('admin.travels.show', compact('viaje', 'room', 'tours'));
  }

  public function edit($id)
  {
    //muestra la vista
    $viaje           = Travel::find($id);
    $deparment       = Department::all();
    $rooms           = Room::all();
    $currencies      = Currency::orderby('currency_travels', 'desc')
      ->get();

    $airlines        = Airline::all();
    $countries       = Country::all();
    $multimedia      = Multimedia::select('*')
      ->where('type', '=', 1)
      ->orWhere('video_type', '=', 1)
      ->orWhere('video_type', '=', 2)
      ->get();

    $cities          = City::all();
    $season          = Season::select('*')
      ->where('code_season', '<>', 'BLO')
      ->where('code_season', '<>', 'CONCVIVO')
      ->where('code_season', '<>', 'DEPVIVO')
      ->where('code_season', '<>', 'EDE')
      ->where('code_season', '<>', 'EURNAVIDAD')
      ->where('code_season', '<>', 'INV')
      ->where('code_season', '<>', 'MEJVIVO')
      ->where('code_season', '<>', 'NAVIDAD')
      ->where('code_season', '<>', 'OTO')
      ->where('code_season', '<>', 'RECVIVO')
      ->where('code_season', '<>', 'SEM')
      ->where('code_season', '<>', 'TEAVIVO')
      ->where('code_season', '<>', 'TICKVIVO')
      ->get();

    $section         = Section::all();
    $tour            = Tour::all();
    $opera           = Operator::all();

    return view('admin.travels.edit', compact('viaje', 'deparment', 'rooms', 'currencies', 'airlines', 'countries', 'cities', 'multimedia', 'season', 'section', 'tour', 'opera'));
  }

  public function countries($id)
  {
    return City::where('country_id', $id)->get();
  }

  public function destination($id)
  {
    return Section::where('operator_id', $id)->get();
  }

  public function range($range)
  {
    $departamento = Department::all();

    foreach ($departamento as $status) {
      if ($range >= $status->initial_range and $range <= $status->final_range) {
        return "<option value=" . $status->code . ">" . $status->name . "</option>";
      }
    }
    if ($range != $status->initial_range and $range != $status->final_range) {
      return "<option>Este MT no pertenece a ningun departamento</option>";
    }
  }

  public function mtec($ec)
  {
    $department = Department::all();
    $opera      = Operator::all();

    $mtec = [];
    foreach ($department as $depto) {
      if ($ec >= $depto->initial_range  and $ec <= $depto->final_range) {
        foreach ($opera as $oper) {
          if ($oper->code_department == $depto->code) {
            $mtec[] = "<option value=" . $oper->code . ">" . $oper->name . "</option>";
          }
          if ($oper->code_department == "MEGA") {
            $mtec[] = "<option value=" . $oper->code . ">" . $oper->name . "</option>";
          }
        }
      }
    }
    return $mtec;
  }

  public function filters_sections($filters_eumcp)
  {
    $department = Department::all();
    $section    = Section::all();

    $secmt = [];
    foreach ($department as $depto) {
      if ($filters_eumcp >= $depto->initial_range and $filters_eumcp <= $depto->final_range) {
        foreach ($section as $sec) {
          if ($sec->departament_code == $depto->code) {
            $secmt[] = "<option value=" . $sec->id . ">" . $sec->name . "</option>";
          }
        }
      }
    }

    return $secmt;
  }

  public function toursmt($tourmt)
  {
    $department = Department::all();
    $tour    = Tour::all();

    $toumt = [];
    foreach ($department as $depto) {
      if ($tourmt >= $depto->initial_range and $tourmt <= $depto->final_range) {
        foreach ($tour as $tou) {
          if ($tou->department == $depto->code) {
            $toumt[] = "<option value=" . $tou->id . ">" . $tou->title . "</option>";
          }
        }
      }
    }

    return $toumt;
  }

  public function check(Request $request, $id)
  {
    return $id;
    $viaje = Travel::find($id);
    $viaje->status = $request->status;
    $viaje->save();
  }

  public function panoramica($panoramica)
  {
    echo '
      <script type="text/javascript">
          $(document).ready(function() {
          $(".image2").click(function () {
            var imagenes = $(this).val();
            $("#multi_opt_user .close").click();
            $("#nombre3").val(imagenes);
      });
      });
      </script>
      ';
    $ciudades            = str_replace(' - ', ',', $panoramica);      /*reemplaza por coma*/
    $ciudades            = str_replace(' - ', ',', $ciudades);        /*reemplaza por coma*/
    $ciudades            = str_replace(' Y ', ',', $ciudades);        /*reemplaza por coma*/
    $ciudades            = str_replace(' y ', ',', $ciudades);        /*reemplaza por coma*/
    $sacapalabraciud     = explode(',', $ciudades);                   /* saca las palabras del array*/
    $totalpalabrasciud   = count($sacapalabraciud);                   /* cuenta las palabras*/
    for ($i = 0; $i < $totalpalabrasciud; $i++) {                     /* usando for */
      $sacapalabraciud[$i];
      $Ciudad = Multimedia::where('city', 'like', "%{$sacapalabraciud[$i]}%")->where('type', 1)->get();
      foreach ($Ciudad as $ci) {
        echo $html = '
      <div style="width: 33.333333%; display: block; float: left; height: 200px; padding: 5px; box-sizing: border-box;">
      <img style="border-radius: 15px; width: 100%; height: 180px;" src="http://mng.xbloq.com/admin/images/travels/' . $ci->name . '">
      <br>
      <input style="border: 0px; cursor: pointer; text-align: center; color: red; font-weight: bold; width: 100%;" type="text" class="image2" value="' . $ci->name . '">
      </div>
      ';
      }
    }
  }

  public function update(Request $request, $id)
  {


    #array para enviar dos imagenes solo hay que replicar otro if
    /*$sync_images = [];
      if ($request->get('countri'))
      $sync_images[] = $request->get('countri');
      /*
      if ($request->get('video'))
      $sync_images[] = $request->get('video');*/

    $viaje_delete = Travel::find($id);
    $viaje_delete->countries()->detach();
    $viaje_delete->cities()->detach();

    //actualiza los datos
    $viaje = Travel::find($id);
    $viaje->airlines()->sync($request->get('airline'));
    /*$viaje->countries()->sync($sync_images);*/
    $viaje->countries()->attach($request->get('countri'));
    $viaje->cities()->attach($request->get('cities'));
    $viaje->multimedia()->sync($request->get('video'));
    $viaje->seasons()->sync($request->get('season'));
    $viaje->sections()->sync($request->get('section'));
    $viaje->tours()->sync($request->get('tours'));
    $viaje->fill($request->all())->save();
    return redirect()->route('viaje.index')->with('info', 'programa actualizado correctamente');
  }

  public function destroy(Request $request)
  {
    $viaje    = Travel::findOrFail($request->viaje_id);
    $viaje->delete();
    return back();
  }
}
