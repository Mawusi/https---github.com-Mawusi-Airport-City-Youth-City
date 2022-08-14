<?php

namespace App\Filament\Resources\PCFResource\Widgets;

use App\Models\Pcf;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class PCFStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make("Total PCFs", Pcf::all()->count())

        ];
    }
}
