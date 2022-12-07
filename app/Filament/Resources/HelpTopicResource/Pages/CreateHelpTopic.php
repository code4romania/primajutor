<?php

namespace App\Filament\Resources\HelpTopicResource\Pages;

use App\Filament\Resources\HelpTopicResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHelpTopic extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = HelpTopicResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
