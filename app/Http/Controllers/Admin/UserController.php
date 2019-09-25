<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
      public function __construct()
      {
        $this->middleware('permission:users.index')->only('index');
        $this->middleware('permission:users.index')->only('show');
        $this->middleware('permission:users.edit')->only(['edit', 'update']);
        $this->middleware('permission:users.destroy')->only('destroy');
      }

      public function index(Request $request)
      {
        $users = User::paginate();
        return view('admin.users.index', compact('users'));
      }

      public function show(User $user)
      {
        return view('admin.users.show', compact('user'));
      }

      public function edit(User $user)
      {
        $roles = Role::get();

        return view('admin.users.edit', compact('user', 'roles'));
      }

      public function update(Request $request, User $user)
      {
        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.edit', $user->id)
        ->with('info', 'Usuario actualizado con éxito');
      }

      public function destroy(User $user)
      {
        $user->delete();

        return back()->with('info', 'Eliminado correctamente');
      }
  }
