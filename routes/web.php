<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/**
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend'], function ()
{
    // about login and logout
    Route::auth();
    Route::get('logout', 'Auth\LoginController@logout');

    // business route
    Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/', ['as' => 'welcome', 'uses' => 'WelcomeController@index']);
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
        Route::get('login', 'Auth\LoginController@showLoginForm');
        Route::post('login', 'Auth\LoginController@login');
        Route::get('logout', 'Auth\LoginController@logout');
    });

    // need to auth controller
    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth.admin'], function ()
    {
        //dashboard
        Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
        Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

        //user
        Route::resource('auth/user', 'UserController', ['as' => 'auth']);
        Route::get('auth/user/change-password/{id}', 'UserController@changePassword');
        Route::post('auth/user/update-password/{id}', ['as' => 'user.update-password', 'uses' => 'UserController@updatePassword']);
        Route::resource('auth/role', 'RoleController', ['as' => 'auth']);
        Route::resource('auth/permission', 'PermissionController', ['as' => 'auth']);

        //news
        Route::resource('news/category', 'NewsCategoryController', ['as' => 'news']);
        Route::resource('news', 'NewsController');

        //event
        Route::resource('event', 'EventController');

        //album
        Route::resource('album', 'AlbumController');
        Route::get('album/{id}/photos', ['as' => 'album.photos', 'uses' => 'AlbumController@photos']);
        Route::post('album/upload', ['as' => 'album.upload', 'uses' => 'AlbumController@storePhoto']);

        //forum
        //Route::resource('topic/category', 'TopicCategoryController', ['as' => 'topic']);
        Route::resource('topics', 'TopicController');

        //comment
        Route::resource('comment', 'CommentController');

        //page
        Route::resource('page', 'PagesController');

        //upload
        // After the line that reads
        Route::get('upload', 'UploadController@index');

        // Add the following routes
        Route::post('upload/file', ['as' => 'upload.file', 'uses' => 'UploadController@uploadFile']);
        Route::delete('upload/file', 'UploadController@deleteFile');
        Route::post('upload/folder', 'UploadController@createFolder');
        Route::delete('upload/folder', 'UploadController@deleteFolder');
        Route::post('upload/image', ['as' => 'upload.image', 'uses' => 'UploadController@uploadImage']);

        //material
        Route::resource('materials/single', 'MaterialsController');
    });
});
