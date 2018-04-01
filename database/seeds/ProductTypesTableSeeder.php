<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('producttypes')->insert(array (
			0 => array (
                'prodid' => 1,
                'prodtype' => 'Bakery and Bread',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			1 => array (
                'prodid' => 2,
                'prodtype' => 'Meat and Seafood',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			2 => array (
                'prodid' => 3,
                'prodtype' => 'Pasta and Rice',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			3 => array (
                'prodid' => 4,
                'prodtype' => 'Oils, Sauces, and Condiments',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			4 => array (
                'prodid' => 5,
                'prodtype' => 'Cereals and Breakfast foods',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			5 => array (
                'prodid' => 6,
                'prodtype' => 'Soup and Canned Goods',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			6 => array (
                'prodid' => 7,
                'prodtype' => 'Frozen Foods',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			7 => array (
                'prodid' => 8,
                'prodtype' => 'Dairy, Cheese, and Eggs',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			8 => array (
                'prodid' => 9,
                'prodtype' => 'Snacks and Crackers',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			9 => array (
                'prodid' => 10,
                'prodtype' => 'Produce',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			10 => array (
                'prodid' => 11,
                'prodtype' => 'Dishwashing',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			11 => array (
                'prodid' => 12,
                'prodtype' => 'Haircare',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			12 => array (
                'prodid' => 13,
                'prodtype' => 'Healthcare Products',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			13 => array (
                'prodid' => 14,
                'prodtype' => 'Households',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			14 => array (
                'prodid' => 15,
                'prodtype' => 'Laundry Detergents',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			15 => array (
                'prodid' => 16,
                'prodtype' => 'Menstrual Hygiene',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			16 => array (
                'prodid' => 17,
                'prodtype' => 'Skin Care',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			17 => array (
                'prodid' => 18,
                'prodtype' => 'Beer',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			18 => array (
                'prodid' => 19,
                'prodtype' => 'Coffee',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			19 => array (
                'prodid' => 20,
                'prodtype' => 'Energy Drink',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			20 => array (
                'prodid' => 21,
                'prodtype' => 'Water',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			21 => array (
                'prodid' => 22,
                'prodtype' => 'Softdrinks',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			22 => array (
                'prodid' => 23,
                'prodtype' => 'Juice',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
        ));
    }
}
