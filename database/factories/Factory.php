<?php

declare(strict_types=1);

namespace Database\Factories;

use Closure;
use Illuminate\Database\Eloquent\Factories\Factory as BaseFactory;

abstract class Factory extends BaseFactory
{
    public function translatedFaker(string | Closure $formatter): array
    {
        return collect(config('filament-spatie-laravel-translatable-plugin.default_locales'))
            ->flip()
            ->map(
                fn () => $formatter instanceof Closure
                    ? $formatter($this->faker)
                    : $this->faker->$formatter()
            )
            ->toArray();
    }
}
