<?php

namespace Mooc\Providers;

use Illuminate\Support\ServiceProvider;
use Mooc\Entities\Sku;
use Mooc\Observers\SkuObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Hesto\MultiAuth\MultiAuthServiceProvider');
        }
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Sku::observe(SkuObserver::class);
        //
    }
}
