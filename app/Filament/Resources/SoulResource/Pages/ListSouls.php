<?php

namespace App\Filament\Resources\SoulResource\Pages;

use Filament\Pages\Actions;
use App\Filament\Resources\SoulResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SoulResource\Widgets\SoulStatsOverview;

class ListSouls extends ListRecords
{
    protected static string $resource = SoulResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            SoulStatsOverview::class
        ];
    }
}
