<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class BeasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Beasiswa::factory()->count(3)->create();
        // $faker = Faker::create('id_ID');
        // for ($i = 1; $i <= 50; $i++) {
        //     DB:table('beasiswa')->insert([
        //         'title' => $faker->text($maxNbChars = 50),
        //         'photo' => $faker->imageUrl($width = 640, $height = 480),
        //         'created_at' => $faker->dateTime,
        //         'description' => $faker->text($maxNbChars = 1000),

        //     ]);
        // }
    }
}
