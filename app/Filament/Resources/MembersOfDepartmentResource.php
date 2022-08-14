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
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Models\MembersOfDepartment;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MembersOfDepartmentResource\Pages;
use App\Filament\Resources\MembersOfDepartmentResource\RelationManagers;
use App\Filament\Resources\MembersOfDepartmentResource\Widgets\MembersOfDepartmentStatsOverview;

class MembersOfDepartmentResource extends Resource
{
    protected static ?string $model = MembersOfDepartment::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Department';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('member_name')->required()->maxLength(255),
                        TextInput::make('contact')->required()->maxLength(255),
                        DatePicker::make('dob')->label('Birth day')->required(),
                        TextInput::make('email')->email()->maxLength(255),
                        TextInput::make('residence')->required()->maxLength(255),

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

                                        Select::make('department_id')
                                        ->relationship('department', 'name')->required(),
                                        
                                                       
                        
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('id')->sortable(),
                TextColumn::make('member_name')->sortable()->searchable(),
                TextColumn::make('department.name')->sortable()->searchable(),
                TextColumn::make('bscg.name')->sortable()->searchable(),
                TextColumn::make('cell.name')->sortable()->searchable(),
                TextColumn::make('department.name')->sortable()->searchable(),
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
            //
        ];
    }

    public static function getWidgets(): array
    {
        return [
            MembersOfDepartmentStatsOverview::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembersOfDepartments::route('/'),
            // 'create' => Pages\CreateMembersOfDepartment::route('/create'),
            'view' => Pages\ViewMembersOfDepartment::route('/{record}'),
            'edit' => Pages\EditMembersOfDepartment::route('/{record}/edit'),
        ];
    }    
}
