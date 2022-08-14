<?php

namespace App\Filament\Resources\ChurchResource\Pages;

use App\Filament\Resources\ChurchResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewChurch extends ViewRecord
{
    protected static string $resource = ChurchResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
