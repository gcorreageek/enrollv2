<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRunnerTableMakeLocationNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('runners', function (Blueprint $table) {
            $table->string('state', 8)->nullable()->default(null)->change();
            $table->string('province', 8)->nullable()->default(null)->change();
            $table->string('city', 8)->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('runners', function (Blueprint $table) {
            $table->string('state', 8)->nullable(false)->change();
            $table->string('province', 8)->nullable(false)->change();
            $table->string('city', 8)->nullable(false)->change();
        });
    }
}
