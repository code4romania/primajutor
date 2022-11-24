<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HelpPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'address',
        'lat',
        'lng',
        'time_schedule',
        'county_id',
        'city_id'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }
}
