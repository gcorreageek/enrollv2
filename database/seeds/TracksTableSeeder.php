<?php

use Illuminate\Database\Seeder;

class TracksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tracks')->insert([
            'engine_id' => 1,
            'name' => 'Carrera 6K',
            'slug' => '6K',
            'distance' => 6,
            'time' => \Carbon\Carbon::createFromTime(9, 0, 0),
            'gender' => null,
            'garment_id' => 1,
            'custom_bib' => false,
            'starting_corrals' => false,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('tracks')->insert([
            'engine_id' => 2,
            'name' => 'Maratón',
            'slug' => '42K',
            'distance' => 42.195,
            'time' => \Carbon\Carbon::createFromTime(7, 0, 0),
            'gender' => null,
            'garment_id' => 2,
            'custom_bib' => true,
            'starting_corrals' => true,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('tracks')->insert([
            'engine_id' => 2,
            'name' => 'Media Maratón',
            'slug' => '21K',
            'distance' => 21.098,
            'time' => \Carbon\Carbon::createFromTime(7, 0, 0),
            'gender' => null,
            'garment_id' => 3,
            'custom_bib' => true,
            'starting_corrals' => true,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('tracks')->insert([
            'engine_id' => 2,
            'name' => 'Carrera 10K',
            'slug' => '10K',
            'distance' => 10,
            'time' => \Carbon\Carbon::createFromTime(8, 30, 0),
            'gender' => null,
            'garment_id' => 3,
            'custom_bib' => true,
            'starting_corrals' => true,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('tracks')->insert([
            'engine_id' => 3,
            'name' => 'Carrera 9K',
            'slug' => '9K',
            'distance' => 9,
            'time' => \Carbon\Carbon::createFromTime(7, 30, 0),
            'gender' => null,
            'garment_id' => 4,
            'custom_bib' => false,
            'starting_corrals' => false,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('tracks')->insert([
            'engine_id' => 3,
            'name' => 'Carrera 5K',
            'slug' => '5K',
            'distance' => 5,
            'time' => \Carbon\Carbon::createFromTime(7, 30, 0),
            'gender' => null,
            'garment_id' => 4,
            'custom_bib' => false,
            'starting_corrals' => false,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
