<?php

namespace App\Actions;

use Exception;
use Illuminate\Support\Facades\Log;
use OpenAI\Laravel\Facades\OpenAI;

class GeneratePromptAction 
{
    /**
     * @param string $keyword
     * @return mixed
     */
    public function handle(string $keyword): mixed
    {
        try {
            return OpenAI::completions()->create([
                    'model' => 'text-davinci-003',
                    'prompt' => 'Write a 50 word prompt that will be used to generate an AI image. The image is about: '. $keyword
                ]);
        } catch (Exception $e) {
            Log::info("Failed to create promot message log: {$e->getMessage()}");
            return false;
        }
    }
}
