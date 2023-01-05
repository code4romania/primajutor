<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Guide;

class GuideStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'guide_id' => Guide::factory(),
            'title'    => $this->translatedFaker('sentence'),
            'content'  => $this->translatedFaker(
                fn () => '<p>' . implode('</p><p>', $this->faker->paragraphs()) . '</p>'
            ),
            'position' => $this->faker->numberBetween(0,10)
        ];
    }
}
