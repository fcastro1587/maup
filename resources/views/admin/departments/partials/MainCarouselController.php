<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\MainCarouselStoreRequest;
use App\Http\Requests\MainCarouselUpdateRequest;
use App\MainCarousel;
use App\Multimedia;
use App\Http\Controllers\Controller;

class MainCarouselController extends Controller
{
  public function index(Request $request)
  {
    $home  = MainCarousel::all();
    $multi = Multimedia::all();

    return view('admin.maincarousel.index', compact('home', 'multi'));
  }

  public function create()
  {
    $home  = MainCarousel::all();
    $multi = Multimedia::all();

    return view('admin.maincarousel.create', compact('home', 'multi'));

  }
  public function store(MainCarouselStoreRequest $request)
  {
    $home = MainCarousel::create($request->all());

    return redirect()->route('main.index')->with('info', 'Programa agregada al home');
  }

  public function edit($id)
  {
    $home  = MainCarousel::find($id);
    $multi = Multimedia::all();

    return view('admin.maincarousel.edit', compact('home', 'multi'));
  }

  public function show($id)
  {
    $home  = MainCarousel::all();
    $multi = Multimedia::all();

    return view('admin.maincarousel.show', compact('home', 'multi'));
  }

  public function update(MainCarouselUpdateRequest $request, $id)
  {
    $banner = MainCarousel::find($id);
    $banner->fill($request->all())->save();

    return redirect()->route('main.index')->with('info', 'Imagenes actualizadas correctamente');

  }

}
