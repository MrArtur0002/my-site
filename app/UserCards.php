<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCards extends Model
{
    /**
       * Связанная с моделью таблица.
       *
       * @var string
    */
    protected $table = 'users_cards';
}
