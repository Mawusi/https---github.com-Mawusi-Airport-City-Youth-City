<?php

namespace App\Filament\Resources\MembersOfDepartmentResource\Widgets;

use App\Models\MembersOfDepartment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class MembersOfDepartmentStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Members', MembersOfDepartment::all()->count())

        ];
    }
}
