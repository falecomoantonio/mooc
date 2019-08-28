<?php

namespace Mooc\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\Mooc\Repositories\CourseRepository::class, \Mooc\Repositories\CourseRepositoryEloquent::class);
        $this->app->bind(\Mooc\Repositories\SkuRepository::class, \Mooc\Repositories\SkuRepositoryEloquent::class);
        $this->app->bind(\Mooc\Repositories\SaleRepository::class, \Mooc\Repositories\SaleRepositoryEloquent::class);
        $this->app->bind(\Mooc\Repositories\SaleItemRepository::class, \Mooc\Repositories\SaleItemRepositoryEloquent::class);
        $this->app->bind(\Mooc\Repositories\CategoryRepository::class, \Mooc\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\Mooc\Repositories\PayRepository::class, \Mooc\Repositories\PayRepositoryEloquent::class);
        $this->app->bind(\Mooc\Repositories\UtilityClassRepository::class, \Mooc\Repositories\UtilityClassRepositoryEloquent::class);
        $this->app->bind(\Mooc\Repositories\RegistrationCourseRepository::class, \Mooc\Repositories\RegistrationCourseRepositoryEloquent::class);
        //:end-bindings:
    }
}
