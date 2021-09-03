<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        'description' => 'required|max:1024',
    ]);

    $params['responce'] = true;
    $imageName = time().'.'.$request->image->extension();

    $request->image->move(public_path('images/manchkin/cards'), $imageName);

    return view('Admin.Dashboard.show', ['content' => 'Munchkin.create-card', 'params' => $params]);
  }
}
