<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            'track_id' => 1,
            'min' => 15,
            'max' => 17,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 1,
            'min' => 18,
            'max' => 39,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 1,
            'min' => 40,
            'max' => 99,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'min' => 18,
            'max' => 34,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'min' => 35,
            'max' => 39,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'min' => 40,
            'max' => 44,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'min' => 45,
            'max' => 49,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'min' => 50,
            'max' => 54,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'min' => 55,
            'max' => 59,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'min' => 60,
            'max' => 64,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'min' => 65,
            'max' => 99,
            'description' => '65+',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'min' => 18,
            'max' => 34,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'min' => 35,
            'max' => 39,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'min' => 40,
            'max' => 44,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'min' => 45,
            'max' => 49,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'min' => 50,
            'max' => 54,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'min' => 55,
            'max' => 59,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'min' => 60,
            'max' => 64,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'min' => 65,
            'max' => 99,
            'description' => '65+',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'min' => 16,
            'max' => 34,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'min' => 35,
            'max' => 39,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'min' => 40,
            'max' => 44,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'min' => 45,
            'max' => 49,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'min' => 50,
            'max' => 54,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'min' => 55,
            'max' => 59,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'min' => 60,
            'max' => 64,
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'min' => 65,
            'max' => 99,
            'description' => '65+',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
