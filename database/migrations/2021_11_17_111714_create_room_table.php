<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('description');
            $table->unsignedBigInteger('deck_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('current_user_id');
            $table->text('difficulty');
            $table->unsignedBigInteger('id_room');
            $table->foreign('deck_id')->references('id')->on('deck')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('current_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('last_move');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room');
    }
}
