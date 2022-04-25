<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class AdvertisementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advertisement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        	'position' => 'shopkeeper',
            'classification' => $this->faker->randomElement(['fulltime', 'parttime']),
            'work_experience' => $this->faker->numberBetween(0, 10),
            'education' => $this->faker->randomElement(['sd', 'smp', 'sma/smk', 'd1', 'd2', 'd3', 'd4', 's1']),
            'workdescription' => $this->faker->text($maxNbChars = 200),
            'qualification' => $this->faker->text($maxNbChars = 200),
            'salary' => $this->faker->numberBetween(3000000, 8000000),
            'needed' => $this->faker->numberBetween(1, 5),
            'start_at' => $this->faker->dateTimeBetween($startDate = '-10 days', $endDate = '-6 days'),
            'end_at' => $this->faker->dateTimeBetween($startDate = '-6 days', $endDate = 'now'),
            'show'=> $this->faker->numberBetween(0, 1),
            'company_id' => Company::factory(),
        ];
    }
}
