<?php

namespace App\Filament\Resources\WorkOrderImageResource\Pages;

use App\Filament\Resources\WorkOrderImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkOrderImage extends EditRecord
{
    protected static string $resource = WorkOrderImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
