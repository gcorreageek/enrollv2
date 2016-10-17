<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_last', 128);
            $table->string('name_first', 128);
            $table->string('gender', 1);
            $table->date('dob');
            $table->string('doc_type', 8);
            $table->string('doc_num', 64);
            $table->string('mail', 128);
            $table->string('telephone', 32);
            $table->string('mobile', 32);
            $table->string('country', 8);
            $table->string('state', 8);
            $table->string('province', 8);
            $table->string('city', 8);
            $table->string('blood', 8);
            $table->longText('allergies')->nullable();
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
        Schema::dropIfExists('runners');
    }
}
