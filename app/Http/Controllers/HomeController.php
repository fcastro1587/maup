<?php
namespace App\Http\Controllers;

use App\Travel;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {

     
       // Auth::user()->department;
   
      //$cont      = Travel::all()->count();
      //$activos   = Travel::where('status', 1)->count();
      //$inactivos = Travel::where('status', 0)->count();

      //return view('adminlte::home', compact('cont', 'activos', 'inactivos'));
      return view('adminlte::home');

    }
}
