<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class LanguageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Language::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_lang' => $this->faker->randomElement(['Inggris', 'Indonesia', 'Rusia', 'Jerman']),
            'level_lang' => $this->faker->randomElement(['Pasif', 'Aktif']),
            'user_id' => User::factory(),
        ];
    }
}
