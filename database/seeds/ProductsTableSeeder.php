<?php

use Illuminate\Database\Seeder;

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
                'prodid' => 1,
				'sellerid' => 2,
				'prodimg' => 'testimg',
				'prodname' => 'Coca Cola',
				'proddesc' => 'Coca Cola product',
				'prodtype' => 12,
				'prodtotalquantity' => 300,
            ),
			1 => array (
                'prodid' => 2,
				'sellerid' => 2,
				'prodimg' => 'testimg',
				'prodname' => 'Nagoya Sardines',
				'proddesc' => 'sardinas gud ni',
				'prodtype' => 6,
				'prodtotalquantity' => 200,
            ),
			2 => array (
                'prodid' => 3,
				'sellerid' => 2,
				'prodimg' => 'testimg',
				'prodname' => 'Quickchow',
				'proddesc' => 'noodles',
				'prodtype' => 3,
				'prodtotalquantity' => 100,
            )
        ));
    }
}
