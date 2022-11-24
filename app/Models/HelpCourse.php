<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HelpCourse extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'info'
    ];

    protected $casts = [
        'date' => 'date'
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
