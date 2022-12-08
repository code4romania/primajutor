<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\City;
use App\Models\County;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'     => $this->translatedFaker('sentence'),
            'county_id' => County::factory(),
            'city_id'   => City::factory(),
            'info'      => $this->translatedFaker('sentence'),
            'link'      => $this->faker->url(),
            'date'      => $this->faker->dateTimeThisYear(),
        ];
    }
}
