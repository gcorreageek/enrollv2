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
            'application_id' => 1,
            'prefix' => '161112_dpworld',
            'pre' => 'La Carrera',
            'name' => 'DP World Callao 6k',
            'owner' => 'DP World Callao',
            'city' => 'Callao',
            'date' => \Carbon\Carbon::createFromDate(2016, 11, 12),
            'enabled' => true,
            'closed' => false,
            'maintenance' => false,
            'test_mode' => false,
            'subscription_open' => '2016-10-01 09:00:00',
            'subscription_close' => '2016-11-06 18:00:00',
            'lock_lapse' => 120,
            'url_event' => 'http://zmpromociones.com/store/dpworld/',
            'url_disclaimer' => null,
            'url_privacy' => null,
            'url_parental' => null,
            'url_rules' => 'http://zmpromociones.com/store/dpworld/informacion-y-reglamento/',
            'url_codes' => 'http://zmpromociones.com/store/dpworld/informacion-y-reglamento/',
            'url_expo' => 'http://zmpromociones.com/store/dpworld/informacion-y-reglamento/',
            'default_location' => 'pe,LIM,LIM',
            'quota_modifier' => 0,
            'quota_fixed' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('events')->insert([
            'application_id' => 1,
            'prefix' => '170521_lima42k',
            'pre' => 'La Maratón',
            'name' => 'Lima42k',
            'owner' => 'Adidas Perú',
            'city' => 'Lima',
            'date' => \Carbon\Carbon::createFromDate(2017, 5, 21),
            'enabled' => true,
            'closed' => false,
            'maintenance' => false,
            'test_mode' => true,
            'subscription_open' => '2016-10-01 09:00:00',
            'subscription_close' => '2017-05-14 18:00:00',
            'lock_lapse' => 120,
            'url_event' => 'http://www.lima42k.com',
            'url_disclaimer' => 'http://lima42k.com/disclaimer',
            'url_privacy' => null,
            'url_parental' => null,
            'url_rules' => 'http://www.lima42k.com/informacion/reglamento',
            'url_codes' => 'http://www.lima42k.com',
            'url_expo' => 'http://www.lima42k.com/informacion/expo',
            'default_location' => 'pe,LIM,LIM',
            'quota_modifier' => 0,
            'quota_fixed' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('events')->insert([
            'application_id' => 1,
            'prefix' => '161106_yura',
            'pre' => 'La Maratón',
            'name' => 'Yura 50 Años',
            'owner' => 'Yura S.A.',
            'city' => 'Arequipa',
            'date' => \Carbon\Carbon::createFromDate(2016, 11, 06),
            'enabled' => true,
            'closed' => false,
            'maintenance' => false,
            'test_mode' => true,
            'subscription_open' => '2016-10-01 09:00:00',
            'subscription_close' => '2017-05-14 18:00:00',
            'lock_lapse' => 120,
            'url_event' => 'http://www.lima42k.com',
            'url_disclaimer' => 'http://lima42k.com/disclaimer',
            'url_privacy' => null,
            'url_parental' => null,
            'url_rules' => 'http://www.lima42k.com/informacion/reglamento',
            'url_codes' => 'http://www.lima42k.com',
            'url_expo' => 'http://www.lima42k.com/informacion/expo',
            'default_location' => 'pe,ARE',
            'quota_modifier' => 0,
            'quota_fixed' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

    }
}
