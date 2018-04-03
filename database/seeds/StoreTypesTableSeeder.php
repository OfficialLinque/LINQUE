<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StoreTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('storetypes')->insert(array (
			0 => array (
				'strtype' => 'Retailer',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			1 => array (
				'strtype' => 'Distributor',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            )
        ));
    }
}
