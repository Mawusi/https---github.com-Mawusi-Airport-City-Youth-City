<?php

namespace App\Filament\Resources\SoulResource\Pages;

use App\Filament\Resources\SoulResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSoul extends EditRecord
{
    protected static string $resource = SoulResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
