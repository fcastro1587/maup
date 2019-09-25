<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\TopUpdateRequest;
use App\Http\Requests\TopStoreRequest;
use App\TopTravel;
use App\Department;
use App\Travel;
use App\Http\Controllers\Controller;

class TopTravelController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index(Request $request)
    {
      $top         = TopTravel::orderby('id', 'asc')->paginate(10);
      $department  = Department::all();

      return view('admin.toptravel.index', compact('top', 'department'));
    }

    public function edit($id)
    {
      $top          = TopTravel::find($id);
      $department   = Department::all();
      $viaje        = Travel::all();

      return view('admin.toptravel.edit', compact('top', 'department', 'viaje'));
    }

    public function create()
    {
      $top          = TopTravel::all();
      $department   = Department::all();
      $viaje        = Travel::all();

      return view('admin.toptravel.create', compact('top', 'department', 'viaje'));
    }

    public function store(TopStoreRequest $request)
    {
      //almacenar
      $top   =  TopTravel::create($request->all());

      return redirect()->route('toptravels.index')->with('info', 'MT agregado correctamente');
    }

    public function show()
    {

    }

    public function update(TopUpdateRequest $request, $id)
    {

      $top = TopTravel::find($id);
      $top->fill($request->all())->save();

      return redirect()->route('toptravels.index')->with('info', 'Se ha realizado la actualización');
    }

    public function destroy()
    {

    }
}
