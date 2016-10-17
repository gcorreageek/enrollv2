<?php

use Illuminate\Database\Seeder;

class RangeTrackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('range_track')->insert([
            'range_id' => 1,
            'track_id' => 1,
            'quota' => 100,
            'count' => 0,
            'first' => 1,
            'last' => 0,
            'default' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('range_track')->insert([
            'range_id' => 2,
            'track_id' => 1,
            'quota' => 1900,
            'count' => 0,
            'first' => 101,
            'last' => 0,
            'default' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('range_track')->insert([
            'range_id' => 1,
            'track_id' => 2,
            'quota' => 100,
            'count' => 0,
            'first' => 5001,
            'last' => 0,
            'default' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('range_track')->insert([
            'range_id' => 2,
            'track_id' => 2,
            'quota' => 3900,
            'count' => 0,
            'first' => 5101,
            'last' => 0,
            'default' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('range_track')->insert([
            'range_id' => 1,
            'track_id' => 3,
            'quota' => 100,
            'count' => 0,
            'first' => 10001,
            'last' => 0,
            'default' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('range_track')->insert([
            'range_id' => 2,
            'track_id' => 3,
            'quota' => 7900,
            'count' => 2,
            'first' => 10101,
            'last' => 10102,
            'default' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
