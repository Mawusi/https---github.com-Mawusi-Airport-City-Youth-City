<?php

namespace App\Filament\Resources\BSCGResource\Pages;

use App\Filament\Resources\BSCGResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBSCG extends EditRecord
{
    protected static string $resource = BSCGResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
