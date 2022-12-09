<?php

namespace App\Filament\Resources\HelpPointResource\Pages;

use App\Filament\Resources\HelpPointResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHelpPoint extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = HelpPointResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
