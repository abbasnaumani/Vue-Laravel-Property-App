<?php

namespace App\Providers;

use App\Helpers\ApiResponseHelper;
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
//        $this->app->bind(ApiResponseHelper::class, function() {
//            return new ApiResponseHelper('Hello, app!');
//        });
        $this->app->singleton(ApiResponseHelper::class, function() {
            return new ApiResponseHelper();
        });
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
