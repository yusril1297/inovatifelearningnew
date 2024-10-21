<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

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
        // Mengirimkan kategori ke semua view layout yang memuat navbar
    View::composer('layouts.front.navbar', function ($view) {
        $categories = Category::all();
        $view->with('categories', $categories);
    });
    }

    public function showCategories() {
        // Ambil data dari tabel categories
        $categories = Category::all();
        // Kirim data ke view
        return view('frontend.categories', compact('categories'));
    }
}
