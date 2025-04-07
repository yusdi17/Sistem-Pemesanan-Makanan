<?php

namespace App\Filament\Resources\OfflineOrderResource\Pages;

use App\Filament\Resources\OfflineOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOfflineOrder extends EditRecord
{
    protected static string $resource = OfflineOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
