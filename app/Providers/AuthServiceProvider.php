<?php

namespace Mooc\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Mooc\Entities\Category;
use Mooc\Entities\CategoryBlog;
use Mooc\Entities\CategoryCourse;
use Mooc\Entities\Sku;
use Mooc\Policies\CategoryPolicy;
use Mooc\Policies\SkuPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Sku::class => SkuPolicy::class,
        CategoryCourse::class => CategoryPolicy::class,
        CategoryBlog::class => CategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
