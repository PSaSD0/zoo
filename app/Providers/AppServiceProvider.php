<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

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
        // Передаем контакты во все шаблоны
        View::composer('*', function ($view) {
            $contacts = DB::table('contacts')->first(); // first() вместо get()
            $view->with('contacts', $contacts);
        });
    }
}
