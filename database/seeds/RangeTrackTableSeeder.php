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
            'quota' => 2000,
            'count' => 52,
            'first' => 21,
            'last' => 72,
            'default' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('range_track')->insert([
            'range_id' => 2,
            'track_id' => 1,
            'quota' => 2000,
            'count' => 23,
            'first' => 2021,
            'last' => 2043,
            'default' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('range_track')->insert([
            'range_id' => 3,
            'track_id' => 2,
            'quota' => 100,
            'count' => 0,
            'first' => 1,
            'last' => 0,
            'default' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('range_track')->insert([
            'range_id' => 4,
            'track_id' => 2,
            'quota' => 2400,
            'count' => 43,
            'first' => 101,
            'last' => 143,
            'default' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('range_track')->insert([
            'range_id' => 3,
            'track_id' => 3,
            'quota' => 100,
            'count' => 0,
            'first' => 5001,
            'last' => 0,
            'default' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('range_track')->insert([
            'range_id' => 4,
            'track_id' => 3,
            'quota' => 3900,
            'count' => 16,
            'first' => 5101,
            'last' => 5116,
            'default' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('range_track')->insert([
            'range_id' => 3,
            'track_id' => 4,
            'quota' => 100,
            'count' => 0,
            'first' => 10001,
            'last' => 0,
            'default' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('range_track')->insert([
            'range_id' => 4,
            'track_id' => 4,
            'quota' => 8400,
            'count' => 12,
            'first' => 10101,
            'last' => 10112,
            'default' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
