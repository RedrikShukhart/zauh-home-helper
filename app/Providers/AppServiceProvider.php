<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Zh_helpers\Categories\Categories;

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
        Schema::defaultStringLength(191);

        Paginator::defaultView('components.pagination');

        //расшариваем данные для меню 'includes.menu-left',
        View::composer('components.menu-categories-left', function ($view) {
            $categories = Categories::getCategoryTree();
            $view->with('categories', $categories);
        });

        View::share('date', date('Y'));
    }
}
