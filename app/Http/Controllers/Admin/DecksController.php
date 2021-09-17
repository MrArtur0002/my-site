<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Deck;

class DecksController extends Controller
{
  public function show()
    {
      /*$params['category'] = Category::all();*/
      $params = [];

      return view('Admin.Dashboard.show', ['content' => 'Munchkin.deck', 'params' => $params]);
    }
}
