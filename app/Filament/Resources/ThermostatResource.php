<?php

namespace App\Filament\Resources;

use DateTime;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Thermostat;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ThermostatResource\Pages;
use App\Filament\Resources\ThermostatResource\RelationManagers;
use App\Filament\Resources\ThermostatResource\Pages\EditThermostat;
use App\Filament\Resources\ThermostatResource\Pages\ListThermostats;
use App\Filament\Resources\ThermostatResource\Pages\CreateThermostat;

class ThermostatResource extends Resource
{
    protected static ?string $model = Thermostat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('cn')->options(['LD1000'=>'LD1000','LD1005'=>'LD1005','LD1009'=>'LD1009','LD1030'=>'LD1030']),
                TextInput::make('hourmeter')->required(),
                DatePicker::make('installed')->required()->format('Y-m-d'),
                Select::make('pic')->options(['MIPA'=>'MIPA','FEBI'=>'FEBI','SOSHUM'=>'SOSHUM']),

                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('cn')->sortable()->searchable(),
                TextColumn::make('hourmeter')->sortable()->searchable(),
                TextColumn::make('pic')->sortable()->searchable(),
                TextColumn::make('installed')->sortable()->searchable(),
                //TextColumn::make('created_at')->sortable()->searchable(),
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListThermostats::route('/'),
            'create' => Pages\CreateThermostat::route('/create'),
            'edit' => Pages\EditThermostat::route('/{record}/edit'),
        ];
    }
}
