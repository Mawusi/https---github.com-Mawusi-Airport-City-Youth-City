<?php

namespace App\Filament\Resources\PCFResource\Pages;

use App\Filament\Resources\PCFResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPCF extends EditRecord
{
    protected static string $resource = PCFResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
