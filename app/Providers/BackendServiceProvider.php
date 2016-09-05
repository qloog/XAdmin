<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class BackendServiceProvider
 * @package App\Providers
 */
class BackendServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Package boot method
     */
    public function boot() {

    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Register service provider bindings
     */
    public function registerBindings() {
        //$this->app->bind('App\Repositories\Backend\User\UserContract', 'App\Repositories\Backend\User\UserRepository');
        $this->app->bind('App\Repositories\Backend\Role\RoleContract', 'App\Repositories\Backend\Role\RoleRepository');
        $this->app->bind('App\Repositories\Backend\Permission\PermissionContract', 'App\Repositories\Backend\Permission\PermissionRepository');
        $this->app->bind('App\Repositories\Backend\News\NewsContract', 'App\Repositories\Backend\News\NewsRepository');
        $this->app->bind('App\Repositories\Backend\Event\EventContract', 'App\Repositories\Backend\Event\EventRepository');

    }

    /**
     * Register the blade extender to use new blade sections
     */
    protected function registerBladeExtender() {

    }
}