<?php
namespace App\Manchkin\Lib;

use App\Manchkin\Lib\Deck;
use App\Manchkin\Lib\Player;
use App\Room;

class GameLobby
{
    private $deck;
    public $players;
    private $info_lobby;
    private $all_cards;

    public function __construct($id_lobby) {
        $this->info_lobby = Room::where('id_room', $id_lobby)->first();
        $this->players = new Player($this->info_lobby->user_id);
        $this->deck = $this->info_lobby->deck_id;
    }

    public function getParams() {
        return $this->players->getParams();
    }

    public function startGame() {

    }
}
