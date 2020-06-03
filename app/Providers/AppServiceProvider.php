<?php

namespace App\Providers;

use App\Home\Interfaces\FrontendRepositoryInterface;
use App\Home\Repositories\FrontendRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FrontendRepositoryInterface::class, function(){
            return new FrontendRepository;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
