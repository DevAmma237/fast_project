<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashbordController extends Controller
{
  public function __construct(Type $foo = null)
  {
    $this->middleware('auth');
  }
    public function index()
    {
      $project = DB::table('project')->where('user_id','=',Auth::user()->id)->get();
      return view('acceuil',['projects'=>$project]);
    }
}
