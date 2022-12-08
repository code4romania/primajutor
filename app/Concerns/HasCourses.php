<?php

declare(strict_types=1);

namespace App\Concerns;

use App\Models\Course;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasCourses
{
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
