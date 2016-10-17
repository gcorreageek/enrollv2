<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'prefix' => '170521_lima42k',
            'pre' => 'La Maratón',
            'name' => 'Movistar Lima42k',
            'owner' => 'Adidas del Perú',
            'city' => 'Lima',
            'date' => \Carbon\Carbon::createFromDate(2017, 5, 21),
            'enabled' => true,
            'maintenance' => false,
            'test_mode' => true,
            'url_event' => 'http://www.lima42k.com',
            'url_disclaimer' => 'http://lima42k.com/disclaimer',
            'url_privacy' => null,
            'url_parental' => null,
            'url_rules' => 'http://www.lima42k.com/informacion/reglamento',
            'url_codes' => 'http://www.lima42k.com',
            'url_expo' => 'http://www.lima42k.com/informacion/expo',
            'default_location' => 'pe,LIM,LIM',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('events')->insert([
            'prefix' => '161112_dpworld',
            'pre' => 'La Carrera',
            'name' => 'DP World Callao 6k',
            'owner' => 'DP World Callao',
            'city' => 'Callao',
            'date' => \Carbon\Carbon::createFromDate(2016, 11, 12),
            'enabled' => true,
            'maintenance' => false,
            'test_mode' => false,
            'url_event' => null,
            'url_disclaimer' => null,
            'url_privacy' => null,
            'url_parental' => null,
            'url_rules' => null,
            'url_codes' => null,
            'url_expo' => null,
            'default_location' => 'pe,LIM,LIM',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('events')->insert([
            'prefix' => '170129_santamaria',
            'pre' => 'La Carrera',
            'name' => 'Santa María 7k',
            'owner' => 'ZM Promociones S.R.L.',
            'city' => 'Santa María del Mar',
            'date' => \Carbon\Carbon::createFromDate(2017, 1, 29),
            'enabled' => true,
            'maintenance' => false,
            'test_mode' => false,
            'url_event' => null,
            'url_disclaimer' => null,
            'url_privacy' => null,
            'url_parental' => null,
            'url_rules' => null,
            'url_codes' => null,
            'url_expo' => null,
            'default_location' => 'pe,LIM,LIM',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
