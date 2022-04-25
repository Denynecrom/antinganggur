<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = [
        ['name' => 'ACEH'],
        ['name' => 'SUMATERA UTARA'],
        ['name' => 'SUMATERA BARAT'],
        ['name' => 'RIAU'],
        ['name' => 'KEPULAUAN RIAU'],
        ['name' => 'JAMBI'],
        ['name' => 'SUMATERA SELATAN'],
        ['name' => 'BENGKULU'],
        ['name' => 'KEPULAUAN BANGKA BELITUNG'],
        ['name' => 'LAMPUNG'],
        ['name' => 'BANTEN'],
        ['name' => 'DKI JAKARTA'],
        ['name' => 'JAWA BARAT'],
        ['name' => 'JAWA TENGAH'],
        ['name' => 'DAERAH ISTIMEWA YOGYAKARTA'],
        ['name' => 'JAWA TIMUR'],
        ['name' => 'BALI'],
        ['name' => 'NUSA TENGGARA BARAT'],
        ['name' => 'NUSA TENGGARA TIMUR'],
        ['name' => 'KALIMANTAN BARAT'],
        ['name' => 'KALIMANTAN TENGAH'],
        ['name' => 'KALIMANTAN SELATAN'],
        ['name' => 'KALIMANTAN TIMUR'],
        ['name' => 'KALIMANTAN UTARA'],
        ['name' => 'SULAWESI UTARA'],
        ['name' => 'SULAWESI TENGAH'],
        ['name' => 'SULAWESI SELATAN'],
        ['name' => 'SULAWESI TENGGARA'],
        ['name' => 'GORONTALO'],
        ['name' => 'SULAWESI BARAT'],
        ['name' => 'MALUKU'],
        ['name' => 'MALUKU UTARA'],
        ['name' => 'PAPUA'],
        ['name' => 'PAPUA BARAT'],

    ];
    DB::table('provinces')->insert($p);
    }
}
