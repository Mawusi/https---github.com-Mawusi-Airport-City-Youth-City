<?php

namespace App\Filament\Resources\SoulWinnerResource\Widgets;

use App\Models\SoulWinner;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class SoulWinnerStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Soul Winners', SoulWinner::all()->count())
        ];
    }
}
