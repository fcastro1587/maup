<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\OfferStoreRequest;
use App\Http\Requests\OfferUpdateRequest;
use App\Offer;
use App\Travel;
use App\Department;
use App\Http\Controllers\Controller;

class OffersController extends Controller
{
  public function __construct()
  {
    $this->middleware('permission:offers.create')->only(['create', 'store']);
    $this->middleware('permission:offers.index')->only('index');
    $this->middleware('permission:offers.edit')->only(['edit', 'update']);
  }

  public function index(Request $request)
  {
    return view('admin.offers.index');
  }

  public function dataoffer()
  {
    $offer = Offer
             ::join('departments', 'offers.department_code', '=', 'departments.code')
             ->select(
               'offers.id', 
               'offers.bloqueo_mt', 
               'offers.department_code', 
               'offers.order',
               'departments.name'
              )
              ->orderby('offers.order', 'asc');

    return datatables()
      ->eloquent($offer)
      ->addColumn('btn', 'admin.offers.actions')
      ->rawColumns(['btn'])
      ->toJson();
  }

  public function edit($id)
  {
    $ofer  = Offer::find($id);
    $depto = Department::all();

    return view('admin.offers.edit', compact('ofer', 'depto'));
  }

  public function create()
  {
    $depto = Department::all();

    return view('admin.offers.create', compact('depto'));
  }

  public function store(OfferStoreRequest $request)
  {
    //almacenar
    $ofer   =  Offer::create($request->all());

    return redirect()->route('offers.index')->with('info', 'Tipo de habitación creada con exito');
  }

  public function show()
  { }

  public function update(OfferUpdateRequest $request, $id)
  {
    $ofer = Offer::find($id);
    $ofer->fill($request->all())->save();

    return redirect()->route('offers.index')->with('info', 'Se ha actualizado el MT');
  }

  public function destroy($id)
  {
    $ofer = Offer::find($id)->delete();

    return back()->with('info', 'Oferta eliminada con exito.');
  }
}
