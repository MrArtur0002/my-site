<?php
namespace App\Manchkin\Lib;
use App\Manchkin\Lib\Card;
use App\Deck as ModelDeck;
use App\Card as ModelCard;

class Deck
{
    public $cards;
    private $deck_info;
    public $doors;
    public $treasure;

    public function __construct($id_deck) {
        $this->deck_info = ModelDeck::find($id_deck);

        $all_id_cards = $this->deck_info->deckCards()->get();
        foreach ($all_id_cards as $card) {
            $this->cards[$card->id] = $card->active;
            $tekCard = ModelCard::find($card->card_id);
            if ($tekCard->type == 'door')
                $this->doors[$card->id] = [$tekCard->type, $tekCard->title, $tekCard->image, $tekCard->value, $tekCard->description];
            else
                $this->treasure[$card->id] = [$tekCard->type, $tekCard->title, $tekCard->image, $tekCard->value, $tekCard->description];
        }
    }

    /**
     * Функция перетасовывает определенную колоду
     *
     * @param $type enum(tresure, door) тип перемешиваемой колоды
     *
     */
    private function generateDecks($type) {

    }

    /**
     * Функция прикрепляет карту с колоды определенном игроку и помечает в колоде как уже используемую.
     *
     * @param int   $id_person id персонажа
     * @param boolean $isBot Является ли данный игрок - ботом.
     *
     */
    public function getCard($id_person, $isBot = false) {
        if ($isBot) {

        } else {

        }
    }
}
