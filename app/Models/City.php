<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class, 'id_parent');
    }

    public function helpPoints(): HasMany
    {
        return $this->hasMany(HelpPoint::class);
    }

    public function helpCourses(): HasMany
    {
        return $this->hasMany(HelpCourse::class);
    }
}
