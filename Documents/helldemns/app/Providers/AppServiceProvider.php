<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; 
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Pagination Bootstrap 5
        Paginator::useBootstrapFive();

        // Untuk mengatasi upload file besar
        ini_set('upload_max_filesize', '20M');
        ini_set('post_max_size', '20M');
        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', '300');
        ini_set('max_input_time', '300');
    }
}
