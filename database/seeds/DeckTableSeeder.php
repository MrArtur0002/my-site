<?php

use Illuminate\Database\Seeder;
use App\Deck;

class DeckTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deck = new Deck();
        $deck->name = 'Стартовая колода 1';
        $deck->image = 'image';
        $deck->description = 'Стартовая колода';
        $deck->timestamps = false;
        $deck->save();
    }
}
