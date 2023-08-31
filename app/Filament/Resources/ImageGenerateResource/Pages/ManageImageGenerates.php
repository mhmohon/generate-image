<?php

namespace App\Filament\Resources\ImageGenerateResource\Pages;

use App\Filament\Resources\ImageGenerateResource;
use App\Jobs\ImageGenerateJob;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Model;

class ManageImageGenerates extends ManageRecords
{
    protected static string $resource = ImageGenerateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->after(function (Model $record) {
                ImageGenerateJob::dispatch($record);
            }),
        ];
    }
}
