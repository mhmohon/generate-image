<?php

namespace App\Jobs;

use Facades\App\Actions\FailedJobAction;
use App\Services\Contracts\ImageGenerateInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImageGenerateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    protected $failedJob;

    /**
     * Create a new job instance.
     */
    public function __construct(Model $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(ImageGenerateInterface $imageGenerate): void
    {
        $imageGenerate->process($this->data->toArray());
    }

    public function failed(\Throwable $e)
    {
        FailedJobAction::handle($this->data['id'], $e->getMessage());
    }
}
