<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Province;
use App\Models\BusinessField;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->companyEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->streetAddress,
            'description' => $this->faker->text($maxNbChars = 200),
            'password' => 'secret', // password
            'businessfield_id' => BusinessField::all()->random(),
            'province_id' => Province::all()->random(),
        ];
    }
}
