var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

/**
 *  see:
 *  https://mattstauffer.co/blog/convert-laravel-5-frontend-scaffold-to-bower
 *  http://laravel-tricks.com/tricks/use-sass-instead-of-less-laravel-5
 * @type {{jquery: string, bootstrap: string}}
 */

var paths = {
    'jquery': '../bower/jquery/dist',
    'bootstrap': '../bower/bootstrap/dist',
    'fontawesome': '../bower/fontawesome'
};

elixir(function (mix) {
    mix .less('app.less')
        .scripts([
            paths.jquery + '/jquery.js',
            paths.bootstrap + '/js/bootstrap.js'
        ], 'public/js/app.js');
});
