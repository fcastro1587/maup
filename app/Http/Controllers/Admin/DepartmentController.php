<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentUpdateRequest;
use App\Http\Requests\DepartmentStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Department;
use App\Travel;
use App\City;
use App\Header;
use App\Multimedia;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
  public function __construct()
  {
    $this->middleware('permission:department.create')->only(['create', 'store']);
    $this->middleware('permission:department.index')->only('index');
    $this->middleware('permission:department.index')->only('list');
    $this->middleware('permission:department.edit')->only(['edit', 'update']);
  }

  public function index(Request $request)
  {
    $department = Department::all();
    $header     = Header::all();

    return view('admin.departments.index', compact('department', 'header'));
  }

  public function create()
  {
    $deparment       = Department::all();
    $multi           = Multimedia::all();

    return view('admin.departments.create', compact('deparment', 'multi'));
  }

  public function store(DepartmentStoreRequest $request)
  {

    $department   =  Header::create($request->all());
    return redirect()->route('department.index')->with('info', 'imagen creada con éxito');
  }

  public function show($code)
  {
    $department = Department::where('code', '=', $code)->first();

    return view('admin.departments.show', compact('department'));
  }

  public function edit($id)
  {
    $header     = Header::find($id);
    $multi      = Multimedia::all();
    $department   = Department::orderby('code', 'asc')->pluck('name', 'code');

    return view('admin.departments.edit', compact('header', 'multi', 'department'));
  }

  public function list($id)
  {
    $department = Department::where('code', '=', $id)->first();
    $header     = Header::all();

    return view('admin.departments.list', compact('department', 'header'));
  }


  public function update(DepartmentUpdateRequest $request, $id)
  {
    //actualiza los datos
    $department = Header::find($id);
    $department->fill($request->all())->save();

    //image
    /*if($request->file('img'))
    {
      $img_depto = Storage::disk('public')->put('deptos', $request->file('img'));
      $department->fill(['img' => ($img_depto)])->save();
    }*/

    return redirect()->route('department.index')->with('info', 'imagen actualizada con exito');
  }

  public function cont($cont)
  {
    return $cont;
  }
}
