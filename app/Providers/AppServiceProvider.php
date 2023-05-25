<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


        // if ($this->app->environment('local')) {
        //     $this->app->register(StorageServiceProvider::class);
        //     $this->app->bind('path.public', function () {
        //         return base_path('public_html/serbagunabesar/storage'); // Ganti dengan path direktori public Anda
        //     });
        // }


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}