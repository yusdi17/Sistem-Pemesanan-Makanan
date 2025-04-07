<?php

namespace App\Filament\Resources\OfflineOrderResource\Pages;

use App\Filament\Resources\OfflineOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOfflineOrders extends ListRecords
{
    protected static string $resource = OfflineOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
