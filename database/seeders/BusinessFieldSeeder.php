<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $b = [
        ['name' => 'Akunting / Audit / Layanan Pajak'],
        ['name' => 'Apparel & Fashion'],
        ['name' => 'Consumer Goods'],
        ['name' => 'Consumer Service'],
        ['name' => 'E-Commerce'],
        ['name' => 'Grosir / Ritel'],
        ['name' => 'Hiburan'],
        ['name' => 'Hospitality / Katering'],
        ['name' => 'Hukum'],
        ['name' => 'Industri Mesin / Peralatan Otomatisasi'],
        ['name' => 'Kendaraan Bermotor'],
        ['name' => 'Kesehatan / Farmasi'],
        ['name' => 'Konstruksi dan Bangunan'],
        ['name' => 'Konsultasi / Layanan Manajemen'],
        ['name' => 'Layanan Keuangan'],
        ['name' => 'Layanan Sosial / Organisasi Nirlaba'],
        ['name' => 'Logistik'],
        ['name' => 'Makanan / Minuman'],
        ['name' => 'Manajemen Sumber Daya Manusia (HRD) / Konsultasi
Manufaktur Umum'],
        ['name' => 'Market Research'],
        ['name' => 'Online Pubhising'],
        ['name' => 'Pakaian / Tekstil'],
        ['name' => 'Penerbitan / Percetakan'],
        ['name' => 'Pengembangan Properti'],
        ['name' => 'Perawatan Umum dan Distribusi'],
        ['name' => 'Periklanan'],
        ['name' => 'Pertambangan'],
        ['name' => 'Survey / Riset'],
        ['name' => 'Teknologi Informatika'],
        ['name' => 'Transportasi'],
        ['name' => 'Turisme / Agen Perjalanan'],
        ['name' => 'Venture Capital'],
        ['name' => 'Lainnya / Tidak Disebutkan'],

    ];
    DB::table('businessfields')->insert($b);
    }
}
