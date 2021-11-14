<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //本番環境の場合は、httpsを強制
        if (\App::environment(['production'])) {
            \URL::forceScheme('https');
        }

        // ページネーションでBootstrapを使えるようにする
        Paginator::useBootstrap();
    }
}
