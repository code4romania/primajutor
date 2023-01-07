<?php

declare(strict_types=1);

namespace App\Filament\Resources\GuideResource\Pages;

use App\Filament\Resources\GuideResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGuide extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = GuideResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
