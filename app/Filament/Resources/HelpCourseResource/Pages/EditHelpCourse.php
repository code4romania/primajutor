<?php

namespace App\Filament\Resources\HelpCourseResource\Pages;

use App\Filament\Resources\HelpCourseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHelpCourse extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = HelpCourseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function updatingActiveFormLocale(): void
    {
        // disable auto save on locale switch
    }
}
