<?php

use Illuminate\Database\Seeder;

class RatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->insert([
            'track_id' => 1,
            'price' => 30,
            'start' => \Carbon\Carbon::createFromDate(2016, 10, 1),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('rates')->insert([
            'track_id' => 2,
            'price' => 100,
            'start' => \Carbon\Carbon::createFromDate(2016, 10, 1),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('rates')->insert([
            'track_id' => 2,
            'price' => 110,
            'start' => \Carbon\Carbon::createFromDate(2017, 2, 1),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('rates')->insert([
            'track_id' => 2,
            'price' => 120,
            'start' => \Carbon\Carbon::createFromDate(2017, 4, 24),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('rates')->insert([
            'track_id' => 3,
            'price' => 80,
            'start' => \Carbon\Carbon::createFromDate(2016, 10, 1),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('rates')->insert([
            'track_id' => 3,
            'price' => 90,
            'start' => \Carbon\Carbon::createFromDate(2017, 2, 1),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('rates')->insert([
            'track_id' => 3,
            'price' => 100,
            'start' => \Carbon\Carbon::createFromDate(2017, 4, 24),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('rates')->insert([
            'track_id' => 4,
            'price' => 60,
            'start' => \Carbon\Carbon::createFromDate(2016, 10, 1),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('rates')->insert([
            'track_id' => 4,
            'price' => 75,
            'start' => \Carbon\Carbon::createFromDate(2017, 2, 1),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('rates')->insert([
            'track_id' => 4,
            'price' => 90,
            'start' => \Carbon\Carbon::createFromDate(2017, 4, 24),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);



        DB::table('rates')->insert([
            'track_id' => 5,
            'price' => 10,
            'start' => \Carbon\Carbon::createFromDate(2016, 10, 18),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('rates')->insert([
            'track_id' => 6,
            'price' => 10,
            'start' => \Carbon\Carbon::createFromDate(2016, 10, 18),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
