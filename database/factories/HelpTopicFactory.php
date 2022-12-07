<?php

declare(strict_types=1);

namespace Database\Factories;

use Faker\Generator;

class HelpTopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'        => $this->translatedFaker('sentence'),
            'slug'         => $this->faker->slug(),
            'seo_title'    => $this->translatedFaker('sentence'),
            'seo_keywords' => $this->translatedFaker(
                fn (Generator $faker) => implode(',', $faker->words(3))
            ),
            'seo_description' => $this->translatedFaker('paragraph'),
        ];
    }
}
