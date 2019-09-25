<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\TourUpdateRequest;
use App\Http\Requests\TourStoreRequest;
use App\Tour;
use App\Department;
use App\Http\Controllers\Controller;

class ToursController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:tours.create')->only(['create', 'store']);
        $this->middleware('permission:tours.index')->only('index');
        $this->middleware('permission:tours.edit')->only(['edit', 'update']);
        $this->middleware('permission:tours.destroy')->only('destroy');
    }

    public function index()
    {
      $tours      = Tour::orderby('id', 'asc')->get();
      $department = Department::all();

      return view('admin/tours.index', compact('tours', 'department'));
    }

    public function create()
    {
      $tours        = Tour::all();
      $department   = Department::orderby('code', 'asc')->pluck('name', 'code');

      return view('admin/tours.create', compact('tours', 'department'));
    }

    public function show()
    {

    }

    public function store(TourStoreRequest $request)
    {
      //almacenar
      $tours   =  Tour::create($request->all());

      return redirect()->route('tours.index')->with('info', 'Tour creado con exito');
    }

    public function edit($id)
    {
      $tours      = Tour::find($id);
      $department   = Department::orderby('code', 'asc')->pluck('name', 'code');

      return view('admin/tours.edit', compact('tours', 'department'));
    }

    public function update(TourUpdateRequest $request, $id)
    {
      $tours = Tour::find($id);
      $tours->fill($request->all())->save();

      return redirect()->route('tours.index')->with('info', 'Tour actualizado con exito');
    }

    public function destroy($id)
    {
      $tours  = Tour::find($id)->delete();

      return back()->with('info', 'Tour eliminado con exito');
    }
}
