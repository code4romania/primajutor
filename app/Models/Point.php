<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\HasLocation;
use App\Concerns\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasLocation;

    public $translatable = [
        'title',
        'time_schedule',
    ];

    protected $fillable = [
        'title',
        'type',
        'address',
        'lat',
        'lng',
        'time_schedule',
        'county_id',
        'city_id',
    ];
}
