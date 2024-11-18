<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

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
       // View Composer untuk navbar
    View::composer('layouts.front.navbar', function ($view) {
        $categories = Category::all();
        $view->with('categories', $categories);
    });

    // View Composer untuk footer
    View::composer('layouts.front.footer', function ($view) {
        $categories = Cache::rememberForever('categories', function () {
            return Category::all();
        });
        $view->with('categories', $categories);
    });
    }

   

}
