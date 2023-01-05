<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\HasCourses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class County extends Model
{
    use HasFactory;
    use HasCourses;

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function points(): HasMany
    {
        return $this->hasMany(Point::class);
    }
}
