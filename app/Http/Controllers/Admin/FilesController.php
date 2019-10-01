<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use File;
use App\Travel;
use App\Multimedia;
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
        $countries = Country::orderby('name_country', 'asc')->pluck('name_country', 'code_iata');
        $cities    = City::orderby('name', 'asc')->pluck('name', 'id');

        return view('admin.images.createupload', compact('countries', 'cities', 'var'));
    }

    public function store(Request $request)
    {


        $clv        = $request['mt'];
        $destino    = $request['title'];

        $files      = $request->file('upload_image');
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


        if (isset($request['mt']) || isset($request['title'])) {

        if ($request['type'] == 2) {  //Panoramica por departamento
            
            Header::where('header_department', $request['title'])->delete(); //borra los datos  de la tabla para ingresra uno nuevo

                $viaje         = Travel::where('mt', '=', $request['mt'])->first();

                if ($viaje != null) {
                    Header::create([
                        'header_mt'          => $request['mt'],
                        'header_department'  => $request['title'],
                        'img'                => '2545',
                        'order'              => '1',
                        'active_head'        => '1',
                    ]);
                } elseif ($viaje == null) {

                    $blq = $this->get_data('https://www.megatravel.com.mx/tester/detail/12059');
                    $blq = json_decode($blq, true);

                    if (isset($blq['code'])) {
                        return "MT Inactivo";
                    } else {
                        Header::create([
                            'bloqueo_mt'         => $request['mt'],
                            'header_department'  => $request['title'],
                            'img'                => '2545',
                            'order'              => '1',
                            'active_head'        => '1',
                        ]);
                    }
                }


            //dd($request->all());
            /* if ($request->hasFile('upload_image') || $request->hasFile('uploadsmall')) {
                $files                = $request->file('upload_image');
                $fileother            = $request->file('uploadsmall');

                if ($request['title'] == 'europa') {
                    $name                 = $files->getClientOriginalName();
                    $name                 = "viaje-a-europa.jpg";

                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                }

                if ($request['title'] == 'canada') {
                    $name                 = $files->getClientOriginalName();
                    $name                 = "viaje-a-canada.jpg";

                    $nameother            = $fileother->getClientOriginalName();
                    $nameother            = $name;
                }


                //Storage::disk('sftp')->put('public_html/images/deptos/'.$name.'', fopen($files, 'r+'));
                //Storage::disk('sftp')->put('public_html/images/deptos/responsive/'.$filenametostoreother.'', fopen($fileother, 'r+'));

                Storage::disk('sftp')->put('public_html/test/' . $name . '', fopen($files, 'r+'));
                Storage::disk('sftp')->put('public_html/test/responsive/' . $nameother . '', fopen($fileother, 'r+'));
            }*/
        }
    } else {
        return "Campos invalidos";
    }



        //Mega Ofertas
     /*   elseif ($request['type'] == 4) {
            if ($request->hasFile('upload_image')) {
                foreach ($request->file('upload_image') as $filemega) {
                    $namemega = $filemega->getClientOriginalName();
                    Storage::disk('sftp')->put('public_html/images/destinos/home/megaofertas/' . $namemega . '', fopen($filemega, 'r+'));
                }
            }
        }
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

    public function destroy($id)
    {
        //
    }
}
