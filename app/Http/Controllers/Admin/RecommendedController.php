<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\RecommendedDepartmentStoreRequest;
use App\Http\Requests\RecommendedDepartmentUpdateRequest;
use App\RecommendedDepartment;
use App\Multimedia;
use App\Department;
use App\Http\Controllers\Controller;

class RecommendedController extends Controller
{

    public function __construct()
    {
      $this->middleware('permission:recommend.create')->only(['create', 'store']);
      $this->middleware('permission:recommend.index')->only('index');
      $this->middleware('permission:recommend.edit')->only(['edit', 'update']);
    }

    public function index(Request $request)
    {
      $recom = RecommendedDepartment::all();

      return view('admin.recommended.index', compact('recom'));
    }

    public function create()
    {

      $recom  = RecommendedDepartment::all();
      $multi = Multimedia::all();
      $department   = Department::orderby('code', 'asc')->pluck('name', 'code');

      return view('admin.recommended.create', compact('recom', 'multi', 'department'));

    }

    public function store(RecommendedDepartmentStoreRequest $request)
    {
      $recom = RecommendedDepartment::create($request->all());

      return redirect()->route('recommend.index')->with('info', 'Programa agregado correctamente');
    }

    public function edit($id)
    {
      $recom        = RecommendedDepartment::find($id);
      $multi        = Multimedia::all();
      $department   = Department::orderby('code', 'asc')->pluck('name', 'code');

      return view('admin.recommended.edit', compact('recom', 'multi', 'department'));
    }

    public function show($id)
    {
      $recom = RecommendedDepartment::find($id);

      return view('admin.recommended.show', compact('recom'));

      return view('admin.maincarousel.show', compact('home', 'multi'));
    }

    public function update(RecommendedDepartmentUpdateRequest $request, $id)
    {
      $recom = RecommendedDepartment::find($id);
      $recom->fill($request->all())->save();

      return redirect()->route('recommend.index')->with('info', 'Imagenes actualizadas correctamente');

    }
}
