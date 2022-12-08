<?php

declare(strict_types=1);

namespace App\Filament\Resources\PointResource\Pages;

use App\Filament\Resources\PointResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPoint extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = PointResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
