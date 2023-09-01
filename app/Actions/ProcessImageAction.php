<?php

namespace App\Actions;

use App\Enums\ImageGenerateStatus;
use App\Models\ImageGenerate;
use Exception;
use Facades\App\Actions\FailedJobAction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProcessImageAction 
{
   /**
    * @param integer $recordID
    * @param string $prompt
    * @param string $imageUrl
    * @return void
    */
    public function handle(int $recordID, string $prompt, string $imageUrl)
    {
        try {
            $imageContents = base64_decode($imageUrl);
            $filename = uniqid('image_') . '.png';
            $disk = Storage::disk('public'); 
            $disk->put($filename, $imageContents);
            $imageUrl = asset('storage/' . $filename);

            ImageGenerate::where('id', $recordID)->update([
                "status" => ImageGenerateStatus::COMPLETED,
                "prompt" => $prompt,
                "file_name" => $filename,
                "src" => $imageUrl,
                "response" => "Image Generation Completed",
            ]);
        } catch (Exception $e) {
            Log::info("Failed to process image log: {$e->getMessage()}");
            FailedJobAction::handle($recordID, "Error Occurred During Image Process");
        }
    }
}
