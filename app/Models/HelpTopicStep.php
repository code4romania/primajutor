<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HelpTopicStep extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $casts = [
        'content' => 'json'
    ];

    protected $fillable = [
        'step_number',
        'title',
        'content',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('banner')->singleFile();
    }

    public function helpTopic(): BelongsTo
    {
        return $this->belongsTo(HelpTopic::class, 'help_topic_id');
    }
}
