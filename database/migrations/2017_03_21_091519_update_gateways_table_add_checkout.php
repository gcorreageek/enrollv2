<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateGatewaysTableAddCheckout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gateways', function (Blueprint $table) {
            $table->string('secret', 128)->nullable()->after('enabled');
            $table->string('key', 128)->nullable()->after('enabled');
            $table->string('checkout', 16)->default('offSite')->after('enabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gateways', function (Blueprint $table) {
            $table->dropColumn('secret');
            $table->dropColumn('key');
            $table->dropColumn('checkout');
        });
    }
}
