<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkOrderResource\Pages;
use App\Filament\Resources\WorkOrderResource\RelationManagers;
use App\Models\WorkOrder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkOrderResource extends Resource
{
    protected static ?string $model = WorkOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('equipment_id')
                    ->relationship('equipment', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->rows(5)
                    ->cols(20)
                    ->required()
                    ->maxLength(6000)
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->options([
                        'open' => 'Open',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                        'canceled' => 'Canceled'
                    ])
                    ->required()
                    ->native(false),
                Forms\Components\Select::make('priority')
                    ->options([
                        'low' => 'Low',
                        'medium' => 'Medium',
                        'high' => 'High'
                    ])
                    ->required()
                    ->native(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Technic')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('equipment.name')
                    ->label('Equipment')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('priority')
                    ->badge()
                    ->color(fn (string $state): string => 
                    match ($state) {
                        'low' => 'gray',     
                        'medium' => 'info',  
                        'high' => 'danger',  
                        default => 'gray',
                    }),Tables\Columns\TextColumn::make(''),
                    
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'open' => 'gray',
                        'in_progress' => 'warning',
                        'completed' => 'success',
                        'canceled' => 'danger',
                    }),Tables\Columns\TextColumn::make('')
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
            'index' => Pages\ListWorkOrders::route('/'),
            'create' => Pages\CreateWorkOrder::route('/create'),
            'edit' => Pages\EditWorkOrder::route('/{record}/edit'),
        ];
    }
}
