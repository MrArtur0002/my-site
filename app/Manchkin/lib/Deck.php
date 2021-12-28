<?php
namespace App\Manchkin\Lib;
use App\Manchkin\Lib\Card;
use App\Deck as ModelDeck;
use App\Card as ModelCard;
use App\RoomCards;
use App\DeckCard;

class Deck
{
    public $cards;
    private $deck_info;
    public $doors;
    public $treasure;

    public function __construct($id_room) {
        /*$this->deck_info = ModelDeck::find($id_deck);

        $all_id_cards = $this->deck_info->deckCards()->get();
        foreach ($all_id_cards as $card) {
            $tekCard = ModelCard::find($card->card_id);
            if ($tekCard->type == 'door') {
                $this->doors[$card->id] = [
                    'type' => $tekCard->type,
                    'title' => $tekCard->title,
                    'imageName' => $tekCard->image,
                    'value' => $tekCard->value,
                    'description' => $tekCard->description,
                    'index' => $card->index,
                    'active' => $card->active,
                    'id' => $card->id];
                $this->cards[$card->id] = [
                    'active' => $card->active,
                    'index' => $card->index,
                    'type' => 'doors',
                    'id' => $card->id ];
            }
            else {
                $this->treasure[$card->id] = [
                    'type' => $tekCard->type,
                    'title' => $tekCard->title,
                    'image' => $tekCard->image,
                    'value' => $tekCard->value,
                    'description' => $tekCard->description,
                    'index' => $card->index,
                    'active' => $card->active,
                    'id' => $card->id ];
                $this->cards[$card->id] = [
                    'active' => $card->active,
                    'index' => $card->index,
                    'type' => 'tresure',
                    'id' => $card->id ];
            }
        }*/
        $all_id_cards = RoomCards::where('room_id', $id_room)->get();
        foreach ($all_id_cards as $key => $card) {
            $tekCard = ModelCard::find($card->card_id);
            if ($tekCard->type == 'door') {
                $this->doors[$card->id] = [
                    'type' => $tekCard->type,
                    'title' => $tekCard->title,
                    'imageName' => $tekCard->image,
                    'value' => $tekCard->value,
                    'description' => $tekCard->description,
                    'index' => $card->index,
                    'active' => $card->active,
                    'id' => $card->id];
                $this->cards[$card->id] = [
                    'active' => $card->active,
                    'index' => $card->index,
                    'type' => 'doors',
                    'id' => $card->id ];
            }
            else {
                $this->treasure[$card->id] = [
                    'type' => $tekCard->type,
                    'title' => $tekCard->title,
                    'image' => $tekCard->image,
                    'value' => $tekCard->value,
                    'description' => $tekCard->description,
                    'index' => $card->index,
                    'active' => $card->active,
                    'id' => $card->id ];
                $this->cards[$card->id] = [
                    'active' => $card->active,
                    'index' => $card->index,
                    'type' => 'tresure',
                    'id' => $card->id ];
            }
        }
    }

    /**
     * Функция перетасовывает определенную колоду (Все карты с active 1 - в колоде, 2 - сброс, 3 игрок, 4 бот)
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
                    if ($card['type'] == 'doors' && ($card['active'] == '1' || $card['active'] == '2')) {
                        $array_order_door[$count_order_door] = $key;
                        $count_order_door++;
                    }
                }

                shuffle($array_order_door);
                foreach ($array_order_door as $order => $door) {
                    $tekCard = RoomCards::find($door);
                    if (isset($tekCard)) {
                        $tekCard->index = $order + 1;
                        $tekCard->active = 1; // Возвращаем в колоду
                        $tekCard->save();
                        $this->cards[$door]['index'] = $order + 1;
                        $this->cards[$door]['active'] = 1;
                    }
                }
            break;

            case 'treasure':
                $array_order_treasure = [];

                foreach ($this->cards as $key => $card) {
                    if ($card['type'] == 'tresure' && ($card['active'] == '1' || $card['active'] == '2')) {
                        $array_order_treasure[] = $key;
                    }
                }

                shuffle($array_order_treasure);

                foreach ($array_order_treasure as $order => $treasure) {
                    $tekCard = RoomCards::find($treasure);
                    $tekCard->index = $order + 1;
                    $tekCard->save();
                    $this->cards[$treasure]['index'] = $order + 1;
                }
            break;
        }
    }

    /**
     * Функция возвращает определенной количество карт с определенной колоды
     *
     * @param enum('doors', 'treasure')   $type тип колоды
     * @param integer $count количество карт
     *
     */
    public function getCards($type, $count = 0) {
        switch ($type) {
            case 'doors':
                $result = Array();
                usort($this->doors, $this->build_sorter('index'));
                for ($i=0; $i < $count; $i++) {
                    $key_array = array_key_first($this->doors);
                    $result[] = $this->doors[$key_array];
                    unset($this->doors[$key_array]);
                }
                return $result;
            break;

            case 'treasure':
                $result = Array();
                usort($this->treasure, $this->build_sorter('index'));
                for ($i=0; $i < $count; $i++) {
                    $key_array = array_key_first($this->treasure);
                    $result[] = $this->treasure[$key_array];
                    unset($this->treasure[$key_array]);
                }
                return $result;
            break;

            default:

            return [];
        }
    }

    public static function build_sorter($key) {
        return function ($item1, $item2) use ($key) {
            if ($item1[$key] == $item2[$key]) return 0;
            return ($item1[$key] < $item2[$key]) ? 1 : -1;
        };
    }

    public function createDeckToRoom($id_deck, $id_room) {
        $this->deck_info = ModelDeck::find($id_deck);

        $all_id_cards = $this->deck_info->deckCards()->get();

        foreach ($all_id_cards as $key => $card) {
            $newCard = new RoomCards;
            $newCard->room_id = $id_room;
            $newCard->card_id = $card->card_id;
            $newCard->active = 1;
            $newCard->index = 1;
            $newCard->save();

            $tekCard = ModelCard::find($card->card_id);

            if ($tekCard->type == 'door') {
                $this->doors[$newCard->id] = [
                    'type' => $tekCard->type,
                    'title' => $tekCard->title,
                    'imageName' => $tekCard->image,
                    'value' => $tekCard->value,
                    'description' => $tekCard->description,
                    'index' => $card->index,
                    'active' => $card->active,
                    'id' => $newCard->id,
                    'id_card' => $tekCard->id];
                $this->cards[$newCard->id] = [
                    'active' => $card->active,
                    'index' => $card->index,
                    'type' => 'doors',
                    'id' => $newCard->id,
                    'id_card' => $tekCard->id];
            }
            else {
                $this->treasure[$newCard->id] = [
                    'type' => $tekCard->type,
                    'title' => $tekCard->title,
                    'image' => $tekCard->image,
                    'value' => $tekCard->value,
                    'description' => $tekCard->description,
                    'index' => $card->index,
                    'active' => $card->active,
                    'id' => $newCard->id,
                    'id_card' => $tekCard->id ];
                $this->cards[$newCard->id] = [
                    'active' => $card->active,
                    'index' => $card->index,
                    'type' => 'tresure',
                    'id' => $newCard->id,
                    'id_card' => $tekCard->id ];
            }
        }
    }
}
