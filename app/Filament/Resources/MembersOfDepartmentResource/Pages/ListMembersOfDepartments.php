<?php

namespace App\Filament\Resources\MembersOfDepartmentResource\Pages;

use App\Filament\Resources\MembersOfDepartmentResource;
use App\Filament\Resources\MembersOfDepartmentResource\Widgets\MembersOfDepartmentStatsOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMembersOfDepartments extends ListRecords
{
    protected static string $resource = MembersOfDepartmentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            MembersOfDepartmentStatsOverview::class
        ];
    }
}
