<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use File;
use Validator;
use App\Multimedia;
use App\MultimediaTravel;
use App\Country;
use App\Header;
use App\City;
use App\RecommendedDepartment;
use App\SeasonTravel;
use App\Department;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class UploadFilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:upload-files.create')->only(['create', 'store']);
        $this->middleware('permission:upload-files.index')->only('index');
        $this->middleware('permission:upload-files.show')->only('show');
        $this->middleware('permission:upload-files.edit')->only(['edit', 'update']);
    }

    public function index()
    {

        if (request()->ajax()) {

            $season = SeasonTravel
                ::join('multimedia', 'multimedia.id', '=', 'season_travels.multimedia_id_1')
                ->select(
                    'multimedia.id',
                    'multimedia.name',
                    'season_travels.id AS season_travel_id',
                    'season_travels.order_item'
                )
                ->where('season_travels.season_code_season', 'PRO')
                ->orderby('season_travel_id', 'desc');

            return datatables()
                ->eloquent($season)
                ->addColumn('btn', 'admin.uploadfile.partials.actions')
                ->rawColumns(['btn'])
                ->toJson();
        }

        return view('admin.uploadfile.megaofertas');
    }

    public function indexdetalle()
    {
        if (request()->ajax()) {

            $season = MultimediaTravel
                ::join('multimedia', 'multimedia.id', '=', 'multimedia_travel.multimedia_id')
                ->select(
                    'multimedia.id',
                    'multimedia.name',
                    'multimedia_travel.id AS season_travel_id',
                    'multimedia_travel.travel_mt',
                    'multimedia_travel.bloqueo_mt'
                )
                ->orderby('season_travel_id', 'desc');

            return datatables()
                ->eloquent($season)
                ->addColumn('btn', 'admin.uploadfile.partials.actions')
                ->rawColumns(['btn'])
                ->toJson();
        }
        return view('admin.uploadfile.detalle');
    }

    public function indexpanoramic()
    {
        if (request()->ajax()) {

            $season = Header
                ::join('multimedia', 'multimedia.id', '=', 'headers.img')
                ->select(
                    'multimedia.id',
                    'multimedia.name',
                    'headers.id AS season_travel_id',
                    'headers.header_mt',
                    'headers.bloqueo_mt',
                    'headers.header_department',
                    'headers.order'
                )
                ->orderby('header_department', 'desc');

            return datatables()
                ->eloquent($season)
                ->addColumn('btn', 'admin.uploadfile.partials.actions')
                ->rawColumns(['btn'])
                ->toJson();
        }
        return view('admin.uploadfile.panoramic');
    }

    public function indextemporada()
    {
        if (request()->ajax()) {

            $season = SeasonTravel
                ::join('multimedia', 'multimedia.id', '=', 'season_travels.multimedia_id_2')
                ->select(
                    'multimedia.id',
                    'multimedia.name',
                    'season_travels.id AS season_travel_id',
                    'season_travels.order_item'
                )
                ->where('season_travels.season_code_season', 'OTOINV')
                ->orderby('season_travel_id', 'desc');

            return datatables()
                ->eloquent($season)
                ->addColumn('btn', 'admin.uploadfile.partials.actions')
                ->rawColumns(['btn'])
                ->toJson();
        }

        return view('admin.uploadfile.temporadas');
    }

    public function indexblq()
    {
        if (request()->ajax()) {

            $season = SeasonTravel
                ::join('multimedia', 'multimedia.id', '=', 'season_travels.multimedia_id_3')
                ->select(
                    'multimedia.id',
                    'multimedia.name',
                    'season_travels.id AS season_travel_id',
                    'season_travels.order_item'
                )
                ->where('season_travels.season_code_season', 'BLO')
                ->where('active_item', 1)
                ->orderby('season_travel_id', 'desc');

            return datatables()
                ->eloquent($season)
                ->addColumn('btn', 'admin.uploadfile.partials.actions')
                ->rawColumns(['btn'])
                ->toJson();
        }

        return view('admin.uploadfile.blq');
    }

    public function indexfav()
    {
        if (request()->ajax()) {

            $season = SeasonTravel
                ::join('multimedia', 'multimedia.id', '=', 'season_travels.multimedia_id_4')
                ->select(
                    'multimedia.id',
                    'multimedia.name',
                    'season_travels.id AS season_travel_id',
                    'season_travels.order_item'
                )
                ->where('season_travels.season_code_season', 'FAV')
                ->where('active_item', 1)
                ->orderby('season_travel_id', 'desc');

            return datatables()
                ->eloquent($season)
                ->addColumn('btn', 'admin.uploadfile.partials.actions')
                ->rawColumns(['btn'])
                ->toJson();
        }

        return view('admin.uploadfile.fav');
    }

    public function indexrecommended()
    {
        if (request()->ajax()) {
            $season = RecommendedDepartment
                ::join('multimedia', 'multimedia.id', '=', 'recommended_departments.multimedia_id_1')
                ->select(
                    'multimedia.id',
                    'multimedia.name',
                    'recommended_departments.id AS season_travel_id',
                    'recommended_departments.travel_mt',
                    'recommended_departments.bloqueo_mt',
                    'recommended_departments.code_department',
                    'recommended_departments.order_item'
                )
                ->where('recommended_departments.active_item', 1)
                ->orderby('season_travel_id', 'desc');

            return datatables()
                ->eloquent($season)
                ->addColumn('btn', 'admin.uploadfile.partials.actions')
                ->rawColumns(['btn'])
                ->toJson();
        }
    }

    public function detalle($var)
    {
        $countries = Country::orderby('name_country', 'asc')
            ->pluck('name_country', 'code_iata');

        $cities    = City::orderby('name', 'asc')
            ->pluck('name', 'id');

        return view('admin.uploadfile.detalle', compact('var', 'countries', 'cities'));
    }

    public function panoramic()
    {
        return view('admin.uploadfile.panoramic');
    }

    public function megaofertas($var)
    {
        return view('admin.uploadfile.megaofertas', compact('var'));
    }

    public function temporadas($var)
    {
        $countries = Country::orderby('name_country', 'asc')
            ->pluck('name_country', 'code_iata');

        $cities    = City::orderby('name', 'asc')
            ->pluck('name', 'id');

        return view('admin.uploadfile.temporadas', compact('var', 'countries', 'cities'));
    }

    public function blq($var)
    {
        $countries = Country::orderby('name_country', 'asc')
            ->pluck('name_country', 'code_iata');

        $cities    = City::orderby('name', 'asc')
            ->pluck('name', 'id');

        return view('admin.uploadfile.blq', compact('var', 'countries', 'cities'));
    }

    public function fav($var)
    {
        $countries = Country::orderby('name_country', 'asc')
            ->pluck('name_country', 'code_iata');

        $cities    = City::orderby('name', 'asc')
            ->pluck('name', 'id');

        return view('admin.uploadfile.fav', compact('var', 'countries', 'cities'));
    }

    public function recommended($var)
    {
        $department   = Department::orderby('code', 'asc')->pluck('name', 'code');

        return view('admin.uploadfile.recommended', compact('var', 'department'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        switch ($request['type']) {
            case "1";
                $rules = array(
                    'image'           => 'required|image|max:2048',
                    'imagemosaico'    => 'required|image|max:2048',
                    'description'     => 'required',
                    'country'         => 'required',
                    'city'           => 'required'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                if ($request->hasFile('image') || $request->hasFile('imagemosaico')) {
                    $image     = $request->file('image');
                    $new_name  = $image->getClientOriginalName();
                    $imagem    = $request->file('imagemosaico');

                    Storage::disk('sftp')->put('public_html/images/destinos/home/megaofertases/' . $new_name . '', fopen($image, 'r+'));
                    Storage::disk('sftp')->put('public_html/images/destinos/home/megaofertases/responsive/' . $new_name . '', fopen($imagem, 'r+'));
                }

                $multiple = array(
                    'name'          =>  $new_name,
                    'title'         =>  'default-image',
                    'country'       =>  $request->country,
                    'city'          =>  $request->city,
                    'description'   =>  $request->description,
                    'size'          =>  '844x474',
                    'type'          =>  $request->type,
                );
                Multimedia::create($multiple);

                $image = Multimedia::where('name', $new_name)
                    ->where('type', 1)->first();

                $multi = array(
                    'travel_mt'               =>  $request->travel_mt,
                    'bloqueo_mt'              =>  $request->bloqueo_mt,
                    'multimedia_id'           =>  $image->id,
                );
                MultimediaTravel::create($multi);

                return response()->json(['success' => 'Imagen y MT agregado correctamente']);
                break;

            case "2";
                $rules = array(
                    'title'           => 'required',
                    'image'           => 'required|image|max:2048',
                    'imagemosaico'    => 'required'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }
                $image                = $request->file('image');
                $name                 = $image->getClientOriginalName();

                $fileother            = $request->file('imagemosaico');
                $nameother            = $fileother->getClientOriginalName();

                switch ($request['title']) {
                    case "europa";
                        $name                 = "viaje-a-europa.jpg";
                        break;

                    case "canada";
                        $name                 = "viaje-a-canada.jpg";
                        break;

                    case "usa";
                        $name                 = "viajes-a-estados-unidos.jpg";
                        break;

                    case "mexico";
                        $name                 = "viajes-por-mexico.jpg";
                        break;

                    case "sudamerica";
                        $name                 = "viajes-a-sudamerica.jpg";
                        break;

                    case "camerica";
                        $name                 = "viajes-a-centroamerica.jpg";
                        break;

                    case "caribe";
                        $name                 = "viajes-al-caribe.jpg";
                        break;

                    case "pacifico";
                        $name                 = "viajes-por-el-pacifico.jpg";
                        break;

                    case "moriente";
                        $name                 = "viajes-a-medio-oriente.jpg";
                        break;

                    case "asia";
                        $name                 = "viajes-por-asia.jpg";
                        break;

                    case "africa";
                        $name                 = "viajes-por-africa.jpg";
                        break;

                    case "edeportivo";
                        $name                 = "viajes-a-eventos-especiales.jpg";
                        break;

                    case "cruceros";
                        $name                 = "cruceros.jpg";
                        break;

                    case "exoticos";
                        $name                 = "viajes-exoticos-y-a-la-medida.jpg";
                        break;

                    case "jviajera";
                        $name                 = "viajes-para-jovenes.jpg";
                        break;

                    case "lmiel";
                        $name                 = "viajes-de-luna-de-miel.jpg";
                        break;

                    case "quinceaneras";
                        $name                 = "viajes-para-quinceaneras.jpg";
                        break;
                }

                $nameother            = $name;

                $img = Multimedia::where('name', $name)
                    ->where('type', 2)->first();

                $form_data = array(
                    'header_mt'          => $request->travel_mt,
                    'bloqueo_mt'         => $request->bloqueo_mt,
                    'header_department'  => $request->title,
                    'img'                => $img->id,
                    'order'              => '1',
                    'active_head'        => '1',
                );
                Header::create($form_data);

                Storage::disk('sftp')->put('public_html/images/destinos/home/megaofertases/' . $name . '', fopen($image, 'r+'));
                Storage::disk('sftp')->put('public_html/images/destinos/home/megaofertases/responsive/' . $nameother . '', fopen($fileother, 'r+'));

                return response()->json(['success' => 'Imagen panoramica agregada correctamente']);
                break;

            case "4";
                $rules = array(
                    'order_item'      => 'required',
                    'multimedia_id_1' => 'required',
                    'image'           => 'required|image|max:2048'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $image    = $request->file('image');
                $new_name = $image->getClientOriginalName();
                Storage::disk('sftp')->put('public_html/images/destinos/home/megaofertases/' . $new_name . '', fopen($image, 'r+'));

                $form_data = array(
                    'travel_mt'               =>  $request->travel_mt,
                    'bloqueo_mt'              =>  $request->bloqueo_mt,
                    'season_code_season'      =>  'PRO',
                    'home'                    =>  '1',
                    'multimedia_id_1'         =>  $request->multimedia_id_1,
                    'order_item'              =>  $request->order_item,
                    'active_item'             =>  '1',
                );
                SeasonTravel::create($form_data);
                return response()->json(['success' => 'Oferta agregada correctamente']);
                break;

            case "5";
                $rules = array(
                    'order_item'      => 'required',
                    'description'     => 'required',
                    'country'         => 'required',
                    'city'            => 'required',
                    'image'           => 'required|image|max:2048'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $image    = $request->file('image');
                $new_name = $image->getClientOriginalName();
                Storage::disk('sftp')->put('public_html/images/destinos/home/megaofertases/' . $new_name . '', fopen($image, 'r+'));

                $multiple = array(
                    'name'          =>  $new_name,
                    'title'         =>  'otono-invierno',
                    'country'       =>  $request->country,
                    'city'          =>  $request->city,
                    'description'   =>  $request->description,
                    'size'          =>  '267x160',
                    'type'          =>  $request->type,
                );
                Multimedia::create($multiple);

                $image = Multimedia::where('name', $new_name)
                    ->where('type', 5)->first();

                $season = array(
                    'travel_mt'               =>  $request->travel_mt,
                    'bloqueo_mt'              =>  $request->bloqueo_mt,
                    'season_code_season'      =>  'OTOINV',
                    'home'                    =>  '1',
                    'multimedia_id_2'         =>  $image->id,
                    'order_item'              =>  $request->order_item,
                    'active_item'             =>  '1',
                );
                SeasonTravel::create($season);

                return response()->json(['success' => 'Se ha agregado a la sección OTOÑO INVIERNO']);
                break;

            case "6";
                $rules = array(
                    'order_item'      => 'required',
                    'description'     => 'required',
                    'country'         => 'required',
                    'city'            => 'required',
                    'image'           => 'required|image|max:2048'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $image    = $request->file('image');
                $new_name = $image->getClientOriginalName();
                Storage::disk('sftp')->put('public_html/images/destinos/home/megaofertases/' . $new_name . '', fopen($image, 'r+'));

                $multiple = array(
                    'name'          =>  $new_name,
                    'title'         =>  'bloqueo',
                    'country'       =>  $request->country,
                    'city'          =>  $request->city,
                    'description'   =>  $request->description,
                    'size'          =>  '291x384',
                    'type'          =>  $request->type,
                );
                Multimedia::create($multiple);

                $image = Multimedia::where('name', $new_name)
                    ->where('type', 6)->first();

                $season = array(
                    'travel_mt'               =>  $request->travel_mt,
                    'bloqueo_mt'              =>  $request->bloqueo_mt,
                    'season_code_season'      =>  'BLO',
                    'home'                    =>  '1',
                    'multimedia_id_3'         =>  $image->id,
                    'order_item'              =>  $request->order_item,
                    'active_item'             =>  '1',
                );
                SeasonTravel::create($season);

                return response()->json(['success' => 'Se ha agregado a la sección de BLOQUEOS']);
                break;

            case "11";
                $rules = array(
                    'department'      => 'required',
                    'image'           => 'required|image|max:2048'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $image    = $request->file('image');
                $new_name = $image->getClientOriginalName();
                $name     = $new_name;


                switch ($request['department']) {
                    case "europa";
                        $name                 = "europa.jpg";
                        $label                = "Europa";
                        break;

                    case "canada";
                        $name                 = "canada.jpg";
                        $label                = "Canadá";
                        break;

                    case "usa";
                        $name                 = "usa.jpg";
                        $label                = "Estados Unidos";
                        break;

                    case "mexico";
                        $name                 = "mexico.jpg";
                        $label                = "México";
                        break;

                    case "sudamerica";
                        $name                 = "sudamerica.jpg";
                        $label                = "Sudamérica";
                        break;

                    case "camerica";
                        $name                 = "centroamerica.jpg";
                        $label                = "Centroamérica";
                        break;

                    case "caribe";
                        $name                 = "caribe.jpg";
                        $label                = "Caribe";
                        break;

                    case "pacifico";
                        $name                 = "pacifico.jpg";
                        $label                = "Pacífico";
                        break;

                    case "moriente";
                        $name                 = "medio-oriente.jpg";
                        $label                = "Medio Oriente";
                        break;

                    case "asia";
                        $name                 = "asia.jpg";
                        $label                = "Asia";
                        break;

                    case "africa";
                        $name                 = "africa.jpg";
                        $label                = "África";
                        break;

                    case "edeportivo";
                        $name                 = "edeportivo.jpg";
                        $label                = "Mega en vivo";
                        break;

                    case "cruceros";
                        $name                 = "cruceros.jpg";
                        $label                = "Cruceros";
                        break;

                    case "exoticos";
                        $name                 = "exoticos.jpg";
                        $label                = "Exóticos";
                        break;

                    case "jviajera";
                        $name                 = "jviajera.jpg";
                        $label                = "Juvi";
                        break;
                }

                $recom = Multimedia::where('name', $name)
                    ->where('type', 11)->first();


                Storage::disk('sftp')->put('public_html/images/destinos/home/megaofertases/recomend/' . $name . '', fopen($image, 'r+'));


                $recom = array(
                    'code_department'   =>  $request->department,
                    'travel_mt'         =>  $request->travel_mt,
                    'bloqueo_mt'        =>  $request->bloqueo_mt,
                    'multimedia_id_1'   =>  $recom->id,
                    'label_department'  =>  $label,
                    'active_item'       =>  '1',
                    'order_item'        =>  '0',
                );
                RecommendedDepartment::create($recom);
                return response()->json(['success' => 'Se ha agregado correctamente']);
                break;

            case "12";
                $rules = array(
                    'order_item'      => 'required',
                    'descriptionfav'  => 'required',
                    'country'         => 'required',
                    'city'            => 'required',
                    'image'           => 'required|image|max:2048'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $image    = $request->file('image');
                $new_name = $image->getClientOriginalName();
                Storage::disk('sftp')->put('public_html/images/destinos/home/megaofertases/' . $new_name . '', fopen($image, 'r+'));

                $multiple = array(
                    'name'          =>  $new_name,
                    'title'         =>  'favoritos',
                    'country'       =>  $request->country,
                    'city'          =>  $request->city,
                    'description'   =>  $request->description,
                    'size'          =>  '291x384',
                    'type'          =>  $request->type,
                );
                Multimedia::create($multiple);

                $image = Multimedia::where('name', $new_name)
                    ->where('type', 12)->first();

                $season = array(
                    'travel_mt'               =>  $request->travel_mt,
                    'bloqueo_mt'              =>  $request->bloqueo_mt,
                    'season_code_season'      =>  'FAV',
                    'home'                    =>  '1',
                    'multimedia_id_4'         =>  $image->id,
                    'order_item'              =>  $request->order_item,
                    'active_item'             =>  '1',
                );
                SeasonTravel::create($season);

                return response()->json(['success' => 'Se ha agregado a la sección de FAVORITOS']);
                break;
        } //fin switch
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destro($id)
    {
        $data = SeasonTravel::findOrFail($id);
        $data->delete();
    }

    public function destromt($id)
    {
        $data = MultimediaTravel::findOrFail($id);
        $data->delete();
    }

    public function destropanoramic($id)
    {
        $data = Header::findOrFail($id);
        $data->delete();
    }

    public function destrorecomended($id)
    {
        $data = RecommendedDepartment::findOrFail($id);
        $data->delete();
    }
}
