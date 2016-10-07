<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Contracts\Repositories\Backend\UserRepository::class, \App\Repositories\Eloquent\Backend\UserRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\Backend\RoleRepository::class, \App\Repositories\Eloquent\Backend\RoleRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\Backend\PermissionRepository::class, \App\Repositories\Eloquent\Backend\PermissionRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\Backend\NewsRepository::class, \App\Repositories\Eloquent\Backend\NewsRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\Backend\NewsCategoryRepository::class, \App\Repositories\Eloquent\Backend\NewsCategoryRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\Backend\AlbumRepository::class, \App\Repositories\Eloquent\Backend\AlbumRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\Backend\EventRepository::class, \App\Repositories\Eloquent\Backend\EventRepositoryEloquent::class);
        //:end-bindings:
    }
}
