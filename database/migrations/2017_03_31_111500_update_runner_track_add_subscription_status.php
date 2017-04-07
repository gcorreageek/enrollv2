<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRunnerTrackAddSubscriptionStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('runner_track', function (Blueprint $table) {
            $table->longText('log')->nullable()->after('comment');
            $table->longText('error')->nullable()->after('enrolled');
            $table->boolean('enabled')->after('enrolled');
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
            $table->dropColumn('enabled');
            $table->dropColumn('log');
            $table->dropColumn('error');
        });
    }
}
