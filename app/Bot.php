<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    /**
       * Связанная с моделью таблица.
       *
       * @var string
    */
    protected $table = 'game_bot';

    /**
     * Получить телефон, связанный с пользователем.
     */
    public function botDesc()
    {
        return $this->hasOne(BotDesc::class, 'bot_id');
    }
}
