<?php

namespace App\Providers;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        Model::preventLazyLoading();
        Paginator::useBootstrapFive();
        View::composer('components.auth.user.header.header', function ($view) {
            $view->with([
                "brands" => Brand::all()
            ]);
        });
    }
}
