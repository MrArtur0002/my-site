<?php
namespace App\Manchkin\Lib;

use App\Manchkin\Lib\Deck;
use App\Manchkin\Lib\Player;
use App\Room;
use App\Bot;
use App\BotDesc;
use App\RoomProp;
use App\Deck as ModelDeck;
use App\UserCards;
use App\BotCards;

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

        $this->deck->generateDecks('doors');
        $this->deck->generateDecks('treasure');

        $this->startGame();
    }

    private function startGame() {
        // Получение количества карт и из какой колоды для игрока
        $doors_user = $this->deck->getCards('doors', 3);
        $treasure_user = $this->deck->getCards('treasure', 3);

        /* Добавление в инвентарь игрока */
        foreach ($doors_user as $key => $door_user) {
            $this->players->addCardToUser($door_user, $this->info_lobby->id_room);
        }
        foreach ($treasure_user as $key => $treasure_item) {
            $this->players->addCardToUser($treasure_item, $this->info_lobby->id_room);
        }

        /* Раздача карт для ботов */
        /*for ($i=0; $i < 3; $i++) {
            $doors_bot = $this->deck->getCards('doors', 3);
            $treasures_bot = $this->deck->getCards('treasure', 3);
        }*/
    }

    /* Удаление лобби */
    public function clearLobby() {
        $lobby = Room::find($this->info_lobby->id);
        if ($lobby != null)
            $lobby->delete();

        $lobbyProp = RoomProp::where('room_id', $this->info_lobby->id)->get();
        foreach ($lobbyProp as $prop) {
            if ($prop != null)
                $prop->delete();
        }

        /* Пользователи */
        $user_cards = UserCards::where('room_id', $this->info_lobby->id)->get();
        foreach ($user_cards as $user) {
            if ($user != null)
                $user->delete();
        }

        /* Боты */
        $bot_cards = BotCards::where('room_id', $this->info_lobby->id)->get();
        foreach ($bot_cards as $bot) {
            if ($bot != null)
                $bot->delete();
        }
        $bots = Bot::where('room_id', $this->info_lobby->id)->get();
        foreach ($bots as $bot) {
            if ($bot != null)
                $bot->delete();
        }

    }
}
