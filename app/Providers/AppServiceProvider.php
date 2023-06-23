<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        // Paginator::useBootstrapFive();
        
        Paginator::defaultView('components.pagination');

        //расшариваем данные для меню 'includes.menu-left',
        View::composer('components.menu-categories-left', function ($view) {
            $cats = getMenuCategories();
            $categories = formTreeCategories($cats);

            $view->with('categories', $categories); 
        });


        Schema::defaultStringLength(191);

        View::share('date', date('Y'));
    }
}
