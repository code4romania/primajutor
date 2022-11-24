<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpCourse extends Model
{
    use HasFactory;

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
