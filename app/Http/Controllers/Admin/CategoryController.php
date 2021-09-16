<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
  public function show()
    {
      $params['category'] = Category::all();

      return view('Admin.Dashboard.show', ['content' => 'Munchkin.category', 'params' => $params]);
    }
}
