<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeckCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deck_cards', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('deck_id');
            $table->unsignedBigInteger('card_id');
            $table->unsignedTinyInteger('active');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
            $table->foreign('deck_id')->references('id')->on('deck')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deck_cards');
    }
}
