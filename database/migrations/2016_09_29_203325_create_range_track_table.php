<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRangeTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('range_track', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('range_id', false, true);
            $table->integer('track_id', false, true);
            $table->mediumInteger('quota', false, true);
            $table->mediumInteger('count', false, true);
            $table->mediumInteger('first', false, true);
            $table->mediumInteger('last', false, true);
            $table->boolean('default');
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
        Schema::dropIfExists('range_track');
    }
}
