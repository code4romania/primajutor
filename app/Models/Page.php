<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Page extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    public $translatable = [
        'title',
        'content',
        'seo_title',
        'seo_description',
        'seo_keywords'
    ];

    protected $fillable = [
        'show_in_header',
        'show_in_footer',
        'title',
        'alias',
        'content',
        'seo_title',
        'seo_description',
        'seo_keywords'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('banner')->singleFile();
    }
}
