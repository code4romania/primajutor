<?php

declare(strict_types=1);

namespace Database\Factories;

class CountyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city(),
        ];
    }
}
