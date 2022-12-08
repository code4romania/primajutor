<?php

declare(strict_types=1);

namespace App\Filament\Resources\TopicResource\Pages;

use App\Filament\Resources\TopicResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTopic extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = TopicResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\LocaleSwitcher::make(),
        ];
    }
}
