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
            'range_id' => 0,
            'min' => 15,
            'max' => 17,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 1,
            'range_id' => 0,
            'min' => 18,
            'max' => 39,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 1,
            'range_id' => 0,
            'min' => 40,
            'max' => 99,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'range_id' => 0,
            'min' => 18,
            'max' => 34,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'range_id' => 0,
            'min' => 35,
            'max' => 39,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'range_id' => 0,
            'min' => 40,
            'max' => 44,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'range_id' => 0,
            'min' => 45,
            'max' => 49,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'range_id' => 0,
            'min' => 50,
            'max' => 54,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'range_id' => 0,
            'min' => 55,
            'max' => 59,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'range_id' => 0,
            'min' => 60,
            'max' => 64,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 2,
            'range_id' => 0,
            'min' => 65,
            'max' => 99,
            'description' => '65+',
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'range_id' => 0,
            'min' => 18,
            'max' => 34,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'range_id' => 0,
            'min' => 35,
            'max' => 39,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'range_id' => 0,
            'min' => 40,
            'max' => 44,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'range_id' => 0,
            'min' => 45,
            'max' => 49,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'range_id' => 0,
            'min' => 50,
            'max' => 54,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'range_id' => 0,
            'min' => 55,
            'max' => 59,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'range_id' => 0,
            'min' => 60,
            'max' => 64,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 3,
            'range_id' => 0,
            'min' => 65,
            'max' => 99,
            'description' => '65+',
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'range_id' => 0,
            'min' => 16,
            'max' => 34,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'range_id' => 0,
            'min' => 35,
            'max' => 39,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'range_id' => 0,
            'min' => 40,
            'max' => 44,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'range_id' => 0,
            'min' => 45,
            'max' => 49,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'range_id' => 0,
            'min' => 50,
            'max' => 54,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'range_id' => 0,
            'min' => 55,
            'max' => 59,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'range_id' => 0,
            'min' => 60,
            'max' => 64,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 4,
            'range_id' => 0,
            'min' => 65,
            'max' => 99,
            'description' => '65+',
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);










        DB::table('categories')->insert([
            'track_id' => 5,
            'range_id' => 5,
            'min' => 1998,
            'max' => 1928,
            'description' => '18+',
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 5,
            'range_id' => 6,
            'min' => 1998,
            'max' => 1977,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);







        DB::table('categories')->insert([
            'track_id' => 6,
            'range_id' => 5,
            'min' => 1998,
            'max' => 1928,
            'description' => '18+',
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 6,
            'range_id' => 6,
            'min' => 1998,
            'max' => 1977,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 6,
            'range_id' => 6,
            'min' => 1976,
            'max' => 1928,
            'description' => '40+',
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'track_id' => 6,
            'range_id' => 7,
            'min' => 2001,
            'max' => 1999,
            'description' => null,
            'gender' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
