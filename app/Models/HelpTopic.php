<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class HelpTopic extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'seo_title',
        'seo_keywords',
        'seo_description',
    ];

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
