<?php

use Illuminate\Database\Seeder;

class GarmentSizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('garment_size')->insert([
            'garment_id' => 1,
            'size_id' => 6,
            'gender' => 'M',
            'stock' => 99999,
            'spent' => 10,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 1,
            'size_id' => 6,
            'gender' => 'F',
            'stock' => 99999,
            'spent' => 11,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 1,
            'size_id' => 7,
            'gender' => 'M',
            'stock' => 99999,
            'spent' => 27,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 1,
            'size_id' => 7,
            'gender' => 'F',
            'stock' => 99999,
            'spent' => 7,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 1,
            'size_id' => 8,
            'gender' => 'M',
            'stock' => 99999,
            'spent' => 16,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 1,
            'size_id' => 8,
            'gender' => 'F',
            'stock' => 99999,
            'spent' => 2,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 2,
            'size_id' => 5,
            'gender' => 'F',
            'stock' => 99999,
            'spent' => 4,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 2,
            'size_id' => 6,
            'gender' => 'M',
            'stock' => 99999,
            'spent' => 12,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 2,
            'size_id' => 6,
            'gender' => 'F',
            'stock' => 99999,
            'spent' => 2,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 2,
            'size_id' => 7,
            'gender' => 'M',
            'stock' => 99999,
            'spent' => 15,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 2,
            'size_id' => 7,
            'gender' => 'F',
            'stock' => 99999,
            'spent' => 4,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 2,
            'size_id' => 8,
            'gender' => 'M',
            'stock' => 99999,
            'spent' => 5,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 2,
            'size_id' => 8,
            'gender' => 'F',
            'stock' => 99999,
            'spent' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 2,
            'size_id' => 9,
            'gender' => 'M',
            'stock' => 99999,
            'spent' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 3,
            'size_id' => 5,
            'gender' => 'F',
            'stock' => 99999,
            'spent' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 3,
            'size_id' => 6,
            'gender' => 'M',
            'stock' => 99999,
            'spent' => 2,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 3,
            'size_id' => 6,
            'gender' => 'F',
            'stock' => 99999,
            'spent' => 8,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 3,
            'size_id' => 7,
            'gender' => 'M',
            'stock' => 99999,
            'spent' => 5,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 3,
            'size_id' => 7,
            'gender' => 'F',
            'stock' => 99999,
            'spent' => 4,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 3,
            'size_id' => 8,
            'gender' => 'M',
            'stock' => 99999,
            'spent' => 6,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 3,
            'size_id' => 8,
            'gender' => 'F',
            'stock' => 99999,
            'spent' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('garment_size')->insert([
            'garment_id' => 3,
            'size_id' => 9,
            'gender' => 'M',
            'stock' => 99999,
            'spent' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

    }
}
