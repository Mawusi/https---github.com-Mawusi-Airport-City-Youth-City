<?php

namespace App\Filament\Resources\BSCGResource\Pages;

use App\Filament\Resources\BSCGResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBSCG extends ViewRecord
{
    protected static string $resource = BSCGResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
