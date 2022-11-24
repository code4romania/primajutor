<?php

namespace App\Filament\Widgets;

use App\Models\HelpCourse;
use App\Models\HelpPoint;
use App\Models\HelpTopic;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Help Points', HelpPoint::count()),
            Card::make('Help Topics', HelpTopic::count()),
            Card::make('Help Courses', HelpCourse::count()),
        ];
    }

}
