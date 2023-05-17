<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cms; // Replace with your actual CMS model

class CmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
        $cms = CMS::first(); // Fetch the CMS data from the database
        $view->with('cms', $cms); // Share the CMS data with all views
    });
    }
}
