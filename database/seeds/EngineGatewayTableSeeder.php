<?php

use Illuminate\Database\Seeder;

class EngineGatewayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('engine_gateway')->insert([
            'engine_id' => 1,
            'gateway_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('engine_gateway')->insert([
            'engine_id' => 1,
            'gateway_id' => 2,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('engine_gateway')->insert([
            'engine_id' => 1,
            'gateway_id' => 3,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('engine_gateway')->insert([
            'engine_id' => 2,
            'gateway_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('engine_gateway')->insert([
            'engine_id' => 2,
            'gateway_id' => 2,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('engine_gateway')->insert([
            'engine_id' => 2,
            'gateway_id' => 3,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

    }
}
