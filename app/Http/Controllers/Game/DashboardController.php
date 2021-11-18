<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Room;
use App\Manchkin\Lib\GameController;

class DashboardController extends Controller
{
  public function show()
    {
      $params = [];
      $user = auth()->user();
      $room = Room::where('user_id', $user->id)->count();
      $id_room = 0;

      /* Существует ли комната в которой играет пользователь */
      if ($room) {
        $target = Room::where('user_id', $user->id)->first();
        $id_room = $target->id_room;
      } else {
        $newRoom = new Room;
        $newRoom->description = 'Тестовая версия';
        $newRoom->deck_id = '1';
        $newRoom->user_id = $user->id;
        $newRoom->current_user_id = $user->id;
        $newRoom->difficulty = 'Легкая';
        $newRoom->id_room = 2;
        $id_room = 2;
        $newRoom->last_move = date('Y-m-d');
        $newRoom->save();
      }

      $gameController = GameController::getInstance();

      $lobby = $gameController->getGameLobby($id_room);

      $params['test'] = $lobby->players->getParams();

      return view('Game.Dashboard.main', ['content' => '', 'params' => $params]);
    }
}
