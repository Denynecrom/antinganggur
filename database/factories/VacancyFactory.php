<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Company;
use App\Models\Advertisement;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacancyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacancy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'advertisement_id' => Advertisement::factory(),
        ];
    }
}
