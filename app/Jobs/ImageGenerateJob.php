<?php

namespace App\Jobs;

use Facades\App\Actions\FailedJobAction;
use App\Models\ImageGenerate as ModelsImageGenerate;
use App\Services\Contracts\ImageGenerateInterface;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use OpenAI\Laravel\Facades\OpenAI;

class ImageGenerateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    protected $recordID;
    protected $failedJob;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->recordID = $this->data['id'];
    }

    /**
     * Execute the job.
     */
    public function handle(ImageGenerateInterface $imageGenerate): void
    {
        $imageGenerate->process($this->data->toArray());
    }

    public function failed(Exception $e)
    {
        FailedJobAction::handle($this->recordID, $e->getMessage());
    }
}
