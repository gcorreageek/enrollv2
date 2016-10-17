<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('version', 32);
            $table->string('owner_name', 128);
            $table->string('owner_id', 64);
            $table->string('owner_address', 128);
            $table->string('owner_telephone', 32);
            $table->string('owner_mail', 64);
            $table->string('owner_url', 64);
            $table->string('support_mail', 64);
            $table->string('support_telephone', 64);
            $table->string('support_availability', 255);
            $table->string('barcode_repository', 128);
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
        Schema::dropIfExists('applications');
    }
}
