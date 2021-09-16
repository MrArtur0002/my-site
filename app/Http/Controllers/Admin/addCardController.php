<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Card;
use App\Category;

class addCardController extends Controller
{
  public function show()
    {
      $categories = Category::all();

      /* Сделать категории в нужный вид */
      foreach ($categories as $key => $category) {
          $params['categories'][$category['id']] = $category['name'];
      }

      return view('Admin.Dashboard.show', ['content' => 'Munchkin.create-card', 'params' => $params]);
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
        'card_category' => 'required'
    ]);

    $params['responce'] = true;
    $imageName = time().'.'.$request->image->extension();

    $newCard = new Card;

    $newCard->title = $request->title;
    $newCard->image = $imageName;
    $newCard->description = ($request->description)? $request->description : '';
    $newCard->type = '';
    $newCard->value = 0;
    $newCard->category_id = $request->card_category;

    $newCard->save();

    $request->image->move(public_path('images/manchkin/cards'), $imageName);

    return view('Admin.Dashboard.show', ['content' => 'Munchkin.create-card', 'params' => $params]);
  }
}
