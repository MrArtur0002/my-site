<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MunchkinController extends Controller
{
  public function show()
    {


      return view('Admin.Dashboard.show', ['content' => 'munchkin']);
    }
}
