<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gateway_id', false, true);
            $table->integer('track_id', false, true);
            $table->decimal('price',9, 2);
            $table->integer('coupon_id', false, true);
            $table->decimal('discount',9, 2);
            $table->decimal('amount',9, 2);
            $table->tinyInteger('status', false, true);
            $table->string('card_number', 32)->nullable();
            $table->string('authorization_code', 32)->nullable();
            $table->string('error', 16)->nullable();
            $table->string('hash', 128)->nullable();
            $table->string('store_id', 32);
            $table->string('message', 255)->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
