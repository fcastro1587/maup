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
use App\Banner;
use App\City;
use App\RecommendedDepartment;
use App\SeasonTravel;
use App\Department;
use App\MainCarousel;
use App\CarouselTravel;
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
                ->orderby('season_travels.order_item', 'ASC');

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

    public function indexlistado()
    {
        if (request()->ajax()) {

            $season = Banner
                ::join('multimedia', 'multimedia.id', '=', 'banners.img1')
                ->select(
                    'multimedia.id',
                    'multimedia.name',
                    'banners.id AS season_travel_id',
                    'banners.banner_department',
                    'banners.img1',
                    'banners.status'
                )
                ->orderby('season_travel_id', 'desc');

            return datatables()
                ->eloquent($season)
                ->addColumn('btn', 'admin.uploadfile.partials.actions')
                ->rawColumns(['btn'])
                ->toJson();
        }
        return view('admin.uploadfile.panoramic');
    }

    public function indexhomeslider()
    {

        if (request()->ajax()) {

            $season = MainCarousel
                ::join('multimedia', 'multimedia.id', '=', 'main_carousels.multimedia_id_1')
                ->select(
                    'multimedia.id',
                    'multimedia.name',
                    'main_carousels.id AS season_travel_id',
                    'main_carousels.bloqueo_mt',
                    'main_carousels.order_item'
                )
                ->where('main_carousels.active_item', 1)
                ->orderby('season_travel_id', 'desc');

            return datatables()
                ->eloquent($season)
                ->addColumn('btn', 'admin.uploadfile.partials.actions')
                ->rawColumns(['btn'])
                ->toJson();
        }

        return view('admin.uploadfile.homeslider');
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
                    'season_travels.order_item',
                    'season_travels.travel_mt',
                    'season_travels.bloqueo_mt'
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
                    'season_travels.bloqueo_mt',
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
                    'season_travels.order_item',
                    'season_travels.travel_mt',
                    'season_travels.bloqueo_mt'
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


    public function indexdeptos()
    {
        if (request()->ajax()) {
            $season = CarouselTravel
                ::join('multimedia', 'multimedia.id', '=', 'carousel_travels.multimedia_id')
                ->select(
                    'multimedia.id',
                    'multimedia.name',
                    'carousel_travels.id AS season_travel_id',
                    'carousel_travels.carousel_travel_mt',
                    'carousel_travels.bloqueo_mt',
                    'carousel_travels.carousel_travel_code',
                    'carousel_travels.order',
                    'carousel_travels.active'
                )
                ->where('carousel_travels.active', 1)
                ->where('active', 1)
                ->orderby('season_travel_id', 'desc');

            return datatables()
                ->eloquent($season)
                ->addColumn('btn', 'admin.uploadfile.partials.actions')
                ->rawColumns(['btn'])
                ->toJson();
        }

        return view('admin.uploadfile.deptos');
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

    public function homeslider($var)
    {
        $countries = Country::orderby('name_country', 'asc')
            ->pluck('name_country', 'code_iata');

        $cities    = City::orderby('name', 'asc')
            ->pluck('name', 'id');

        return view('admin.uploadfile.homeslider', compact('var', 'countries', 'cities'));
    }

    public function megaofertas($var)
    {
        $countries = Country::orderby('name_country', 'asc')
            ->pluck('name_country', 'code_iata');

        $cities    = City::orderby('name', 'asc')
            ->pluck('name', 'id');

        return view('admin.uploadfile.megaofertas', compact('var', 'countries', 'cities'));
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

    public function deptos($var)
    {
        $countries  = Country::orderby('name_country', 'asc')
            ->pluck('name_country', 'code_iata');

        $cities     = City::orderby('name', 'asc')
            ->pluck('name', 'id');

        $department = Department::orderby('code', 'asc')->pluck('name', 'code');

        return view('admin.uploadfile.deptos', compact('var', 'countries', 'cities', 'department'));
    }

    public function listado($var)
    {
        $countries  = Country::orderby('name_country', 'asc')
            ->pluck('name_country', 'code_iata');

        $cities     = City::orderby('name', 'asc')
            ->pluck('name', 'id');

        return view('admin.uploadfile.listado', compact('var',  'countries', 'cities'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        switch ($request['type']) {

                //Carrusel principal de la página
            case "main";
                $rules =  array(
                    'image'                  => 'required|image|max:500',
                    'imageresponsive'        => 'required',
                    'description'            => 'required',
                    'country'                => 'required',
                    'city'                   => 'required'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $image      = $request->file('image');
                $new_name   = $image->getClientOriginalName();
                $new_name  = pathinfo($new_name, PATHINFO_FILENAME);
                $new_name  = str_slug($new_name);
                $new_name  = $new_name . '_' . uniqid() .'.jpg';

                $imager     = $request->file('imageresponsive');
                $new_namer  = $imager->getClientOriginalName();
                $new_namer  = pathinfo($new_namer, PATHINFO_FILENAME);
                $new_namer  = str_slug($new_namer);
                $new_namer  = $new_namer . '_' . uniqid() .'.jpg';

                Storage::disk('sftp')->put('public_html/images/slider-home/' . $new_name . '', fopen($image, 'r+'));
                Storage::disk('sftp')->put('public_html/images/slider-home/320x340/' . $new_namer . '', fopen($imager, 'r+'));

                $multiple1 = array(
                    'name'          =>  $new_name,
                    'title'         =>  $request->description,
                    'country'       =>  $request->country,
                    'city'          =>  $request->city,
                    'description'   =>  $request->description,
                    'size'          =>  '1700x566',
                    'type'          =>  '8',
                );
                Multimedia::create($multiple1);

                $multiple2 = array(
                    'name'          =>  $new_namer,
                    'title'         =>  $request->description,
                    'country'       =>  $request->country,
                    'city'          =>  $request->city,
                    'description'   =>  $request->description,
                    'size'          =>  '320x400',
                    'type'          =>  '10',
                );
                Multimedia::create($multiple2);


                $multi2 = Multimedia::where('name', $new_name)
                    ->where('type', 8)->first();


                $multi3 = Multimedia::where('name', $new_namer)
                    ->where('type', 10)->first();

                $main2 = array(
                    'travel_mt'         =>  $request->travel_mt,
                    'bloqueo_mt'        =>  $request->bloqueo_mt,
                    'multimedia_id_1'   =>  $multi2->id,
                    'multimedia_id_2'   =>  $multi3->id,
                    'order_item'        =>  '1',
                    'active_item'       =>  '1',
                );
                MainCarousel::create($main2);

                return response()->json(['success' => 'Oferta agregada correctamente al Slider de Home']);

                break;

                //detalle y mosaico
            case "1";
                $rules = array(
                    'image'           => 'required|image|max:300',
                    'imagemosaico'    => 'required',
                    'description'     => 'required',
                    'country'         => 'required',
                    'city'            => 'required'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                if ($request->hasFile('image') || $request->hasFile('imagemosaico')) {
                    $image     = $request->file('image');
                    $new_name  = $image->getClientOriginalName();
                    $new_name  = pathinfo($new_name, PATHINFO_FILENAME);
                    $new_name  = str_slug($new_name);
                    $new_name  = $new_name . '_' . uniqid() . '.jpg';

                    $imagem    = $request->file('imagemosaico');

                    Storage::disk('sftp')->put('public_html/images/covers/' . $new_name . '', fopen($image, 'r+'));
                    Storage::disk('sftp')->put('public_html/images/thumbnails/' . $new_name . '', fopen($imagem, 'r+'));
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

                //panoramica por departamento
            case "2";
                $rules = array(
                    'title'             => 'required',
                    'image'             => 'required|image|max:600',
                    'imageresponsive'   => 'required'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }
                $image                = $request->file('image');
                $name                 = $image->getClientOriginalName();

                $fileother            = $request->file('imageresponsive');
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

                Storage::disk('sftp')->put('public_html/images/deptos/' . $name . '', fopen($image, 'r+'));
                Storage::disk('sftp')->put('public_html/images/deptos/responsive/' . $name . '', fopen($fileother, 'r+'));

                return response()->json(['success' => 'Imagen panoramica agregada correctamente']);
                break;

                //destacados por departamento
            case "3";
                $rules = array(
                    'image'           => 'required|image|max:100',
                    'description'     => 'required',
                    'country'         => 'required',
                    'city'            => 'required',
                    'title'           => 'required',
                    'order'           => 'required'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $image     = $request->file('image');
                $new_name  = $image->getClientOriginalName();
                $new_name  = pathinfo($new_name, PATHINFO_FILENAME);
                $new_name  = str_slug($new_name);
                $new_name  = $new_name . '_' . uniqid() .  '.jpg';

                Storage::disk('sftp')->put('public_html/images/destinos/promos/' . $request->title . '/' . $new_name . '', fopen($image, 'r+'));

                $multiple = array(
                    'name'          =>  $new_name,
                    'title'         =>  $request->title,
                    'country'       =>  $request->country,
                    'city'          =>  $request->city,
                    'description'   =>  $request->description,
                    'size'          =>  '230x300',
                    'type'          =>  $request->type,
                );
                Multimedia::create($multiple);

                $image = Multimedia::where('name', $new_name)
                    ->where('type', 3)->first();

                $carousel = array(
                    'carousel_travel_mt'      =>  $request->travel_mt,
                    'bloqueo_mt'              =>  $request->bloqueo_mt,
                    'carousel_travel_code'    =>  $request->title,
                    'order'                   =>  $request->order,
                    'active'                  =>  '1',
                    'multimedia_id'           =>  $image->id
                );
                CarouselTravel::create($carousel);

                return response()->json(['success' => 'Banner agregado correctamente a su destino']);
                break;

                //megaofertas
            case "4";
                $rules = array(
                    'order_item'      => 'required',
                    'image'           => 'required|image|max:2048',
                    'description'     => 'required',
                    'country'         => 'required',
                    'city'            => 'required'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $image    = $request->file('image');
                $new_name = $image->getClientOriginalName();
                Storage::disk('sftp')->put('public_html/images/destinos/home/megaofertas/' . $new_name . '', fopen($image, 'r+'));

                $delete = Multimedia::where('name', $new_name)
                    ->where('type', 4)
                    ->first();
                $delete->delete();

                $multi = array(
                    'name'          =>  $new_name,
                    'title'         =>  'megaofertas',
                    'country'       =>  $request->country,
                    'city'          =>  $request->city,
                    'description'   =>  $request->description,
                    'size'          =>  '256x278',
                    'type'          =>  $request->type,
                );
                Multimedia::create($multi);

                $multi = Multimedia::where('name', $new_name)
                    ->where('type', 4)
                    ->first();

                $form_data = array(
                    'travel_mt'               =>  $request->travel_mt,
                    'bloqueo_mt'              =>  $request->bloqueo_mt,
                    'season_code_season'      =>  'PRO',
                    'home'                    =>  '1',
                    'multimedia_id_1'         =>  $multi->id,
                    'order_item'              =>  $request->order_item,
                    'active_item'             =>  '1',
                );
                SeasonTravel::create($form_data);


                return response()->json(['success' => 'Oferta agregada correctamente']);
                break;

                //Temporada otono-invierno
            case "5";
                $rules = array(
                    'order_item'      => 'required',
                    'description'     => 'required',
                    'country'         => 'required',
                    'city'            => 'required',
                    'image'           => 'required|image|max:50'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $image    = $request->file('image');
                $new_name = $image->getClientOriginalName();
                $new_name  = pathinfo($new_name, PATHINFO_FILENAME);
                $new_name  = str_slug($new_name);
                $new_name  = $new_name . '_' . uniqid() .  '.jpg';

                Storage::disk('sftp')->put('public_html/images/destinos/home/otono-invierno/' . $new_name . '', fopen($image, 'r+'));

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
                    ->where('title', 'otono-invierno')
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

                //Banners bloqueos
            case "6";
                $rules = array(
                    'order_item'      => 'required',
                    'description'     => 'required',
                    'country'         => 'required',
                    'city'            => 'required',
                    'image'           => 'required|image|max:60'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $image    = $request->file('image');
                $new_name = $image->getClientOriginalName();
                $new_name  = pathinfo($new_name, PATHINFO_FILENAME);
                $new_name  = str_slug($new_name);
                $new_name  = $new_name . '_' . uniqid() .  '.jpg';

                Storage::disk('sftp')->put('public_html/images/destinos/home/bloqueo/' . $new_name . '', fopen($image, 'r+'));

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

                //listado
            case "7";
                $rules =  array(
                    'image'                  => 'required|image|max:70',
                    'imageresponsive'        => 'required',
                    'title'                  => 'required',
                    'description'            => 'required'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $image      = $request->file('image');
                $new_name   = $image->getClientOriginalName();
                $new_name  = pathinfo($new_name, PATHINFO_FILENAME);
                $new_name  = str_slug($new_name);
                $new_name  = $new_name . '_' . uniqid() . '.jpg';

                $imager     = $request->file('imageresponsive');
                $new_namer  = $imager->getClientOriginalName();
                $new_namer  = pathinfo($new_namer, PATHINFO_FILENAME);
                $new_namer  = str_slug($new_namer);
                $new_namer  = $new_namer .  '_' . uniqid() . '.jpg';

                Storage::disk('sftp')->put('public_html/images/destinos/banner-depto/' . $request->title . '/' . $new_name . '', fopen($image, 'r+'));
                Storage::disk('sftp')->put('public_html/images/destinos/banner-depto/' . $request->title . '/' . $new_namer . '', fopen($imager, 'r+'));

                $multiple1 = array(
                    'name'          =>  $new_name,
                    'title'         =>  $request->description,
                    'country'       =>  $request->country,
                    'city'          =>  $request->city,
                    'description'   =>  $request->description,
                    'size'          =>  '665x330',
                    'type'          =>  '7',
                );
                Multimedia::create($multiple1);

                $multiple2 = array(
                    'name'          =>  $new_namer,
                    'title'         =>  $request->description,
                    'country'       =>  $request->country,
                    'city'          =>  $request->city,
                    'description'   =>  $request->description,
                    'size'          =>  '307x480',
                    'type'          =>  '7',
                );
                Multimedia::create($multiple2);


                $banner1 = Multimedia::where('name', $new_name)
                    ->where('type', 7)->first();


                $banner3 = Multimedia::where('name', $new_namer)
                    ->where('type', 7)->first();

                $banner = array(
                    'img1'              =>  $banner1->id,
                    'img2'              =>  $banner3->id,
                    'banner_department' =>  $request->title,
                    'travel_mt'         =>  $request->travel_mt,
                    'days'              =>  $request->days,
                    'price_from'        =>  $request->price_from,
                    'departure'         =>  $request->departure,
                    'alt'               =>  $request->description,
                    'url'               =>  $request->url,
                    'status'            => '1',
                );
                Banner::create($banner);

                return response()->json(['success' => 'Banner agregado correctamente al listado']);

                break;

            case "11";
                $rules = array(
                    'department'      => 'required',
                    'image'           => 'required|image|max:60'
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


                Storage::disk('sftp')->put('public_html/images/recommend/' . $name . '', fopen($image, 'r+'));


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
                    'image'           => 'required|image|max:70'
                );

                $error = Validator::make($request->all(), $rules);

                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $image    = $request->file('image');
                $new_name = $image->getClientOriginalName();
                Storage::disk('sftp')->put('public_html/images/destinos/home/favoritos/' . $new_name . '', fopen($image, 'r+'));

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

    public function destromain($id)
    {
        $data = MainCarousel::findOrFail($id);
        $data->delete();
    }

    public function destrodeptos($id)
    {
        $data = CarouselTravel::findOrFail($id);
        $data->delete();
    }

    public function destrolistado($id)
    {
        $data = Banner::findOrFail($id);
        $data->delete();
    }
}
