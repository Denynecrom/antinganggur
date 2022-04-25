<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory('App\Models\User', 50)->create('id_ID');
        \App\Models\User::factory()->count(1)->create();
        // $faker = Faker::create('id_ID');
        // for ($i = 1; $i <= 50; $i++){
        // 	DB::table('users')->insert([
        //     'name' => $faker->name,
        //     'firstname' => $faker->firstName,
        //     'lastname' => $faker->lastName,
        //     'email' => $faker->unique()->safeEmail,
        //     'gender' => $faker->randomElement(['Laki-laki', 'Perempuan']),
        //     'phone' => $faker->phoneNumber,
        //     'address' => $faker->streetAddress,
        //     'birthdate' => $faker->dateTimeThisCentury,
        //     'password' => 'secret', // password
        //     'remember_token' => Str::random(10),
        // 	]);
        // }
    }
}
