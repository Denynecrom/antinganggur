<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MagangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('magangs')->insert([
        	'name' => 'PT Govin',
        	'email' => 'govinyudian.p@gmail.com',
        	'no_hp' => '085822946722',
        	'keahlian' => 'Laravel',
        	'pendidikan' => 'd3 teknik informatika',
        	'gaji' => 10000000,
        	]);
    }
}
