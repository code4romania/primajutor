<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\City;

class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->city(),
            'county_id' => City::factory(),
        ];
    }
}
