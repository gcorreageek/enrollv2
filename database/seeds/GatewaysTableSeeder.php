<?php

use Illuminate\Database\Seeder;

class GatewaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gateways')->insert([
            'name' => 'Visa',
            'store_id' => '331853513',
            'enabled' => true,
            'url_production' => 'https://zmpromociones.com/store/pos/vs_checkout.php',
            'url_development' => 'http://epos.dev/emulator.php',
            'url_emulator' => 'https://zmpromociones.com/store/pos/vs_emulator.php',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('gateways')->insert([
            'name' => 'MasterCard',
            'store_id' => '4000986',
            'enabled' => true,
            'url_production' => 'https://zmpromociones.com/store/pos/mc_checkout.php',
            'url_development' => 'http://epos.dev/emulator.php',
            'url_emulator' => 'https://zmpromociones.com/store/pos/mc_emulator.php',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('gateways')->insert([
            'name' => 'Diners Club',
            'store_id' => '4000986',
            'enabled' => true,
            'url_production' => 'https://zmpromociones.com/store/pos/dn_checkout.php',
            'url_development' => 'http://epos.dev/emulator.php',
            'url_emulator' => 'https://zmpromociones.com/store/pos/dn_emulator.php',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
