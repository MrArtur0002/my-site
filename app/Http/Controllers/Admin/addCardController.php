<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class addCardController extends Controller
{
  public function show()
    {


      return view('Admin.Dashboard.show', ['content' => 'create-card']);
    }

  public function index(Request $request) {

  }
}
