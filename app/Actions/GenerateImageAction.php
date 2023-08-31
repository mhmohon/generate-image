<?php

namespace App\Actions;

use App\Models\ImageGenerate;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Facades\App\Actions\FailedJobAction;
use OpenAI\Laravel\Facades\OpenAI;


class GenerateImageAction 
{
    /**
     * @param integer $recordID
     * @param string $msg
     * @return void
     */
    public function handle(int $recordID, string $prompt)
    {
        try {
            return OpenAI::images()->create([
                    'prompt' => $prompt,
                    'n' => 1,
                    'size' => '512x512',
                    'response_format' => 'url',
                ]);
        } catch (Exception $e) {
            Log::info("Failed to create promot message log: {$e->getMessage()}");
        }
    }
}
