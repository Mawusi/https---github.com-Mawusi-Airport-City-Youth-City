<?php

namespace App\Filament\Resources\SoulResource\Widgets;

use App\Models\Soul;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class SoulStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Soul Winners', Soul::all()->count())
        ];
    }
}
