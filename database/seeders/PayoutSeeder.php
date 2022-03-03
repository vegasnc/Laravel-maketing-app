<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 2; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('payouts')->insert([
                'produk_id' => $faker->numberBetween(1,2),
    			'no_transaksi' => '002',
                'qty' => $faker->numberBetween(10,12)
    		]);
 
    	}
    }
}
