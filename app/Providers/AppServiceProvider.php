<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\GeneralInfo;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrapFour();

        $generalInfo = GeneralInfo::first();
        view()->share(['generalInfo' => $generalInfo]);

        $categories = Category::where('parent_id', null)->get();

        view()->share(['categories' => $categories]);
    }
}
