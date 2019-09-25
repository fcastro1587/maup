<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\RomsStoreRequest;
use App\Http\Requests\RomsUpdateRequest;
use App\Room;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:rooms.create')->only(['create', 'store']);
        $this->middleware('permission:rooms.index')->only('index');
        $this->middleware('permission:rooms.edit')->only(['edit', 'update']);
    }

    public function index(Request $request)
    {
      $rooms = Room::orderby('id', 'asc')->get();

      return view('admin/rooms.index', compact('rooms'));
    }

    public function create()
    {
      $rooms   = Room::all();

      return view('admin.rooms.create', compact('rooms'));
    }

    public function store(RomsStoreRequest $request)
    {
      //almacenar
      $rooms   =  Room::create($request->all());

      return redirect()->route('rooms.index')->with('info', 'Tipo de habitación creada con exito');
    }

    public function show()
    {

    }

    public function edit($id)
    {
      $rooms = Room::find($id);

      return view('admin.rooms.edit', compact('rooms'));
    }

    public function update(RomsUpdateRequest $request, $id)
    {
      $rooms = Room::find($id);
      $rooms->fill($request->all())->save();

      return redirect()->route('rooms.index')->with('info', 'El tipo de habitación ha sido actualizado.');
    }

    public function destroy($id)
    {
      $rooms  = Room::find($id)->delete();

      return back()->with('info', 'Habitación eliminada con exito');
    }
}
