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
    Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/', ['as' => 'welcome', 'uses' => 'WelcomeController@index']);
    Route::get('/overview', ['as' => 'overview', 'uses' => 'PagesController@overview']);
    Route::get('/video', ['as' => 'video', 'uses' => 'PagesController@video']);
    Route::get('/gallery', ['as' => 'gallery', 'uses' => 'PagesController@gallery']);
    Route::get('/route', ['as' => 'route', 'uses' => 'PagesController@route']);

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);

    // Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    // Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

    // Password reset link request routes...
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');

    // Password reset routes...
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');

    /**
     * These frontend controllers require the user to be logged in
     */
    Route::group(['middleware' => 'auth'], function ()
    {

    });
});

/**
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend'], function ()
{

    // about login and logout
    Route::group(['prefix' => 'admin'], function ()
    {
        Route::get('login', 'Auth\AuthController@getLogin');
        Route::post('login', 'Auth\AuthController@postLogin');
        Route::get('logout', 'Auth\AuthController@getLogout');
    });

    // need to auth controller
    Route::group(['prefix' => 'admin', 'middleware' => 'auth.admin'], function ()
    {
        //dashboard
        Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
        Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

        //user
        Route::resource('auth/user', 'UserController');
        Route::get('auth/user/change-password/{id}', 'UserController@changePassword');
        Route::post('auth/user/update-password/{id}', ['as' => 'admin.auth.user.update-password', 'uses' => 'UserController@updatePassword']);
        Route::resource('auth/role', 'RoleController');
        Route::resource('auth/permission', 'PermissionController');

        //news
        Route::resource('news/category', 'NewsCategoryController');
        Route::resource('news', 'NewsController');

        //event
        Route::resource('event', 'EventController');
        //album
        Route::resource('album', 'AlbumController');
        //comment
        Route::resource('comment', 'CommentController');

        //page
        Route::resource('page', 'PagesController');

        //upload
        // After the line that reads
        Route::get('upload', 'UploadController@index');

        // Add the following routes
        Route::post('upload/file', 'UploadController@uploadFile');
        Route::delete('upload/file', 'UploadController@deleteFile');
        Route::post('upload/folder', 'UploadController@createFolder');
        Route::delete('upload/folder', 'UploadController@deleteFolder');
        Route::any('upload/image', 'UploadController@uploadImage');

        //material
        Route::resource('materials/single', 'MaterialsController');
//        Route::resource('materials/multi', 'MaterialsMultiController');
//        Route::resource('materials/audio', 'MaterialsAudioController');
    });
});

// api
/*
Route::group(['prefix' => 'api'], function ()
{

    Route::post('oauth/access_token', function() {
            return Response::json(Authorizer::issueAccessToken());
        });

    $api = app('Dingo\Api\Routing\Router');
    $api->version('v1', function ($api) {

            $api->group(['protected' => true],function($api){
                    //需要保护的路由
                });

            $api->get('users/{id}', 'App\Http\Controllers\Api\V1\UserController@show');
            $api->get('users/test', 'App\Http\Controllers\Api\V1\UserController@index');

            $api->get('users/get_token', 'App\Http\Controllers\Api\V1\AuthenticateController@authenticate');


        });
});
 */




