<?php

namespace App\Filament\Resources;

use App\Models\Pcf;
use Filament\Forms;
use App\Models\Bscg;
use App\Models\Cell;
use App\Models\Zone;
use Filament\Tables;
use App\Models\Group;
use App\Models\Church;
use App\Models\SoulWinner;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SoulWinnerResource\Pages;
use App\Filament\Resources\SoulWinnerResource\RelationManagers;
use App\Filament\Resources\SoulWinnerResource\RelationManagers\SoulsRelationManager;
use App\Filament\Resources\SoulWinnerResource\Widgets\SoulWinnerStatsOverview;

class SoulWinnerResource extends Resource
{
    protected static ?string $model = SoulWinner::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Membership';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('soul_winner_name')->required()->maxLength(255),
                        TextInput::make('contact')->required()->maxLength(255),
                        DatePicker::make('dob')->label('Birth day')->required(),
                        TextInput::make('email')->email()->maxLength(255),

                        // Dependent fields for country->states->cities
                        Select::make('zone_id')
                            ->label('Zone')
                            ->options(Zone::all()->pluck('name', 'id')->toArray())
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('church_id', null))
                            ->afterStateUpdated(fn (callable $set) => $set('group_id', null))
                            ->afterStateUpdated(fn (callable $set) => $set('pcf_id', null))
                            ->afterStateUpdated(fn (callable $set) => $set('cell_id', null))
                            ->afterStateUpdated(fn (callable $set) => $set('bscg_id', null)),


                            Select::make('church_id')
                                ->label("Church's name")
                                ->required()
                                ->options(function(callable $get){
                                    $zone = Zone::find($get('zone_id'));
                                        if(!$zone){
                                            return Church::all()->pluck('name', 'id');
                                        }
                                    return $zone->churches->pluck('name', 'id');
                                })
                                ->reactive(),
                                
                                Select::make('group_id')
                                    ->label("Group's name")
                                    ->required()
                                    ->options(function(callable $get){
                                        $church = Church::find($get('church_id'));
                                            if(!$church){
                                                return Group::all()->pluck('name', 'id');
                                            }
                                        return $church->groups->pluck('name', 'id');
                                    })
                                    ->reactive(),

                                    Select::make('pcf_id')
                                    ->label("PCF's name")
                                    ->required()
                                    ->options(function(callable $get){
                                        $group = Group::find($get('group_id'));
                                            if(!$group){
                                                return Pcf::all()->pluck('name', 'id');
                                            }
                                        return $group->pcfs->pluck('name', 'id');
                                        })
                                        ->reactive(),

                                        Select::make('cell_id')
                                        ->label("Cell's name")
                                        ->required()
                                        ->options(function(callable $get){
                                            $pcf = Pcf::find($get('pcf_id'));
                                                if(!$pcf){
                                                    return Cell::all()->pluck('name', 'id');
                                                }
                                            return $pcf->cells->pluck('name', 'id');
                                        })
                                        ->reactive(),

                                        Select::make('bscg_id')
                                        ->label("Bible Study Class Group")
                                        ->required()
                                        ->options(function(callable $get){
                                            $cell = Cell::find($get('cell_id'));
                                                if(!$cell){
                                                    return Bscg::all()->pluck('name', 'id');
                                                }
                                            return $cell->bscgs->pluck('name', 'id');
                                        })
                                        ->reactive(),

                                        Select::make('designation_id')
                                        ->relationship('designation', 'name')->required(),
                                        
                                        TextInput::make('location')
                                        ->required()
                                        ->label('Cell location')
                                        ->maxLength(255)                
                        
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('id')->sortable(),
                TextColumn::make('soul_winner_name')->sortable()->searchable(),
                TextColumn::make('bscg.name')->sortable()->searchable(),
                TextColumn::make('cell.name')->sortable()->searchable(),
                TextColumn::make('designation.name')->sortable()->searchable(),
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
            SoulsRelationManager::class
        ];
    }

    public static function getWidgets(): array
    {
        return [
            SoulWinnerStatsOverview::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSoulWinners::route('/'),
            // 'create' => Pages\CreateSoulWinner::route('/create'),
            'view' => Pages\ViewSoulWinner::route('/{record}'),
            'edit' => Pages\EditSoulWinner::route('/{record}/edit'),
        ];
    }    
}
