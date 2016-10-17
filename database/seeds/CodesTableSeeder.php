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
            'bib' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 1,
            'range_id' => 1,
            'code' => 'BBBBBBBB',
            'redeemed' => false,
            'bib' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 1,
            'range_id' => 2,
            'code' => 'CCCCCCCC',
            'redeemed' => false,
            'bib' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 1,
            'range_id' => 2,
            'code' => 'DDDDDDDD',
            'redeemed' => false,
            'bib' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 2,
            'range_id' => 1,
            'code' => 'EEEEEEEE',
            'redeemed' => false,
            'bib' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 2,
            'range_id' => 1,
            'code' => 'FFFFFFFF',
            'redeemed' => false,
            'bib' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 2,
            'range_id' => 2,
            'code' => 'GGGGGGGG',
            'redeemed' => false,
            'bib' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 2,
            'range_id' => 2,
            'code' => 'HHHHHHHH',
            'redeemed' => false,
            'bib' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 3,
            'range_id' => 1,
            'code' => 'IIIIIIII',
            'redeemed' => false,
            'bib' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 3,
            'range_id' => 1,
            'code' => 'JJJJJJJJ',
            'redeemed' => false,
            'bib' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 3,
            'range_id' => 2,
            'code' => 'KKKKKKKK',
            'redeemed' => true,
            'bib' => 10101,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('codes')->insert([
            'track_id' => 3,
            'range_id' => 2,
            'code' => 'LLLLLLLL',
            'redeemed' => false,
            'bib' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
