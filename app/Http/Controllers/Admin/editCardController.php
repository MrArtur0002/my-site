<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Card;
use App\Category;

class editCardController extends Controller
{

  public function show($id)
    {
      $params['id'] = $id;
      $newCard = new Card;

      $categories = Category::all();

      $params['info'] = Card::where('id', $id)->get();

      /* Сделать категории в нужный вид */
      foreach ($categories as $key => $category) {
          $params['categories'][$category['id']] = $category['name'];
      }


      return view('Admin.Dashboard.show', ['content' => 'Munchkin.edit-card', 'params' => $params]);
    }

    /**
     * Сохранить новую карту.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  public function editCard(Request $request, $id) {
    $newCard = $request->validate([
        'title' => 'required|max:255',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'card_category' => 'required',
        'type' => 'required'
    ]);

    $imageName = '';

    $newCard = Card::find($id);
    $newCard->title = $request->title;
    $newCard->type = $request->type;
    $newCard->category_id = $request->card_category;
    if ($request->image) {
        $imageName = time().'.'.$request->image->extension(); // Рандомное имя файла для нового изображения
        unlink(public_path('images/manchkin/cards/'.$newCard->image));
        $newCard->image = $imageName;
        $request->image->move(public_path('images/manchkin/cards'), $imageName);
    }

    $newCard->save();

    $categories = Category::all();

    /* Сделать категории в нужный вид */
    foreach ($categories as $key => $category) {
        $params['categories'][$category['id']] = $category['name'];
    }

    $params['responce'] = true;
    $params['id'] = $id;
    $params['info'] = Card::where('id', $id)->get();

    return view('Admin.Dashboard.show', ['content' => 'Munchkin.edit-card', 'params' => $params]);
  }
}
