<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\MultimediaStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Multimedia;
use App\Country;
use App\City;
use App\Http\Controllers\Controller;

class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:file.createfile')->only(['createfile', 'store']);
        $this->middleware('permission:file.index')->only('index');
        $this->middleware('permission:file.show')->only('show');
        $this->middleware('permission:file.edit')->only(['edit', 'update']);
    }

    public function index()
    {


        return view('admin.images.index');
    }


    public function createfile($var)
    {
        

        $countries = Country::orderby('name_country', 'asc')->pluck('name_country', 'code_iata');
        $cities    = City::orderby('name', 'asc')->pluck('name', 'id');

        return view('admin.images.create', compact('countries', 'cities', 'var'));
    }

    public function create()
    {
        $countries = Country::orderby('name_country', 'asc')->pluck('name_country', 'code_iata');
        $cities    = City::orderby('name', 'asc')->pluck('name', 'id');

        return view('admin.images.create', compact('countries', 'cities'));
    }

    public function store(MultimediaStoreRequest $request)
    {
 
        $file    = $request->file('upload_image');
        $other   = $request->file('small');
        $title   = $request['title'];
        $type   = $request['type'];

        //primera imagen
        $filenamewithextension = $file->getClientOriginalName();
        $filename              = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $extension             = $file->getClientOriginalExtension();
        $filenametostore       = $filename . '.' . $extension;
        
        //imagen detalle
        if ($request['type'] == 1) {
            if ($request->hasFile('upload_image') || $request->hasFile('small')) {
                
                //segunda imagen
                $filenameother        = $other->getClientOriginalName();
                $filenameother        = pathinfo($filenameother, PATHINFO_FILENAME);
                $extensionother       = $other->getClientOriginalExtension();
                $filename             = str_replace('321','.',$filenameother);
                $filenametostoreother = $filename.$extensionother;

                Storage::disk('sftp')->put('public_html/images/covers/'.$filenametostore.'',fopen($file,'r+'));
                Storage::disk('sftp')->put('public_html/images/thumbnails/'.$filenametostoreother.'',fopen($other,'r+'));
            }
        }

        //panoramica por depto, falta la responsiva
        elseif ($request['type'] == 2) {
            if ($request->hasFile('upload_image')) {
                Storage::disk('sftp')->put('public_html/images/deptos/'.$filenametostore.'',fopen($file,'r+'));
            }
        }
        
        //Destacados por departamento
        elseif ($request['type'] == 3) {
            if ($request->hasFile('upload_image')) {
                Storage::disk('sftp')->put('public_html/images/destinos/promos/'.$title.'/'.$filenametostore.'',fopen($file,'r+'));
            }
        }
        //FilesController es el 4 Mega Ofertas
        //Temporada, otono-invierno
        elseif ($request['type'] == 5) {
            if ($request->hasFile('upload_image')) {
                Storage::disk('sftp')->put('public_html/images/destinos/home/'.$title.'/'.$filenametostore.'',fopen($file,'r+'));
            }
        }

        //Bloqueos
        elseif ($request['type'] == 6) {
            if ($request->hasFile('upload_image')) {
                Storage::disk('sftp')->put('public_html/images/destinos/home/bloqueo/'.$filenametostore.'',fopen($file,'r+'));
            }
        }

        //Favoritos
        elseif ($request['type'] == 12) {
            if ($request->hasFile('upload_image')) {
                Storage::disk('sftp')->put('public_html/images/destinos/home/favoritos/'.$filenametostore.'',fopen($file,'r+'));
            }
        }
        //aun no esta terminado del todo
        elseif ($request['type'] == 7) {
            if ($request->hasFile('upload_image')) {
                Storage::disk('sftp')->put('public_html/deptos/banner-depto/'.$title.'/'.$filenametostore.'',fopen($file,'r+'));
            }
        }
        if ($request['type'] == 11) {
            if ($request->hasFile('upload_image')) {
                Storage::disk('sftp')->put('public_html/deptos/recommendados/'.$filenametostore.'',fopen($file,'r+'));
            }
        }

        $image = Multimedia::create($request->all());

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
