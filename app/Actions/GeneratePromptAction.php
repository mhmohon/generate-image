<?php

namespace App\Actions;

use App\Models\ImageGenerate;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Facades\App\Actions\FailedJobAction;
use OpenAI\Laravel\Facades\OpenAI;


class GeneratePromptAction 
{
    /**
     * @param integer $recordID
     * @param string $msg
     * @return void
     */
    public function handle(int $recordID, string $keyword)
    {
        try {
            return OpenAI::completions()->create([
                    'model' => 'text-davinci-003',
                    'prompt' => 'Write a 50 word prompt that will be used to generate an AI image. The image is about: '. $keyword
                ]);
        } catch (Exception $e) {
            Log::info("Failed to create promot message log: {$e->getMessage()}");
        }
    }
}
