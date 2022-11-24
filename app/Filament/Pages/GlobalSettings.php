<?php

namespace App\Filament\Pages;

use App\Settings\GlobalSettings as SpatieGlobalSettings;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class GlobalSettings extends SettingsPage
{
    use HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = SpatieGlobalSettings::class;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('seo_title')
                ->required(),
            TextArea::make('seo_keywords')
                ->required(),
            TextArea::make('seo_description')
                ->required(),
            TextInput::make('contact_email')
                ->required(),
            TextInput::make('facebook')
                ->required(),
            TextInput::make('instagram')
                ->required(),
            TextInput::make('youtube')
                ->required(),
        ];
    }
}
