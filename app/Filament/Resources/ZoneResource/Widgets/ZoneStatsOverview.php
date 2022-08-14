<?php

namespace App\Filament\Resources\ZoneResource\Widgets;

use App\Models\Zone;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ZoneStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Zones', Zone::all()->count())
        ];
    }
}
