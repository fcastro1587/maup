<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CarouselTravelStoreRequest;
use App\Http\Requests\CarouselUpdateRequest;
use App\CarouselTravel;
use App\Department;
use App\Multimedia;
use App\Travel;
use App\Http\Controllers\Controller;

class CarouselController extends Controller
{
    public function __construct()
    {
      $this->middleware('permission:carousel.createv')->only(['createv', 'store']);
      $this->middleware('permission:carousel.index')->only('index');
      $this->middleware('permission:carousel.edit')->only(['edit', 'update']);
      $this->middleware('permission:carousel.list')->only('list');
    }

    public function index(Request $request)
    {
      $carousel = CarouselTravel::all();
      $depto    = Department::all();

      return view('admin.carousel.index', compact('carousel', 'depto'));
    }

    public function list($code)
    {
      $list = CarouselTravel::where('carousel_travel_code', '=', $code)->orderby('active', 1)->get();

      return view('admin.carousel.list', compact('list'));
    }

    /*public function create()
    {
      $viaje    = Travel::all();
      $carousel = CarouselTravel::all();
      $depto    = Department::all();
      $multi    = Multimedia::all();

      return view('admin.carousel.create', compact('carousel', 'depto', 'multi', 'viaje'));
    }*/

    public function createv($col)
    {
      $viaje    = Travel::select('id', 'mt')->get();
      $carousel = CarouselTravel::all();
      $depto    = Department::all();
      $multi    = Multimedia::where('type', '=', 3)
                            ->orwhere('title', '=', $col)->get();

      return view('admin.carousel.create', compact('carousel', 'depto', 'multi', 'viaje', 'col'));
    }

    public function store(CarouselTravelStoreRequest $request)
    {
      //almacenar
      $carousel = CarouselTravel::create($request->all());

      return redirect()->route('carousel.index')->with('info', 'Programa creado con exito');
    }

    public function edit($id)
    {
      $carousel     = CarouselTravel::where('id', '=', $id)->first();
      $multi        = Multimedia::all();
      $department   = Department::orderby('code', 'asc')->pluck('name', 'code');

      return view('admin.carousel.edit', compact('carousel', 'multi', 'department'));
    }

    public function update(CarouselUpdateRequest $request, $id)
    {
      $carousel = CarouselTravel::find($id);
      $carousel->fill($request->all())->save();

      return redirect()->route('carousel.list', $carousel->carousel_travel_code)->with('info', 'MT actualizado con éxito');
    }


}
