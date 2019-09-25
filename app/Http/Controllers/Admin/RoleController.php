<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

  public function __construct()
  {
    $this->middleware('permission:roles.create')->only(['create', 'store']);
    $this->middleware('permission:roles.index')->only('index');
    $this->middleware('permission:roles.edit')->only(['edit', 'update']);
    $this->middleware('permission:roles.show')->only('show');
    $this->middleware('permission:roles.destroy')->only('destroy');
  }

    public function index(Request $request)
    {
      $roles = Role::paginate();
      return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
      $permissions = Permission::get();
      return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
      $role = Role::create($request->all());

      $role->permissions()->sync($request->get('permissions'));

      return redirect()->route('roles.edit', $role->id)
      ->with('info', 'Rol guardado con éxito');
    }

    public function show(Role $role)
    {
      return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
      $permissions = Permission::get();

      return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
      $role->update($request->all());

      $role->permissions()->sync($request->get('permissions'));

      return redirect()->route('roles.edit', $role->id)
      ->with('info', 'Usuario actualizado con éxito');
    }

    public function destroy(Role $role)
    {
      $role->delete();

      return back()->with('info', 'Eliminado correctamente');
    }
}
