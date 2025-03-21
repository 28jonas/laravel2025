<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        // onze gegevens ophalen en nu delen MET ALLE VIEWS
        $breakingNews = Post::published()
            ->latest()
            ->take(6)
            ->get();

        $categories = Category::withCount('posts')->having('posts_count', '>', 0)->get();

        // deel deze variabelen MET ALLE VIEWS
        View::share([
            'breakingNews' => $breakingNews,
            'categories' => $categories,
        ]);
    }
}
