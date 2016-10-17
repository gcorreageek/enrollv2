<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GatewaysTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(EnginesTableSeeder::class);
        $this->call(EngineGatewayTableSeeder::class);
        $this->call(TracksTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(RangesTableSeeder::class);
        $this->call(RangeTrackTableSeeder::class);
        $this->call(CodesTableSeeder::class);
        $this->call(RunnersTableSeeder::class);
        $this->call(RunnerTrackTableSeeder::class);
        $this->call(GarmentsTableSeeder::class);
        $this->call(SizesTableSeeder::class);
        $this->call(GarmentSizeTableSeeder::class);
        $this->call(RatesTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(ApplicationsTableSeeder::class);
    }
}
