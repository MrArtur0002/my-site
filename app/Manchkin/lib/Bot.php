<?php
namespace App\Manchkin\Lib;
use App\Manchkin\Lib\Card;
use App\DeckCard;
use App\Bot as BotUser;
use App\BotCards;
use App\RoomCards;

class Bot
{
    public $cards = [];
    private $info_bot;

    public function __construct($id_bot) {
        $this->info_bot = BotUser::where('id', $id_bot)->first();
        $cards = BotCards::where('user_id', $id_bot)->get();
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
        $cardBot = RoomCards::where('id', $card['id'])->where('deck_id', $id_room)->first();
        if ($cardBot) {
            $cardBot->active = 3;
            $cardBot->save();
        }

        /* Привязка карты к игроку */
        $this->cards[$card['id']] = $card;
        $newCardBot = new BotCards;
        $newCardBot->active = 1;
        $newCardBot->user_id = $this->info_player->id;
        $newCardBot->card_id = $card['id_card'];
        $newCardBot->room_id = $id_room;
    }
}
