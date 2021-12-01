<?php
namespace App\Manchkin\Lib;

use App\Manchkin\Lib\Deck;
use App\Manchkin\Lib\Player;
use App\Room;
use App\Bot;
use App\BotDesc;
use App\RoomProp;
use App\Deck as ModelDeck;

class GameLobby
{
    public $deck;
    public $players;
    public $bots = [];
    private $info_lobby;
    private $all_cards;

    private $botsNames = [
        "Джеймс", "Нолан", "Анастасия", "Дима", "Азамат", "Федя", "Илгам", "Артур", "Альберт", "Руслан", "Виля", "Снежок", "Чулпан", "Лиля"
    ];

    public function __construct($id_lobby) {
        $this->info_lobby = Room::where('id_room', $id_lobby)->first();
        $this->players = new Player($this->info_lobby->user_id);
        $this->deck = new Deck($this->info_lobby->deck_id);
    }

    public function getParams() {
        return $this->players->getParams();
    }

    public function createLobby() {
        $room_props = new RoomProp;
        $room_props->room_id = $this->info_lobby->id;

        $id_bots = '';
        /* Создание ботов */
        for ($i=0; $i < 3; $i++) {
            if ($i != 0)
                $id_bots = $id_bots.',';
            $newBot = new Bot;
            $newBot->name = $this->botsNames[array_rand($this->botsNames, 1)];
            $newBot->room_id = $this->info_lobby->id;
            $newBot->save();

            $id_bots = $id_bots.$newBot->id;
            $this->bots[] = $newBot->id;
        }
        $room_props->players = $id_bots;

        $this->startGame();
    }

    private function startGame() {

    }
}
