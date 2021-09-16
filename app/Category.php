<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
       * Связанная с моделью таблица.
       *
       * @var string
    */
    protected $table = 'cart_categories';
}
