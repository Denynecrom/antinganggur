<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Advertisement::factory()->count(1)->create();
        // $faker = Faker::create('id_ID');
        // for ($i = 1; $i <= 50; $i++){
        // 	DB::table('advertisements')->insert([
        //     'description' => $faker->text($maxNbChars = 200),
        //     'jenis_pekerjaan' => $faker->randomElement(['fulltime', 'parttime']),
        //     'qualification' => $faker->text($maxNbChars = 200),
        //     'salary' => $faker->numberBetween(3000000, 8000000),
        //     'company_id' => seeder(Company::class),
        // 	]);
        // }
    }
}
