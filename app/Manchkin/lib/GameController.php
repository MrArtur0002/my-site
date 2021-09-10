<?php
namespace App\Manchkin\Lib;
use App\Manchkin\Lib\GameLobby;
use App\Manchkin\Lib\GameMechanic;
use App\Manchkin\Lib\CheckAction;

class GameController
{
    private $gameMechanic = new GameMechanic;
    private $checkAction = new CheckAction;
}
