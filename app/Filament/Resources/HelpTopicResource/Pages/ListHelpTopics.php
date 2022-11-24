<?php

namespace App\Filament\Resources\HelpTopicResource\Pages;

use App\Filament\Resources\HelpTopicResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHelpTopics extends ListRecords
{
    protected static string $resource = HelpTopicResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
