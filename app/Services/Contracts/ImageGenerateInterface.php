<?php

namespace App\Services\Contracts;

interface ImageGenerateInterface
{
    /**
     * @param int $userID
     */
    public function process(array $data);
}