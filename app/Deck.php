<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    /**
       * Связанная с моделью таблица.
       *
       * @var string
    */
    protected $table = 'deck';

    public function deckCards()
    {
        return $this->hasMany(DeckCard::class, 'deck_id');
    }
}
