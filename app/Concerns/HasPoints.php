<?php

declare(strict_types=1);

namespace App\Concerns;

use App\Models\Point;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasPoints
{
    public function points(): HasMany
    {
        return $this->hasMany(Point::class);
    }
}
