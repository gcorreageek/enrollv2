<?php

use Illuminate\Database\Seeder;

class RunnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('runners')->insert([
            'name_last' => 'Aparicio Izquierdo',
            'name_first' => 'Orlando',
            'gender' => 'M',
            'dob' => \Carbon\Carbon::createFromDate(1976, 2, 13),
            'doc_type' => 'DNI',
            'doc_num' => '10280649',
            'mail' => 'o.aparicio@maromina.pe',
            'telephone' => '2613700',
            'mobile' => '999996861',
            'country' => 'pe',
            'state' => 'LIM',
            'province' => 'LIM',
            'city' => 'SIS',
            'blood' => 'O+',
            'allergies' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
//
//        DB::table('runners')->insert([
//            'name_last' => 'García',
//            'name_first' => 'María del Valle',
//            'gender' => 'F',
//            'dob' => \Carbon\Carbon::createFromDate(1983, 8, 1),
//            'doc_type' => 'CEX',
//            'doc_num' => '000711520',
//            'mail' => 'mava.garcia@me.com',
//            'telephone' => '2613700',
//            'mobile' => '973820299',
//            'country' => 'pe',
//            'state' => 'LIM',
//            'province' => 'LIM',
//            'city' => 'SIS',
//            'blood' => 'O+',
//            'allergies' => 'penicilina',
//            'created_at' => \Carbon\Carbon::now(),
//            'updated_at' => \Carbon\Carbon::now(),
//        ]);
    }
}
