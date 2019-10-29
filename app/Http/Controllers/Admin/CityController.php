<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CityUpdateRequest;
use App\Http\Requests\CityStoreRequest;
use App\City;
use App\Country;
use App\Http\Controllers\Controller;
use App\CityTravel;

class CityController extends Controller
{
    public function __construct()
    {
      $this->middleware('permission:city.create')->only(['create', 'store']);
      $this->middleware('permission:city.index')->only('index');
      $this->middleware('permission:city.edit')->only(['edit', 'update']);
      $this->middleware('permission:city.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
      return view('admin.city.index');
    }
    
    public function datacity()
    {
      $city = City
      ::join('countries', 'countries.code_iata', '=', 'cities.country_code_iata')
      ->select(
               'cities.id',
               'cities.name',
               'countries.name_country'
              )
      ->orderby('countries.name_country', 'asc');

       
      return datatables()
      ->eloquent($city)
      ->addColumn('btn', 'admin.city.actions')
      ->rawColumns(['btn'])
      ->toJson();
    }

    public function edit($id)
    {
      $city    = City::find($id);
      $country = Country::all();

      return view('admin.city.edit', compact('city', 'country'));
    }

    public function create()
    {
      $city    = City::all();
      $country = Country::all();

      return view('admin.city.create', compact('city', 'country'));
    }

    public function store(CityStoreRequest $request)
    {
      //almacenar
      $city   =  City::create($request->all());

      return redirect()->route('city.index')->with('info', 'Ciudad agregada con exito');
    }

    public function show()
    {

    }

    public function update(CityUpdateRequest $request, $id)
    {
      $city = City::find($id);
      $city->fill($request->all())->save();

      return redirect()->route('city.index')->with('info', 'Ciudad actualizada con exito');
    }

    public function destroy($id)
    {
      $city  = City::find($id)->delete();

      return back()->with('info', 'Ciudad Eliminada con exito');
    }
}
