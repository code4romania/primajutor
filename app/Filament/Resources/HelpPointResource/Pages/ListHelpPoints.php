<?php

namespace App\Filament\Resources\HelpPointResource\Pages;

use App\Filament\Resources\HelpPointResource;
use App\Filament\Widgets\StatsWidget;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHelpPoints extends ListRecords
{

    protected static string $resource = HelpPointResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

}
