<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Card;

class CardsController extends Controller
{
  public function show()
    {
      $cards = Card::all();

      return view('Admin.Dashboard.show', ['content' => 'Munchkin.cards', 'cards' => $cards]);
    }
}
