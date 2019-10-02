<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\FileStoreRequest;
use File;
use App\Travel;
use App\Multimedia;
use App\SeasonTravel;
use App\Header;
use App\Country;
use App\City;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class FilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:files.createupload')->only(['createupload', 'store']);
        $this->middleware('permission:files.index')->only('index');
        $this->middleware('permission:files.show')->only('show');
        $this->middleware('permission:files.edit')->only(['edit', 'update']);
    }

    /*******************************************************************************
     *
     *Función para la conexion de la api y traer bloqueos
     *
     *******************************************************************************/
    public function get_data($url)
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function createupload($var)
    {
        $countries = Country::orderby('name_country', 'asc')
            ->pluck('name_country', 'code_iata');

        $cities    = City::orderby('name', 'asc')
            ->pluck('name', 'id');

        $season = SeasonTravel::where('season_code_season', 'PRO')->where('home', 1)->paginate();

        return view('admin.images.createupload', compact('countries', 'cities', 'var', 'season'));
    }

    public function destruirmt(Request $request, $id)
    {
        if ($request->ajax()) {
            $product = SeasonTravel::FindOrFail($id);
            $product->delete();
            $products_total = SeasonTravel::all()->count();

            return response()->json([
                'total'   => $products_total,
                'message' => $product->id."fue eliminado",
            ]);
        }
    }

    public function store(FileStoreRequest $request)
    {

        //variables  
        $clv        = $request['mt'];
        $destino    = $request['title'];
        $tipo       = $request['type'];


        //imagenes
        $file       = $request->file('upload_image');
        $fileother  = $request->file('uploadsmall');



        //array para 7(listado por depto) y 8(slide rprincipal)
        if ($request['name'])              $sync_name[1]    = $request['name'];
        if ($request['small'])             $sync_name[2]    = $request['small'];

        if ($request['title'])             $sync_title[1]   = $request['title'];
        if ($request['titleother'])        $sync_title[2]   = $request['titleother'];

        if ($request['country'])           $sync_country[1] = $request['country'];
        if ($request['countryother'])      $sync_country[2] = $request['countryother'];

        if ($request['city'])              $sync_city[1]    = $request['city'];
        if ($request['cityother'])         $sync_city[2]    = $request['cityother'];

        if ($request['description'])       $sync_des[1]     = $request['description'];
        if ($request['descriptionother'])  $sync_des[2]     = $request['descriptionother'];

        if ($request['size'])              $sync_size[1]    = $request['size'];
        if ($request['sizeother'])         $sync_size[2]    = $request['sizeother'];

        if ($request['type'])              $sync_type[1]    = $request['type'];
        if ($request['typeother'])         $sync_type[2]    = $request['typeother'];




        if ($tipo == 2) {
            if (isset($clv)) {
                Header::where('header_department', $destino)->delete();
                $viaje         = Travel::where('mt', '=', $clv)->first();

                if ($destino == 'europa') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '3105',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '3105',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viaje-a-europa.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'canada') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '2553',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '2553',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viaje-a-canada.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'usa') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '2560',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '2560',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viajes-a-estados-unidos.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'mexico') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '2547',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '2547',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viajes-por-mexico.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'sudamerica') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '2556',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '2556',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viajes-a-sudamerica.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'camerica') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '1713',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '1713',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viajes-a-centroamerica.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'caribe') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '1343',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '1343',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viajes-al-caribe.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'pacifico') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '916',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '916',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viajes-por-el-pacifico.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'moriente') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '2670',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '2670',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viajes-a-medio-oriente.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'asia') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '3132',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '3132',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viajes-por-asia.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'africa') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '2555',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '2555',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viajes-por-africa.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'edeportivo') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '3067',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '3067',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viajes-a-eventos-especiales.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'cruceros') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '2542',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '2542',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "cruceros.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'exoticos') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '3068',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '3068',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viajes-exoticos-y-a-la-medida.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'jviajera') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '2623',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '2623',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viajes-para-jovenes.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'lmiel') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '2550',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '2550',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viajes-de-luna-de-miel.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'quinceaneras') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '2765',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '2765',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viajes-para-quinceaneras.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                } elseif ($destino == 'desdecancun') {
                    if ($viaje != null) {
                        Header::create([
                            'header_mt'          => $clv,
                            'header_department'  => $destino,
                            'img'                => '2945',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    } elseif ($viaje == null) {
                        $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/' . $clv);
                        $blq = json_decode($blq, true);
                        if (isset($blq['code'])) {
                            return "MT Inactivo";
                        } else {
                            Header::create([
                                'bloqueo_mt'         => $clv,
                                'header_department'  => $destino,
                                'img'                => '2945',
                                'order'              => '1',
                                'active_head'        => '1',
                            ]);
                        }
                    }
                    $name                 = $file->getClientOriginalName();
                    $name                 = "viajes-con-salidas-desde-cancun.jpg";
                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                }
                Storage::disk('sftp')->put('public_html/images/deptos' . $name . '', fopen($file, 'r+'));
                Storage::disk('sftp')->put('public_html/images/deptos/responsive/' . $nameother . '', fopen($fileother, 'r+'));

                //Storage::disk('sftp')->put('public_html/test/' . $name . '', fopen($file, 'r+'));
                //Storage::disk('sftp')->put('public_html/test/responsive/' . $nameother . '', fopen($fileother, 'r+'));
            }
        }
        //Mega Ofertas
        elseif ($tipo == 4) {
            if ($request->hasFile('upload_image')) {
                foreach ($request->file('upload_image') as $filemega) {
                    $namemega = $filemega->getClientOriginalName();
                    Storage::disk('sftp')->put('public_html/images/destinos/home/megaofertas/' . $namemega . '', fopen($filemega, 'r+'));
                }
            }

            if (isset($clv)) {
                foreach ($clv as $mt) {
                    $viaje         = Travel::where('mt', '=', $mt)->first();
                    SeasonTravel::create([
                        'travel_mt'          => $viaje->mt,
                        'season_code_season' => 'PRO',
                        'home'               => '1',
                        'orden_item'         =>  $request['orden'],
                        'active_item'        => '1',
                    ]);
                }
            }
        }


        /* 
        //Recomendados, aparece en cada MT
        elseif ($request['type'] == 11) {
            if ($request->hasFile('upload_image')) {
                foreach ($request->file('upload_image') as $filesrec) {
                    $namerec = $filesrec->getClientOriginalName();
                    Storage::disk('sftp')->put('public_html/images/recommend/' . $namerec . '', fopen($filesrec, 'r+'));
                }
            }
        }
        //Imagen en listado de cada departamento
        elseif ($request['type'] == 7) {
            if ($request->hasFile('upload_image') || $request->hasFile('uploadsmall')) {
                $name      = $files->getClientOriginalName();
                $nameother = $fileother->getClientOriginalName();
                Storage::disk('sftp')->put('public_html/images/destinos/banner-depto/' . $destino . '/' . $name . '', fopen($files, 'r+'));
                Storage::disk('sftp')->put('public_html/images/destinos/banner-depto/' . $destino . '/' . $nameother . '', fopen($fileother, 'r+'));
            }
            Multimedia::create([
                'name'        => $sync_name[1],
                'title'       => $sync_title[1],
                'country'     => $sync_country[1],
                'city'        => $sync_city[1],
                'description' => $sync_des[1],
                'size'        => $sync_size[1],
                'type'        => $sync_type[1],
            ]);

            Multimedia::create([
                'name'        => $sync_name[2],
                'title'       => $sync_title[2],
                'country'     => $sync_country[2],
                'city'        => $sync_city[2],
                'description' => $sync_des[2],
                'size'        => $sync_size[2],
                'type'        => $sync_type[2],
            ]);
        }
        //Slider principal Home
        elseif ($request['type'] == 8) {
            if ($request->hasFile('upload_image') || $request->hasFile('uploadsmall')) {
                $name      = $files->getClientOriginalName();
                $nameother = $fileother->getClientOriginalName();
                Storage::disk('sftp')->put('public_html/images/slider-home/' . $name . '', fopen($files, 'r+'));
                Storage::disk('sftp')->put('public_html/images/slider-home/320x340/' . $nameother . '', fopen($fileother, 'r+'));
            }
            Multimedia::create([
                'name'        => $sync_name[1],
                'title'       => $sync_title[1],
                'country'     => $sync_country[1],
                'city'        => $sync_city[1],
                'description' => $sync_des[1],
                'size'        => $sync_size[1],
                'type'        => $sync_type[1],
            ]);

            Multimedia::create([
                'name'        => $sync_name[2],
                'title'       => $sync_title[2],
                'country'     => $sync_country[2],
                'city'        => $sync_city[2],
                'description' => $sync_des[2],
                'size'        => $sync_size[2],
                'type'        => $sync_type[2],
            ]);
        }*/

        return redirect()->route('file.index')->with('info', 'Imagen cargada');
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

    public function destroy(Request $request, $id)
    {
        //
    }
}
