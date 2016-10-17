<?php

use Illuminate\Database\Seeder;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applications')->insert([
            'version' => '2.0',
            'owner_name' => 'Pacific Timing E.I.R.L.',
            'owner_nickname' => 'Pacific Timing',
            'owner_id' => '00000000000',
            'owner_address' => 'Calle Los Halcones 348, Surquillo',
            'owner_telephone' => '221-6282',
            'owner_mail' => 'info@pacifictiming.com',
            'owner_url' => 'http://www.pacifictiming.com',
            'support_mail' => 'soporte@pacifictiming.com',
            'support_telephone' => '253-5278',
            'support_availability' => 'Lun - Vie / 9:00 a 17:00 UTC -5',
            'barcode_repository' => 'https://zmpromociones.com/store/barcode_repository/',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
