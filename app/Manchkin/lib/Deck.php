<?php
namespace App\Manchkin\Lib;
use App\Manchkin\Lib\Card;
use App\Deck as ModelDeck;

class Deck
{
    public $cards;
    private $deck_info;

    public function __construct($id_deck) {
        $this->deck_info = ModelDeck::find($id_deck);
        $all_id_cards = $this->deck_info->deckCards()->get();
        foreach ($all_id_cards as $card) {
            $this->cards[$card->id] = $card->active;
        }
    }

    /**
     * Функция прикрепляет карту с колоды определенном игроку и помечает в колоде как уже используемую.
     *
     * @param int   $id_person id персонажа
     * @param boolean $isBot Является ли данный игрок - ботом.
     *
     */
    private function getRandomCard($id_person, $isBot = false) {
        if ($isBot) {

        } else {

        }
    }
}
