<?php

namespace App\Providers;

use App\Services\Contracts\ImageGenerateInterface;
use App\Services\ImageGenerateService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ImageGenerateInterface::class, ImageGenerateService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
