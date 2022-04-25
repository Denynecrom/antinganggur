<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Education;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class EducationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Education::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'institution' => $this->faker->company,
            'level_edu' => $this->faker->randomElement(['sd', 'smp', 'sma/smk', 'd1', 'd2', 'd3', 'd4', 's1']),
            'major' => $this->faker->randomElement(['IPA', 'IPS', 'Akutansi', 'Arsitektur', 'Web Programming']),
            'graduated_date' => $this->faker->dateTimeThisYear,
            'user_id' => User::factory(),
        ];
    }
}
