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
            'name' => 'Polo Maratón',
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garments')->insert([
            'name' => 'Polo Media Maratón y 10k',
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
