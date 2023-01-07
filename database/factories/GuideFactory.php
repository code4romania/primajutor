<?php

declare(strict_types=1);

namespace Database\Factories;

class GuideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->translatedFaker('sentence'),
            'slug'  => $this->faker->slug(),
        ];
    }
}
