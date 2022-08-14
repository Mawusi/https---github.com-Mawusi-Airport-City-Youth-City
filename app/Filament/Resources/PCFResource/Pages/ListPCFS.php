<?php

namespace App\Filament\Resources\PCFResource\Pages;

use App\Filament\Resources\PCFResource;
use App\Filament\Resources\PCFResource\Widgets\PCFStatsOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPCFS extends ListRecords
{
    protected static string $resource = PCFResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            PCFStatsOverview::class
        ];
    }
}
