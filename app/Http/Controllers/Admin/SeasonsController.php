<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Season;
use App\Http\Controllers\Controller;

class SeasonsController extends Controller
{

    public function list(Request $request)
    {
      $seasons = Season::all();

      return view('admin.seasons.index', compact('seasons'));
    }

    public function vie($code)
    {
      $season = Season::where('code_season', '=', $code)->first();

      return view('admin.seasons.show', compact('season'));
    }
}
