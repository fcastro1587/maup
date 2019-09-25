<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Travel;
use App\Http\Controllers\Controller;

class AlertController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index(Request $request)
    {
      $viaje = Travel::where('status', '=', 1)
                     ->whereRaw('validity <= curdate()')->get();

      return view('admin.alert.index', compact('viaje'));
    }
}
