<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(array (
			0 => array (
                'fname' => 'retailer',
                'lname' => 'retailer',
                'email' => 'retailer@gmail.com',
                'password' => bcrypt('retailer'),
                'strname' => 'retailer',
                'strtype' => 1,
                'strlocation' => '7.043133300000001,125.57429599999999',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
			1 => array (
                'fname' => 'distributor',
                'lname' => 'distributor',
                'email' => 'distributor@gmail.com',
                'password' => bcrypt('distributor'),
                'strname' => 'distributor',
                'strtype' => 2,
                'strlocation' => '7.043133300000001,125.57429599999999',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
        ));
    }
}
