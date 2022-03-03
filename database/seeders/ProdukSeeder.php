<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 10; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('produks')->insert([
                'users_id' => $faker->numberBetween(1,2,3,4),
    			'nama_produk' => ('Indomie'),
    			'qty' => $faker->numberBetween(20,30),
    			'jenis' => ('Makanan'),
    			'bv' => $faker->numberBetween(10,15),
    		]);
 
    	}
    }
}
