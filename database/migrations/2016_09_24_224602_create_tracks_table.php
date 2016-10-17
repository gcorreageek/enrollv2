<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('engine_id', false, true);
            $table->string('name', 64);
            $table->string('slug', 16);
            $table->decimal('distance', 8, 3);
            $table->time('time');
            $table->string('gender', 1)->nullable();
            $table->integer('garment_id', false, true);
            $table->boolean('custom_bib');
            $table->string('description', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracks');
    }
}
