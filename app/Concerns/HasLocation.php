<?php

declare(strict_types=1);

namespace App\Concerns;

use App\Models\City;
use App\Models\County;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasLocation
{
    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
