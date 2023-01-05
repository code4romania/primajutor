<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\HasCourses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;
    use HasCourses;

    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }

    public function points(): HasMany
    {
        return $this->hasMany(Point::class);
    }
}
