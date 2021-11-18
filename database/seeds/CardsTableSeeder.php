<?php

use Illuminate\Database\Seeder;
use App\Card;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $card1 = new Card();
        $card1->name = '3872 орка';
        $card1->image = '1630998481.jpg';
        $card1->type = 'door';
        $card1->value = 0;
        $card1->description = '';
        $card1->category_id = '';
        $card1->timestamps = false;
        $card1->save();
    }
}
