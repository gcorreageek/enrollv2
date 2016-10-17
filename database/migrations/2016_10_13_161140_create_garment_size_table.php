<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGarmentSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garment_size', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('garment_id', false, true);
            $table->integer('size_id', false, true);
            $table->string('gender', 1);
            $table->mediumInteger('stock', false, true);
            $table->mediumInteger('spent', false, true);
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
        Schema::dropIfExists('garment_size');
    }
}
