<?php

namespace App\Filament\Resources\ChurchResource\Widgets;

use App\Models\Church;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ChurchStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Churches', Church::all()->count())

        ];
    }
}
