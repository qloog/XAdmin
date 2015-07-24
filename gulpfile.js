var gulp = require('gulp');
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
    'bootstrap': '../bower/bootstrap',
    'fontawesome': '../bower/fontawesome'
};

/**
 * Copy any needed files.
 *
 * Do a 'gulp copyfiles' after bower updates
 */
gulp.task("copyfiles", function() {

    gulp.src(paths.jquery + "/jquery.js")
        .pipe(gulp.dest("resources/assets/js/"));

    gulp.src(paths.bootstrap + "/less/**")
        .pipe(gulp.dest("resources/assets/less/bootstrap"));

    gulp.src(paths.bootstrap + "/dist/js/bootstrap.js")
        .pipe(gulp.dest("resources/assets/js/"));

    gulp.src(paths.bootstrap + "/dist/fonts/**")
        .pipe(gulp.dest("public/fonts"));

});

/**
 * Default gulp is to run this elixir stuff
 */
elixir(function(mix) {

    // Combine scripts
    mix.scripts([
            'js/jquery.js',
            'js/bootstrap.js'
        ],
        'public/js/admin.js',
        'resources/assets'
    );

    // Compile Less
    mix.less('.less', 'public/css/admin.css');
});

//elixir(function (mix) {
//    mix .less('app.less')
//        .scripts([
//            paths.jquery + '/jquery.js',
//            paths.bootstrap + '/js/bootstrap.js'
//        ], 'public/js/app.js');
//});
