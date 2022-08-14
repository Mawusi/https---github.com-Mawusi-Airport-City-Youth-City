<?php

namespace App\Filament\Resources\MembersOfDepartmentResource\Pages;

use App\Filament\Resources\MembersOfDepartmentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMembersOfDepartment extends ViewRecord
{
    protected static string $resource = MembersOfDepartmentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
