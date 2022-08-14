<?php

namespace App\Filament\Resources\PCFResource\Pages;

use App\Filament\Resources\PCFResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPCF extends ViewRecord
{
    protected static string $resource = PCFResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
