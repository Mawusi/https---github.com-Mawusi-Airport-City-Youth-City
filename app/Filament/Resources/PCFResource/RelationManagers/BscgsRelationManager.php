<?php

namespace App\Filament\Resources\PCFResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BscgsRelationManager extends RelationManager
{
    protected static string $relationship = 'bscgs';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Select::make('zone_id')
                        ->relationship('zone', 'name')->required(),
                        Select::make('church_id')
                        ->relationship('church', 'name')->required(),
                            Select::make('group_id')
                            ->relationship('group', 'name')->required(),
                                Select::make('pcf_id')
                                ->relationship('pcf', 'name')->required(),
                                    Select::make('cell_id')
                                    ->relationship('cell', 'name')->required(),
                                        TextInput::make('name')
                                        ->label('Bscg name')
                                        ->required()->maxLength(255),
                                        TextInput::make('leader_name')
                                        ->label("Leader's name")
                                        ->required()->maxLength(255)    
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('id')->sortable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('leader_name')->label("Leader's name")->sortable()->searchable(),
                TextColumn::make('cell.name')->sortable()->searchable(),
                TextColumn::make('pcf.name')->sortable()->searchable(),
                TextColumn::make('group.name')->sortable()->searchable(),
                TextColumn::make('church.name')->sortable()->searchable(),
               //  TextColumn::make('zone.name')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime()
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
