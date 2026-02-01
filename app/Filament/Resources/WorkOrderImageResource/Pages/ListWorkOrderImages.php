<?php

namespace App\Filament\Resources\WorkOrderImageResource\Pages;

use App\Filament\Resources\WorkOrderImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkOrderImages extends ListRecords
{
    protected static string $resource = WorkOrderImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
