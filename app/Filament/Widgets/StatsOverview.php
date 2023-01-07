<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Course;
use App\Models\Guide;
use App\Models\Point;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Help Points', Point::count()),
            Card::make('Help Guides', Guide::count()),
            Card::make('Help Courses', Course::count()),
        ];
    }
}
