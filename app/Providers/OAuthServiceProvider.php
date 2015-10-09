<?php

namespace App\Providers;

use Dingo\Api\Auth\Auth;
use Dingo\Api\Auth\Provider\OAuth2;
use Illuminate\Support\ServiceProvider;

class OAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {

        //HTTP Basic
        $this->app[Auth::class]->extend('basic', function ($app) {
                return new \Dingo\Api\Auth\Provider\Basic($app['auth'], 'email');
            });

//        //JSON Web Tokens (JWT)
//        $this->app[Auth::class]->extend('jwt', function ($app) {
//                return new \Dingo\Api\Auth\Provider\JWT($app['Tymon\JWTAuth\JWTAuth']);
//            });

        //OAuth 2.0
//        $this->app[Auth::class]->extend('oauth', function ($app) {
//                $provider = new OAuth2($app['oauth2-server.authorizer']->getChecker());
//
//                $provider->setUserResolver(function ($id) {
//                        // Logic to return a user by their ID.
//                    });
//
//                $provider->setClientResolver(function ($id) {
//                        // Logic to return a client by their ID.
//                    });
//
//                return $provider;
//            });


    }

    public function register()
    {
        //
    }
}