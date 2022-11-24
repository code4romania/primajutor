<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GlobalSettings extends Settings
{
    public string $seo_title;

    public string $seo_description;

    public string $seo_keywords;

    public string $contact_email;

    public string $facebook;

    public string $instagram;

    public string $youtube;

    public static function group(): string
    {
        return 'general';
    }
}
