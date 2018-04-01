<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProdPackPriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('prodpackprice')->insert(array (
			0 => array (
                'id' => 1,
				'prodprice' => 200,
				'prodpack' => 'package 1',
				'prodid' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			1 => array (
                'id' => 2,
				'prodprice' => 300,
				'prodpack' => 'package 2',
				'prodid' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			2 => array (
                'id' => 3,
				'prodprice' => 100,
				'prodpack' => 'package 3',
				'prodid' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			3 => array (
                'id' => 4,
				'prodprice' => 123,
				'prodpack' => 'package 1',
				'prodid' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			4 => array (
                'id' => 5,
				'prodprice' => 342,
				'prodpack' => 'package 2',
				'prodid' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			5 => array (
                'id' => 6,
				'prodprice' => 5542,
				'prodpack' => 'package 3',
				'prodid' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			6 => array (
                'id' => 7,
				'prodprice' => 2000,
				'prodpack' => 'package 1',
				'prodid' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			7 => array (
                'id' => 8,
				'prodprice' => 3000,
				'prodpack' => 'package 2',
				'prodid' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			8 => array (
                'id' => 9,
				'prodprice' => 1000,
				'prodpack' => 'package 3',
				'prodid' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
        ));
    }
}
