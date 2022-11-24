<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HelpTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'seo_title',
        'seo_keywords',
        'seo_description',
    ];

    public function helpTopicSteps(): HasMany
    {
        return $this->hasMany(HelpTopicStep::class);
    }
}
