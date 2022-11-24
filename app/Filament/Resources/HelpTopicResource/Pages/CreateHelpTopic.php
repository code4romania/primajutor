<?php

namespace App\Filament\Resources\HelpTopicResource\Pages;

use App\Filament\Resources\HelpTopicResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHelpTopic extends CreateRecord
{
    protected static string $resource = HelpTopicResource::class;
}
