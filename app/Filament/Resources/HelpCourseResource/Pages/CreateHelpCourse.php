<?php

namespace App\Filament\Resources\HelpCourseResource\Pages;

use App\Filament\Resources\HelpCourseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHelpCourse extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = HelpCourseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
