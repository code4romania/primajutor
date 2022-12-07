<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Settings\GlobalSettings as SpatieGlobalSettings;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms;
use Filament\Pages\SettingsPage;

class GlobalSettings extends SettingsPage
{
    use HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = SpatieGlobalSettings::class;

    protected function getFormSchema(): array
    {
        return [

            Forms\Components\Section::make('General')
                ->schema([
                    Forms\Components\TextInput::make('seo_title')
                        ->required(),
                    Forms\Components\TagsInput::make('seo_keywords')
                        ->separator()
                        ->required(),
                    Forms\Components\Textarea::make('seo_description')
                        ->required(),
                ]),

            Forms\Components\Section::make('Footer')
                ->schema([
                    Forms\Components\TextInput::make('contact_email')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('facebook')
                        ->required(),
                    Forms\Components\TextInput::make('instagram')
                        ->required(),
                    Forms\Components\TextInput::make('youtube')
                        ->required(),
                ]),

        ];
    }
}
