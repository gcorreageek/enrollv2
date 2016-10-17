<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunnerTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runner_track', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('runner_id', false, true);
            $table->integer('track_id', false, true);
            $table->boolean('enrolled')->default(false);
            $table->mediumInteger('bib', false, true);
            $table->integer('code_id', false, true);
            $table->integer('transaction_id', false, true);
            $table->integer('category_id', false, true);
            $table->integer('size_id', false, true);
            $table->string('nickname', 32)->nullable();
            $table->time('time_goal')->nullable();
            $table->time('time_best')->nullable();
            $table->string('event_name', 255)->nullable();
            $table->string('event_url', 255)->nullable();
            $table->string('relative_relationship', 32)->nullable();
            $table->string('relative_name', 64)->nullable();
            $table->string('relative_phone', 32)->nullable();
            $table->string('comment', 255)->nullable();
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
        Schema::dropIfExists('runner_track');
    }
}
