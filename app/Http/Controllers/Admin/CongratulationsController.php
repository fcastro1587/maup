<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CongratulationUpdateRequest;
use App\Http\Requests\CongratulationStoreRequest;
use App\Congratulation;
use App\Http\Controllers\Controller;

class CongratulationsController extends Controller
{

    public function __construct()
    {
      $this->middleware('permission:congratulations.create')->only(['create', 'store']);
      $this->middleware('permission:congratulations.index')->only('index');
      $this->middleware('permission:congratulations.edit')->only(['edit', 'update']);
      $this->middleware('permission:congratulations.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
      //$congra = Congratulation::search($request->name)->orderby('id', 'asc')->paginate(10);

      return view('admin.congratulations.index');
    }

    public function congra(Request $request)
    {
      $congratulations = Congratulation
        ::select('id', 'name', 'title', 'description');
  
      return datatables()
        ->eloquent($congratulations)
        ->addColumn('btn', 'admin.congratulations.actions')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function edit($id)
    {
      $congra = Congratulation::find($id);

      return view('admin.congratulations.edit', compact('congra'));
    }

    public function create()
    {
      $congra  = Congratulation::all();

      return view('admin.congratulations.create', compact('congra'));
    }

    public function store(CongratulationStoreRequest $request)
    {
      //almacenar
      $congra   =  Congratulation::create($request->all());

      return redirect()->route('congratulations.index')->with('info', 'El comentario ha sido agregado con exito.');
    }

    public function show()
    {

    }

    public function update(CongratulationUpdateRequest $request, $id)
    {
      $congra  = Congratulation::find($id);
      $congra->fill($request->all())->save();

      return redirect()->route('congratulations.index')->with('info', 'Comentario actualizado con exito.');
    }

    public function destroy($id)
    {
      $congra = Congratulation::find($id)->delete();

      return back()->with('info', 'El comentario se ha eliminado con exito');
    }
}
