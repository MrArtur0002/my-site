<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Card;

class addCardController extends Controller
{
  public function show()
    {


      return view('Admin.Dashboard.show', ['content' => 'Munchkin.create-card', 'params' => []]);
    }

    /**
     * Сохранить новую карту.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  public function addCard(Request $request) {
    $newCard = $request->validate([
        'title' => 'required|unique:cards|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $params['responce'] = true;
    $imageName = time().'.'.$request->image->extension();

    $newCard = new Card;

    $newCard->title = $request->title;
    $newCard->image = $imageName;
    $newCard->description = ($request->description)? $request->description : '';
    $newCard->type = '';
    $newCard->value = 0;

    $newCard->save();

    $request->image->move(public_path('images/manchkin/cards'), $imageName);

    return view('Admin.Dashboard.show', ['content' => 'Munchkin.create-card', 'params' => $params]);
  }
}
