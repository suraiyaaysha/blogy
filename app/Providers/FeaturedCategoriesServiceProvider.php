<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Category;

class FeaturedCategoriesServiceProvider extends ServiceProvider
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
        // Retrieve featured categories here and share them with views
        $featuredCategories = Category::where('is_featured', true)->take(4)->get();

        view()->composer('frontend.layouts.app', function ($view) use ($featuredCategories) {
            $view->with(['categories' => $featuredCategories, 'featuredCategories' => $featuredCategories]);
        });
    }
}
