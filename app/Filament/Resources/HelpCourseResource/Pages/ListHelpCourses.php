<?php

namespace App\Filament\Resources\HelpCourseResource\Pages;

use App\Filament\Resources\HelpCourseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHelpCourses extends ListRecords
{
    protected static string $resource = HelpCourseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
