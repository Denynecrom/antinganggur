<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'firstname' => $this->faker->firstName,
            // 'lastname' => $this->faker->lastName,
            'name' =>$this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'gender' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->streetAddress,
            'birthdate' => $this->faker->dateTimeThisCentury,
            'password' => 'secret', // password
            // 'province_id' => Province::all()->random(),
            'remember_token' => Str::random(10),
        ];
    }
}
