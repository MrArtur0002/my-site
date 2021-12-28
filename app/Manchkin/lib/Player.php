<?php
namespace App\Manchkin\Lib;
use App\Manchkin\Lib\Card;
use App\DeckCard;
use App\User;
use App\UserCards;
use App\RoomCards;

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

    public function firstGetCard($cards) {

    }

    public function addCardToUser($card, $id_room) {
        /* Установка состояния */
        $cardUser = RoomCards::where('id', $card['id'])->where('room_id', $id_room)->first();
        if ($cardUser) {
            $cardUser->active = 3;
            $cardUser->save();
        }
        /* Привязка карты к игроку */
        $this->cards[$card['id']] = $card;
        $newCardUser = new UserCards;
        $newCardUser->active = 1;
        $newCardUser->user_id = $this->info_player->id;
        $newCardUser->card_id = $card['id_card'];
        $newCardUser->room_id = $id_room;
        $newCardUser->save();
    }
}
