<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->insert(array (
			0 => array (
                'id' => 1,
				'sellerid' => 2,
				'prodimg' => 'testimg',
				'prodname' => 'Coca Cola',
				'proddesc' => 'Coca Cola product',
				'prodtype' => 12,
				'prodtotalquantity' => 300,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			1 => array (
                'id' => 2,
				'sellerid' => 2,
				'prodimg' => 'testimg',
				'prodname' => 'Nagoya Sardines',
				'proddesc' => 'sardinas gud ni',
				'prodtype' => 6,
				'prodtotalquantity' => 200,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			2 => array (
                'id' => 3,
				'sellerid' => 2,
				'prodimg' => 'testimg',
				'prodname' => 'Quickchow',
				'proddesc' => 'noodles',
				'prodtype' => 3,
				'prodtotalquantity' => 100,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            )
        ));
    }
}