<?php

namespace App\Filament\Resources\HelpPointResource\Pages;

use App\Filament\Resources\HelpPointResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHelpPoint extends EditRecord
{
    protected static string $resource = HelpPointResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
