<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function show()
    {


      return view('Game.Dashboard.main', ['content' => '']);
    }
}
