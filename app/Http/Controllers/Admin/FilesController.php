<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use File;
use App\Multimedia;
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

        $destino = $request['title'];

        $files     = $request->file('upload_image');
        $fileother = $request->file('uploadsmall');

        $name      = $files->getClientOriginalName();
        $nameother = $fileother->getClientOriginalName();

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


        if ($request['type'] == 4) {
            if ($request->hasFile('upload_image')) {
                $file                  = $request->file('upload_image');
                $filenamewithextension = $file->getClientOriginalName();
                $filename              = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension             = $file->getClientOriginalExtension();
                $filenametostore       = $filename . '.' . $extension;
                Storage::disk('sftp')->put('public_html/images/destinos/home/megaofertas/' . $filenametostore . '', fopen($file, 'r+'));
            }
        } elseif ($request['type'] == 11) {
            if ($request->hasFile('upload_image')) {
                foreach ($request->file('upload_image') as $files) {
                    $name = $files->getClientOriginalName();
                    Storage::disk('sftp')->put('public_html/images/recommend/' . $name . '', fopen($files, 'r+'));
                }
            }
        } elseif ($request['type'] == 7) {
            if ($request->hasFile('upload_image') || $request->hasFile('uploadsmall')) {

                Storage::disk('sftp')->put('public_html/images/destinos/banner-depto/' . $destino . '/' . $name . '', fopen($files, 'r+'));
                Storage::disk('sftp')->put('public_html/images/destinos/banner-depto/' . $destino . '/' . $nameother . '', fopen($fileother, 'r+'));
            }
        }
        elseif ($request['type'] == 8) {
            if ($request->hasFile('upload_image') || $request->hasFile('uploadsmall')) {

                Storage::disk('sftp')->put('public_html/images/slider-home/' . $name . '', fopen($files, 'r+'));
                Storage::disk('sftp')->put('public_html/images/slider-home/320x340/' . $nameother . '', fopen($fileother, 'r+'));
            }
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
