<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class HelpCourse extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'title',
        'info',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    protected $fillable = [
        'title',
        'county_id',
        'city_id',
        'info',
        'link',
        'date',
    ];

    protected $with = [
        'county',
        'city',
    ];

    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
