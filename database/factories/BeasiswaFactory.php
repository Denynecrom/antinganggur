<?php

namespace Database\Factories;

use App\Models\Beasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\DateTime as date;

class BeasiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Beasiswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text($maxNbChars = 50),
            'photo' => $this->faker->imageUrl($width = 640, $height = 480, null, false),
            'email' => $this->faker->unique()->companyEmail,
            'no_hp' => $this->faker->phoneNumber,
            'jenjang_pendidikan' =>$this->faker->randomElement(['D3 Teknik Informatika', 'S1 Statistika', 'S1 Bahasa Iggris', 'S2 Hubungan International', 'S2 Bisnis Ekonomi']),
            'start_at' => $this->faker->dateTimeBetween($startDate = 'now'),
            'description' => $this->faker->text($maxNbChars = 255),
        ];
    }
}
