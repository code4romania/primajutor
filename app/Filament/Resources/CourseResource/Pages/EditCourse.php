<?php

declare(strict_types=1);

namespace App\Filament\Resources\CourseResource\Pages;

use App\Filament\Resources\CourseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourse extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = CourseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
