<?php
namespace App\Manchkin\Lib;
use App\Manchkin\Lib\GameLobby;
use App\Manchkin\Lib\GameMechanic;
use App\Manchkin\Lib\CheckAction;

final class GameController
{
    private static $instance = null;
    /*private $gameMechanic = new GameMechanic;
    private $checkAction = new CheckAction;*/

    protected function __construct() { }

    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
