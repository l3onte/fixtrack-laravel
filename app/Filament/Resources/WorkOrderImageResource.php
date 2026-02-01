<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkOrderImageResource\Pages;
use App\Filament\Resources\WorkOrderImageResource\RelationManagers;
use App\Models\WorkOrderImage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkOrderImageResource extends Resource
{
    protected static ?string $model = WorkOrderImage::class;
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationIcon = 'heroicon-o-camera';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('latitude')
                    ->label('Ubicación')
                    ->formatStateUsing(fn ($record) => "📍 Ver Mapa")
                    ->url(fn ($record) => "https://www.google.com/maps/search/?api=1&query={$record->latitude},{$record->longitude}")
                    ->openUrlInNewTab()
                    ->badge(),
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
            'index' => Pages\ListWorkOrderImages::route('/'),
            'create' => Pages\CreateWorkOrderImage::route('/create'),
            'edit' => Pages\EditWorkOrderImage::route('/{record}/edit'),
        ];
    }
}
