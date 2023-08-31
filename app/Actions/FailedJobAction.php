<?php

namespace App\Actions;

use App\Models\ImageGenerate;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class FailedJobAction 
{
    /**
     * @param integer $recordID
     * @param string $msg
     * @return void
     */
    public function handle(int $recordID, string $msg): void
    {
        try {
            ImageGenerate::where('id', $recordID)->update([
                "status" => "failed",
                "response" => $msg,
            ]);
        } catch (QueryException $e) {
            Log::error("Failed to execute failed job action: {$e->getMessage()}");
        }
    }
}
