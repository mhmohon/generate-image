<?php

namespace App\Actions;

use App\Models\ImageGenerate;
use Filament\Notifications\Notification;

class DownloadFileAction 
{
    /**
     * @param ImageGenerate $record
     * @return mixed
     */
    public function handle(ImageGenerate $record): mixed
    {
        $imageName = $record->file_name;
        $imagePath = storage_path('app/public/' . $imageName);
        $filename = basename($record->image);
        
        if (empty($imageName)) {
            return Notification::make()
                    ->title('Something went wrong.')
                    ->body('Image generation failed or is in process')
                    ->icon('heroicon-o-document-text')
                    ->iconColor('danger')
                    ->danger()
                    ->send();
        }
        return response()->download($imagePath, $filename);
    }
}
