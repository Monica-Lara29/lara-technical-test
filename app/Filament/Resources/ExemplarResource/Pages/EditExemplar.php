<?php

namespace App\Filament\Resources\ExemplarResource\Pages;

use App\Filament\Resources\ExemplarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExemplar extends EditRecord
{
    protected static string $resource = ExemplarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
