<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRunnerTrackTableAddTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('runner_track', function (Blueprint $table) {
            $table->integer('ticket', false, true)->default(0)->after('bib');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('runner_track', function (Blueprint $table) {
            $table->dropColumn('ticket');
        });
    }
}
