<?php

namespace App\Filament\Resources\MembersOfDepartmentResource\Pages;

use App\Filament\Resources\MembersOfDepartmentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMembersOfDepartment extends EditRecord
{
    protected static string $resource = MembersOfDepartmentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
