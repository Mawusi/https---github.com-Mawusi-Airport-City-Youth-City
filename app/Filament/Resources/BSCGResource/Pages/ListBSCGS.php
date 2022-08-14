<?php

namespace App\Filament\Resources\BSCGResource\Pages;

use App\Filament\Resources\BSCGResource;
use App\Filament\Resources\BSCGResource\Widgets\BSCGStatsOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBSCGS extends ListRecords
{
    protected static string $resource = BSCGResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            BSCGStatsOverview::class
        ];
    }
}
