<?php
namespace App\Manchkin\Lib;
use App\Manchkin\Lib\Card;
use App\User;
use App\UserCards;

class Player
{
    public $cards = [];
    private $info_player;

    public function __construct($id_player) {
        $this->info_player = User::where('id', $id_player)->first();
        $cards = UserCards::where('user_id', $id_player)->get();
        foreach ($cards as $card) {
            $cards[] = new Card($card->card_id);
        }
    }

    public function getParams() {
        return json_encode($this->cards);
    }
}
