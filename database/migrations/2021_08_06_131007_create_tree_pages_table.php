<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tree_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ancestor');
            $table->unsignedBigInteger('descendant');
            $table->foreign('ancestor')->references('id')->on('pages')->onDelete('cascade'); 
            $table->foreign('descendant')->references('id')->on('pages')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tree_pages');
    }
}
