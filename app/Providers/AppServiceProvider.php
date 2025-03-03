<?php

namespace App\Providers;
// use Maatwebsite\Excel\ExcelServiceProvider;
// use Illuminate\Support\Facades\App;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // App::bind('excel', function () {
        //     return new ExcelServiceProvider(app());
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
