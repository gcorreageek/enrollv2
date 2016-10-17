<?php

use Illuminate\Database\Seeder;

class CodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('codes')->insert([
            'track_id' => 1,
            'range_id' => 1,
            'code' => 'AAAAAAAA',
            'redeemed' => false,
            'locked' => false,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 1,
            'range_id' => 2,
            'code' => 'BBBBBBBB',
            'redeemed' => false,
            'locked' => false,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 2,
            'range_id' => 3,
            'code' => 'CCCCCCCC',
            'redeemed' => false,
            'locked' => false,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 2,
            'range_id' => 4,
            'code' => 'DDDDDDDD',
            'redeemed' => false,
            'locked' => false,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 2,
            'range_id' => 4,
            'code' => 'EEEEEEEE',
            'redeemed' => false,
            'locked' => false,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 3,
            'range_id' => 3,
            'code' => 'FFFFFFFF',
            'redeemed' => false,
            'locked' => false,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 3,
            'range_id' => 4,
            'code' => 'GGGGGGGG',
            'redeemed' => false,
            'locked' => false,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 3,
            'range_id' => 4,
            'code' => 'HHHHHHHH',
            'redeemed' => false,
            'locked' => false,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 4,
            'range_id' => 3,
            'code' => 'IIIIIIII',
            'redeemed' => false,
            'locked' => false,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 4,
            'range_id' => 4,
            'code' => 'JJJJJJJJ',
            'redeemed' => false,
            'locked' => false,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 4,
            'range_id' => 4,
            'code' => 'KKKKKKKK',
            'redeemed' => false,
            'locked' => false,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 4,
            'range_id' => 4,
            'code' => 'LLLLLLLL',
            'redeemed' => false,
            'locked' => false,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
