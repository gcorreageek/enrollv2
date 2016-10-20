<?php

use Illuminate\Database\Seeder;

class EnginesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('engines')->insert([
            'event_id' => 1,
            'name' => 'Default',
            'enabled' => true,
            'codes_enabled' => true,
            'coupons_enabled' => false,
            'assign_method' => 'onAge',
            'delegate_pickup' => true,
            'event_change' => 'allowDecrease',
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('engines')->insert([
            'event_id' => 2,
            'name' => 'Default',
            'enabled' => true,
            'codes_enabled' => true,
            'coupons_enabled' => false,
            'assign_method' => 'onAge',
            'delegate_pickup' => true,
            'event_change' => 'allowDecrease',
            'description' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
