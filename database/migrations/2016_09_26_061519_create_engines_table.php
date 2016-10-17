<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnginesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id', false, true);
            $table->string('name', 16);
            $table->boolean('enabled');
            $table->boolean('codes_enabled');
            $table->boolean('coupons_enabled');
            $table->string('assign_method', 16); //onAge, onYear
            $table->boolean('delegate_pickup');
            $table->string('event_change', 16); //allowDecrease, notAllowed, allowAll
            $table->string('description', 128)->nullable();
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
        Schema::dropIfExists('engines');
    }
}
