<?php

use Illuminate\Database\Seeder;

class RunnerTrackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('runner_track')->insert([
            'runner_id' => 1,
            'track_id' => 3,
            'enrolled' => true,
            'bib' => 10101,
            'code_id' => 11,
            'transaction_id' => 0,
            'category_id' => 19,
            'size_id' => 8,
            'nickname' => 'orly',
            'time_goal' => '1:05:30',
            'time_best' => '1:08:17',
            'event_name' => 'Lima 42k 2016',
            'event_url' => 'http://www.themiamimarathon.com/',
            'relative_relationship' => 'conyuge',
            'relative_name' => 'María del Valle García',
            'relative_phone' => '973820299',
            'comment' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('runner_track')->insert([
            'runner_id' => 2,
            'track_id' => 3,
            'enrolled' => true,
            'bib' => 10102,
            'code_id' => 0,
            'transaction_id' => 1,
            'category_id' => 17,
            'size_id' => 6,
            'nickname' => 'mava',
            'time_goal' => '1:15:30',
            'time_best' => '1:18:17',
            'event_name' => 'Lima 42k 2016',
            'event_url' => 'http://www.themiamimarathon.com/',
            'relative_relationship' => 'conyuge',
            'relative_name' => 'Orlando Aparicio',
            'relative_phone' => '999996861',
            'comment' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
