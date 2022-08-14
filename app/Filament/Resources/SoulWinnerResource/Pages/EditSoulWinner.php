<?php

namespace App\Filament\Resources\SoulWinnerResource\Pages;

use App\Filament\Resources\SoulWinnerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSoulWinner extends EditRecord
{
    protected static string $resource = SoulWinnerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
