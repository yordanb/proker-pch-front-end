<?php

namespace App\Filament\Resources\ThermostatResource\Pages;

use App\Filament\Resources\ThermostatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListThermostats extends ListRecords
{
    protected static string $resource = ThermostatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
