<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\FilterUpdateRequest;
use App\Http\Requests\FilterStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Filter;
use App\Department;
use App\Country;
use App\City;
use App\Travel;
use App\Multimedia;
use App\Http\Controllers\Controller;

class FiltersController extends Controller
{
    public function __construct()
    {
      $this->middleware('permission:filters.create')->only(['create', 'store']);
      $this->middleware('permission:filters.index')->only('index');
      $this->middleware('permission:filters.edit')->only(['edit', 'update']);
      $this->middleware('permission:filters.show')->only('show');
      $this->middleware('permission:filters.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
      $filter     = Filter::select('*')->orderby('id', 'asc')->get();
      $country    = Country::all();
      $city       = City::all();

      return view('admin.filters.index', compact('filter', 'country', 'city'));
    }

    public function edit($id)
    {
      $filter     = Filter::find($id);
      $department = Department::all();
      $country    = Country::all();
      $city       = City::all();
      $multi      = Multimedia::all();

      return view('admin.filters.edit', compact('filter', 'department', 'country', 'city', 'multi'));
    }

    public function create()
    {
      $filter     = Filter::all();
      $department = Department::orderBY('name', 'ASC')->get();
      $country    = Country::orderBy('name_country', 'ASC')->get();
      $city       = City::orderBy('name', 'ASC')->get();
      $multi      = Multimedia::all();

      return view('admin.filters.create', compact('filter', 'department', 'country', 'city', 'multi'));
    }

    public function store(FilterStoreRequest $request)
    {
      //almacenar
      $filter   =  Filter::create($request->all());


      //image
      if($request->file('file'))
      {
        $path = Storage::disk('public')->put('filtros', $request->file('file'));
        $filter->fill(['file' => ($path)])->save();
      }

      return redirect()->route('filters.index')->with('info', 'Se ha creado con exito');
    }

    public function show($name)
    {
      $country  = Country::where('code_iata', '=',  $name)->first();
      $filter   = Filter::all();

      return view('admin.filters.show', compact('filter', 'country'));
    }

    public function show_city($name, $city)
    {

      $citie = City::where('id', '=', $city)->first();
      $filter   = Filter::all();

      return view('admin.filters.show_city', compact('citie', 'filter'));
    }

    public function update(FilterUpdateRequest $request, $id)
    {
      $filter = Filter::find($id);
      $filter->fill($request->all())->save();

      //image
      if($request->file('file'))
      {
        $path = Storage::disk('public')->put('filtros', $request->file('file'));
        $filter->fill(['file' => ($path)])->save();
      }

      return redirect()->route('filters.index')->with('info', 'Se realizado la actualización');
    }

    public function destroy($id)
    {
      $filter = Filter::find($id)->delete();

      return back()->with('info', 'Registro borrado exitosamente');
    }
}
