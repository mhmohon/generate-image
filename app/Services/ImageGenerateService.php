<?php

namespace App\Services;

use App\Actions\GenerateImageAction;
use App\Actions\GeneratePromptAction;
use App\Actions\ProcessImageAction;
use App\Services\Contracts\ImageGenerateInterface;
use App\Actions\FailedJobAction;

class ImageGenerateService implements ImageGenerateInterface
{
    public function __construct(
        private FailedJobAction $FailedJob,
        private GeneratePromptAction $generatePrompt,
        private GenerateImageAction $generateImage,
        private ProcessImageAction $processImage
    ){}

    /**
     * @param array $data
     * @return void
     */
    public function process(array $data): void
    {
        $res = $this->generatePrompt->handle($data['keyword']);

        if(!$res || !isset($res['choices'][0]['text'])){
            $this->FailedJob->handle($data['id'], "Error Occurred During Prompt Creation");
            return;
        }
        $imageRes = $this->generateImage->handle($res['choices'][0]['text']);
        
        if(!$imageRes || !isset($imageRes['data'][0]['b64_json'])){
            $this->FailedJob->handle($data['id'], "Error Occurred During Image Creation");
            return;
        }

        $imageUrl = $imageRes['data'][0]['b64_json'];
        $prompt = $res['choices'][0]['text'];

        $this->processImage->handle($data['id'], $prompt, $imageUrl);
    }
}