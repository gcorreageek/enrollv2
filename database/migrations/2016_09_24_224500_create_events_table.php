<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prefix', 32)->unique();
            $table->string('pre', 64);
            $table->string('name', 128);
            $table->string('owner', 255);
            $table->string('city', 128);
            $table->date('date');
            $table->boolean('enabled');
            $table->boolean('closed');
            $table->boolean('maintenance');
            $table->boolean('test_mode');
            $table->dateTime('subscription_open');
            $table->dateTime('subscription_close');
            $table->smallInteger('lock_lapse', false, true)->default(0);
            $table->string('url_event', 255)->nullable();
            $table->string('url_disclaimer', 255)->nullable();
            $table->string('url_privacy', 255)->nullable();
            $table->string('url_parental', 255)->nullable();
            $table->string('url_rules', 255)->nullable();
            $table->string('url_codes', 255)->nullable();
            $table->string('url_expo', 255)->nullable();
            $table->string('default_location', 64)->default('pe,LIM,LIM');
            $table->mediumInteger('quota_modifier', false, true);
            $table->mediumInteger('quota_fixed', false, true);
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
        Schema::dropIfExists('events');
    }
}
