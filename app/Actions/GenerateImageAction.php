<?php

namespace App\Actions;

use Exception;
use Illuminate\Support\Facades\Log;
use OpenAI\Laravel\Facades\OpenAI;

class GenerateImageAction 
{
   /**
    * @param string $prompt
    * @return mixed
    */
    public function handle(string $prompt): mixed
    {
        try {
            return OpenAI::images()->create([
                    'prompt' => $prompt,
                    'n' => 1,
                    'size' => '512x512',
                    'response_format' => 'b64_json', // b64_json or url
                ]);
        } catch (Exception $e) {
            Log::info("Failed to generate image message log: {$e->getMessage()}");
            return false;
        }
    }
}
