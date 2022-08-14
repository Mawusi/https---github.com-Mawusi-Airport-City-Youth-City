<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Church;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ChurchResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ChurchResource\RelationManagers;
use App\Filament\Resources\ChurchResource\RelationManagers\GroupsRelationManager;
use App\Filament\Resources\ChurchResource\Widgets\ChurchStatsOverview;

class ChurchResource extends Resource
{
    protected static ?string $model = Church::class;

    protected static ?string $navigationIcon = 'heroicon-o-library';
    protected static ?string $navigationGroup = 'Church Management';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Select::make('zone_id')
                        ->relationship('zone', 'name')->required(),
                    TextInput::make('name')
                    ->label('Church name')
                    ->required()->maxLength(255),
                    TextInput::make('pastor_name')
                    ->label("Pastor's name")
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
                TextColumn::make('pastor_name')->label("Pastor's name")->sortable()->searchable(),
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
            GroupsRelationManager::class
        ];
    }

    public static function getWidgets(): array
    {
        return [
            ChurchStatsOverview::class
        ];
    }
    
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChurches::route('/'),
            // 'create' => Pages\CreateChurch::route('/create'),
            'view' => Pages\ViewChurch::route('/{record}'),
            // 'edit' => Pages\EditChurch::route('/{record}/edit'),
        ];
    }    
}
