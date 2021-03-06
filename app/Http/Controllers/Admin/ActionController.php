<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Manchkin\Lib\Categories\CategoryFactory;

class ActionController extends Controller
{
  public function show()
    {
      $categoryFactory = new CategoryFactory();
      $monster = $categoryFactory->getCategory(7);
      $test = [];
      if ($monster)
        $test['test'] = $monster->action();

      return view('Admin.Dashboard.show', ['content' => 'Munchkin.action', 'params' => $test]);
    }
}
