<?php

declare(strict_types=1);

namespace App\Filament\Resources\GuideResource\Pages;

use App\Filament\Resources\GuideResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGuide extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = GuideResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\LocaleSwitcher::make(),
        ];
    }
}
