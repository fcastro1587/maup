<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\VisaUpdateRequest;
use App\Http\Requests\VisaStoreRequest;
use App\Visa;
use App\Country;
use App\Http\Controllers\Controller;

class VisasController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:visas.create')->only(['create', 'store']);
        $this->middleware('permission:visas.index')->only('index');
        $this->middleware('permission:visas.edit')->only(['edit', 'update']);
        $this->middleware('permission:visas.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
      $visas    = Visa::orderby('id', 'asc')->get();
      $country  = Country::all();

      return view('admin.visas.index', compact('visas', 'country'));
    }

    public function edit($id)
    {
      $visas = Visa::find($id);
      $country      = Country::all();

      return view('admin.visas.edit', compact('visas', 'country'));
    }

    public function create()
    {
      $visas        = Visa::all();
      $country      = Country::all();

      return view('admin.visas.create', compact('visas', 'country'));
    }

    public function store(VisaStoreRequest $request)
    {
      //almacenar
      $visas   =  Visa::create($request->all());

      return redirect()->route('visas.index')->with('info', 'Visa Actualizado con exito');
    }

    public function show()
    {

    }

    public function update(VisaUpdateRequest $request, $id)
    {
      $visas = Visa::find($id);
      $visas->fill($request->all())->save();

      return redirect()->route('visas.index')->with('info', 'Visa actualizada con exito');
    }

    public function destroy($id)
    {
      $visas  = Visa::find($id)->delete();

      return back()->with('info', 'Visa Eliminada con exito');
    }
}
