<?php
namespace App\Manchkin\Lib;
use App\Manchkin\Lib\Card;
use App\Deck as ModelDeck;
use App\Card as ModelCard;
use App\DeckCard;

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
            $tekCard = ModelCard::find($card->card_id);
            if ($tekCard->type == 'door') {
                $this->doors[$card->id] = [$tekCard->type, $tekCard->title, $tekCard->image, $tekCard->value, $tekCard->description];
                $this->cards[$card->id] = [$card->active, $card->index, 'doors'];
            }
            else {
                $this->treasure[$card->id] = [$tekCard->type, $tekCard->title, $tekCard->image, $tekCard->value, $tekCard->description];
                $this->cards[$card->id] = [$card->active, $card->index, 'tresure'];
            }
        }
    }

    /**
     * Функция перетасовывает определенную колоду (Все карты с active 1 - в колоде, 2 - сброс. 3 и 4 не перемешиваются)
     *
     * @param $type enum(tresure, door) тип перемешиваемой колоды
     *
     */
    public function generateDecks($type) {
        $array_order_door = [];
        switch ($type) {
            case 'doors':
                $count_order_door = 1;
                $array_order_door = [];

                foreach ($this->cards as $key => $card) {
                    if ($card[2] == 'doors' && ($card[0] == '1' || $card[0] == '2')) {
                        $array_order_door[$count_order_door] = $key;
                        $count_order_door++;
                    }
                }

                shuffle($array_order_door);
                foreach ($array_order_door as $order => $door) {
                    $tekCard = DeckCard::find($door);
                    if (isset($tekCard)) {
                        $tekCard->index = $order + 1;
                        $tekCard->active = 1; // Возвращаем в колоду
                        $tekCard->save();
                        $this->cards[$door][1] = $order + 1;
                        $this->cards[$door][0] = 1;
                    }
                }
            break;

            case 'treasure':
                $array_order_treasure = [];

                foreach ($this->cards as $key => $card) {
                    if ($card[2] == 'tresure' && ($card[0] == '1' || $card[0] == '2')) {
                        $array_order_treasure[] = $key;
                    }
                }

                shuffle($array_order_treasure);

                foreach ($array_order_treasure as $order => $treasure) {
                    $tekCard = DeckCard::find($treasure);
                    $tekCard->index = $order + 1;
                    $tekCard->save();
                    $this->cards[$treasure][1] = $order + 1;
                }
            break;
        }
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
