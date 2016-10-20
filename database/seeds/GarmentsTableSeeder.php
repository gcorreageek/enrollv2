<?php

use Illuminate\Database\Seeder;

class GarmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('garments')->insert([
            'name' => 'Polo DP World Callao 2016',
            'description' => null,
            'threshold' => 20,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garments')->insert([
            'name' => 'Polo Maratón',
            'description' => null,
            'threshold' => 30,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garments')->insert([
            'name' => 'Polo Media Maratón y 10k',
            'description' => null,
            'threshold' => 30,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garments')->insert([
            'name' => 'Polo Maratón Yura',
            'description' => null,
            'threshold' => 30,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
