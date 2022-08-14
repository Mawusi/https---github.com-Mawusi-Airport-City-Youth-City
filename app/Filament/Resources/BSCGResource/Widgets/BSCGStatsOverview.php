<?php

namespace App\Filament\Resources\BSCGResource\Widgets;

use App\Models\Bscg;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class BSCGStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total BSCGs', Bscg::all()->count())
        ];
    }
}
