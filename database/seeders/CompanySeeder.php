<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Company::factory()->count(1)->create();
        // $faker = Faker::create('id_ID');
        // for ($i = 1; $i <= 50; $i++){
        // 	DB::table('companies')->insert([
        //     'name' => $faker->company,
        //     'email' => $faker->unique()->companyEmail,
        //     'phone' => $faker->phoneNumber,
        //     'address' => $faker->streetAddress,
        //     'description' => $faker->text($maxNbChars = 200),
        //     'password' => 'secret', // password
        // 	]);
        // }
    }
}
