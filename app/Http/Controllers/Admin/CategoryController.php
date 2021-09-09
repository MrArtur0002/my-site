<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Card;

class CategoryController extends Controller
{
  public function show()
    {


      return view('Admin.Dashboard.show', ['content' => 'Munchkin.category', 'params' => []]);
    }
}
