<?php

namespace App\Filament\Resources\CellResource\Pages;

use App\Filament\Resources\CellResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCell extends EditRecord
{
    protected static string $resource = CellResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
