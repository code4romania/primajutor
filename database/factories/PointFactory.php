<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\City;
use App\Models\County;

class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'         => $this->translatedFaker('sentence'),
            'type'          => $this->faker->randomElement(['defibrilator', 'punct-ajutor']),
            'county_id'     => County::factory(),
            'city_id'       => City::factory(),
            'address'       => $this->faker->address(),
            'lat'           => $this->faker->latitude(min: 43.66, max: 48.21),
            'lng'           => $this->faker->longitude(min: 20.29, max: 29.61),
            'time_schedule' => $this->faker->sentence(3),
        ];
    }
}
