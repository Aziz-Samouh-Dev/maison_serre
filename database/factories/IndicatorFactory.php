<?php

namespace Database\Factories;

use App\Models\Indicator;
use Illuminate\Database\Eloquent\Factories\Factory;

class IndicatorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Indicator::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'temp' => $this->faker->numberBetween(24, 27) + $this->faker->randomNumber(2) / 100,
            'humidity' => $this->faker->numberBetween(95, 95),
            'soil_moisture' => $this->faker->numberBetween(2194, 4000),
            'light' => $this->faker->numberBetween(00, 01),
            'water_level' => $this->faker->numberBetween(300, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
