<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameBotCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_bot_cards', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedTinyInteger('active');
            $table->unsignedBigInteger('bot_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('card_id');
            $table->foreign('room_id')->references('id')->on('room')->onDelete('cascade');
            $table->foreign('bot_id')->references('id')->on('game_bot')->onDelete('cascade');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_bot_cards');
    }
}
