<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RevistasStoreRequest;
use App\Http\Requests\RevistasUpdateRequest;
use App\Revista;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class RevistasController extends Controller
{

    public function __construct()
    {
      $this->middleware('permission:revistas.create')->only(['create', 'store']);
      $this->middleware('permission:revistas.index')->only('index');
      $this->middleware('permission:revistas.edit')->only(['edit', 'update']);
      $this->middleware('permission:revistas.show')->only('show');
      $this->middleware('permission:revistas.destroy')->only('destroy');
      $this->middleware('permission:revistas.similares')->only('similares');
      $this->middleware('permission:revistas.magazine')->only('magazine');
    }

    public function index()
    {
      //$revista = Revista::all();
      $revista = Revista
        ::where('activo', 1)
        ->orderBy('created_at', 'DESC')->get();

      return view('admin.revistas.index', compact('revista'));
    }

    public function create()
    {
      return view('admin.revistas.create', compact('revista'));
    }

    public function store(RevistasStoreRequest $request)
    {
      if($request['nombre']){
        $slug              = $request['nombre'];
        $slug              = Str::slug($slug);
        $request['nombre'] = $slug;
      }
      if($request['img_portada']){
        $slug                   = $request['img_portada'];
        $slug                   = Str::slug($slug);
        $request['img_portada'] = $slug;
      }




      //if($request->hasFile('numero')) {

     //get filename with extension
     //$filenamewithextension = $request->file('numero')->getClientOriginalName();

     //get filename without extension
     //$filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

     //get file extension
     //$extension = $request->file('numero')->getClientOriginalExtension();

     //filename to store
     //$filenametostore = $filename.'_'.uniqid().'.'.$extension;

     //Upload File to external server
     //Storage::disk('ftp')->put($filenametostore, fopen($request->file('numero'), 'r+'));

     //Store $filenametostore in the database
 //}


      $revista   =  Revista::create($request->all());
      return redirect()->route('revistas.index')->with('info', 'Revista Agregada con éxito');
    }

    public function similares()
    {
      $revista = Revista::orderBy('nombre', 'DESC')->first();
      return view('admin.revistas.similares', compact('revista'));
    }

    public function magazine()
    {
      $revista = Revista::orderBy('nombre', 'DESC')->first();
      return view('admin.revistas.magazine', compact('revista'));
    }

    public function show()
    {

    }

    public function edit($id)
    {
      $revista  = Revista::find($id);

      return view('admin.revistas.edit', compact('revista'));
    }

    public function update(RevistasUpdateRequest $request, $id)
    {
      $revista = Revista::find($id);
      $revista->fill($request->all())->save();

      return redirect()->route('revistas.index')->with('info', 'Revista actualizado correctamente');
    }

    public function destroy()
    {

    }

}
