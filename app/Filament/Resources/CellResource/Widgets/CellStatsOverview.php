<?php

namespace App\Filament\Resources\CellResource\Widgets;

use App\Models\Cell;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CellStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Cells', Cell::all()->count())
        ];
    }
    
}
