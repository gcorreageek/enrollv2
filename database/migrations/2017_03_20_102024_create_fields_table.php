<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('track_id', false, true);
            $table->string('type', 32)->default('text');
            $table->string('name', 32);
            $table->boolean('required');
            $table->longText('label')->nullable();
            $table->boolean('label_enabled');
            $table->string('placeholder', 128)->nullable();
            $table->string('css_class', 128)->nullable();
            $table->string('css_id', 64)->nullable();
            $table->longText('options')->nullable();
            $table->boolean('persist');
            $table->boolean('checked');
            $table->text('error_message', 255)->nullable();
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
        Schema::dropIfExists('fields');
    }
}
