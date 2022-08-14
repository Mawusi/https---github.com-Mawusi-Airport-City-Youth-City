<?php

namespace App\Filament\Resources\GroupResource\Widgets;

use App\Models\Group;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class GroupStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Groups', Group::all()->count())
        ];
    }
}
