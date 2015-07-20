<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend'], function ()
{
    require_once(__DIR__ . "/Routes/Frontend/Frontend.php");
    //require_once(__DIR__ . "/Routes/Frontend/Access.php");
});
/**
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend'], function ()
{
    Route::group(['prefix' => 'admin', /*'middleware' => 'auth'*/], function ()
    {
//        /**
//         * These routes need the Administrator Role
//         */
//        Route::group([
//            'middleware' => 'access.routeNeedsRole',
//            'role'       => ['Administrator'],
//            'redirect'   => '/',
//            'with'       => ['flash_danger', 'You do not have access to do that.']
//        ], function ()
//        {
//            Route::get('dashboard', ['as' => 'backend.dashboard', 'uses' => 'DashboardController@index']);
//            //require_once(__DIR__ . "/Routes/Backend/Access.php");
//        });

            Route::get('/dashboard', 'DashboardController@index');
            Route::resource('materials/single', 'MaterialsController');
            Route::resource('materials/multi', 'MaterialsMultiController');
            Route::resource('materials/audio', 'MaterialsAudioController');
    });
});

//Route::get('/', 'Frontend\HomeController@index');
//
////Route::get('home', 'HomeController@index');
//
//Route::controllers([
//	//'auth' => 'Auth\AuthController',
//	//'password' => 'Auth\PasswordController',
//]);
//
//Route::get('auth/login', 'Frontend\Auth\AuthController@getLogin');
//Route::get('auth/register', 'Frontend\Auth\AuthController@getRegister');
//Route::post('auth/login', 'Frontend\Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Frontend\Auth\AuthController@getLogout');
//
//Route::get('pages/{id}', 'PagesController@show');
//Route::post('comment/store', 'CommentsController@store');
//
//Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => 'auth'], function()
//{
//  Route::get('/', 'Backend\AdminHomeController@index');
//  Route::resource('pages', 'PagesController');
//  Route::resource('comments', 'CommentsController');
//});
