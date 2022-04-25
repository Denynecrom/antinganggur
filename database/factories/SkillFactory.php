<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class SkillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Skill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_skl' => $this->faker->randomElement(['php', 'java', 'python','javascript']),
            'level_skl' => $this->faker->randomElement(['biasa', 'mahir', 'sangat mahir']),
            'user_id' => User::factory(),
        ];
    }
}
