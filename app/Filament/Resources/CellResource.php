<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Cell;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CellResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CellResource\RelationManagers;
use App\Filament\Resources\CellResource\RelationManagers\BscgsRelationManager;
use App\Filament\Resources\CellResource\Widgets\CellStatsOverview;

class CellResource extends Resource
{
    protected static ?string $model = Cell::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Church Management';
    protected static ?int $navigationSort = 4;

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
                                    TextInput::make('name')
                                    ->label('Cell name')
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
                 TextColumn::make('pcf.name')->sortable()->searchable(),
                 TextColumn::make('group.name')->sortable()->searchable(),
                 TextColumn::make('church.name')->sortable()->searchable(),
                 TextColumn::make('zone.name')->sortable()->searchable(),
                 TextColumn::make('created_at')->dateTime()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            BscgsRelationManager::class
        ];
    }

    public static function getWidgets(): array
    {
        return [
            CellStatsOverview::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCells::route('/'),
            // 'create' => Pages\CreateCell::route('/create'),
            'view' => Pages\ViewCell::route('/{record}'),
            'edit' => Pages\EditCell::route('/{record}/edit'),
        ];
    }    
}
