<?php

use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            'name_short' => '6',
            'name_long' => '6',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('sizes')->insert([
            'name_short' => '8',
            'name_long' => '8',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('sizes')->insert([
            'name_short' => '10',
            'name_long' => '10',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('sizes')->insert([
            'name_short' => '12',
            'name_long' => '12',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('sizes')->insert([
            'name_short' => 'XSM',
            'name_long' => 'Extra Small',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('sizes')->insert([
            'name_short' => 'SML',
            'name_long' => 'Small',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('sizes')->insert([
            'name_short' => 'MED',
            'name_long' => 'Medium',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('sizes')->insert([
            'name_short' => 'LRG',
            'name_long' => 'Large',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('sizes')->insert([
            'name_short' => 'XLG',
            'name_long' => 'Extra Large',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('sizes')->insert([
            'name_short' => 'XXL',
            'name_long' => 'Extra Extra Large',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);


    }
}
