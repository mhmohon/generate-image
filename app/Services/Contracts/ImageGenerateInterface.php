<?php

namespace App\Services\Contracts;

interface ImageGenerateInterface
{
    /**
     * @param array $data
     * @return void
     */
    public function process(array $data): void;
}