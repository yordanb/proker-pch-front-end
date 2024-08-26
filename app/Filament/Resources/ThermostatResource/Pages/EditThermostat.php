<?php

namespace App\Filament\Resources\ThermostatResource\Pages;

use App\Filament\Resources\ThermostatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThermostat extends EditRecord
{
    protected static string $resource = ThermostatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
