<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\HasLocation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Course extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasLocation;

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
}
