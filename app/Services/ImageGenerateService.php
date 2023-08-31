<?php

namespace App\Services;

use App\Actions\GenerateImageAction;
use App\Actions\GeneratePromptAction;
use App\Models\ImageGenerate;
use App\Services\Contracts\ImageGenerateInterface;
use Illuminate\Support\Facades\Log;
use Facades\App\Actions\FailedJobAction;

class ImageGenerateService implements ImageGenerateInterface
{

    public function __construct(
        private GeneratePromptAction $generatePrompt,
        private GenerateImageAction $generateImage
    ){
        
    }
    /**
     * @param int $userID
     */
    public function process(array $data)
    {
        $res = $this->generatePrompt->handle($data['id'], $data['keyword']);

        if(empty($res) || !isset($res['choices'][0]['texts'])){
            FailedJobAction::handle($data['id'], "Error while promot generate");
        }
        $imageRes = $this->generateImage->handle($data['id'], $res['choices'][0]['text']);
        
        if(empty($imageRes) || !isset($imageRes['data'][0]['url']['test'])){
            FailedJobAction::handle($data['id'], "Error while promot generate");
        }
        ImageGenerate::where('id', $data['id'])->update([
            "status" => "completed",
            "promot" => $res['choices'][0]['text'],
            "src" => $imageRes['data'][0]['url'],
            "response" => "Generate Image Sucessfully",
        ]);
    }
}