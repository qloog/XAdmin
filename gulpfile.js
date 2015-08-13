var gulp = require('gulp');
var rename = require('gulp-rename');
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
 *  http://laravelcoding.com/blog/laravel-5-beauty-using-bower
 * @type {{jquery: string, bootstrap: string}}
 */

var paths = {
    'jquery': 'resources/assets/bower/jquery/dist',
    'bootstrap': 'resources/assets/bower/bootstrap',
    'fontawesome': 'resources/assets/bower/fontawesome',
    'datatables': 'resources/assets/bower/datatables',
    'datatables_plugins': 'resources/assets/bower/datatables-plugins',
    'jquery_file_upload': 'resources/assets/bower/jquery-file-upload'
};

/**
 * Copy any needed files.
 *
 * Do a 'gulp copyfiles' after bower updates
 */
gulp.task("copyfiles", function() {

    // Copy jQuery, Bootstrap, and FontAwesome
    gulp.src(paths.jquery + "/jquery.js")
        .pipe(gulp.dest("resources/assets/js/"));

    gulp.src(paths.bootstrap + "/less/**")
        .pipe(gulp.dest("resources/assets/less/bootstrap"));

    gulp.src(paths.bootstrap + "/dist/js/bootstrap.js")
        .pipe(gulp.dest("resources/assets/js/"));

    gulp.src(paths.bootstrap + "/dist/fonts/**")
        .pipe(gulp.dest("public/fonts"));

    gulp.src(paths.fontawesome + "/less/**")
        .pipe(gulp.dest("resources/assets/less/fontawesome"));

    gulp.src(paths.fontawesome + "/fonts/**")
        .pipe(gulp.dest("public/fonts"));

    // Copy datatables
    var dtDir = paths.datatables_plugins + '/integration/';

    gulp.src(paths.datatables + "/media/js/jquery.dataTables.js")
        .pipe(gulp.dest('resources/assets/js/'));

    gulp.src(dtDir + 'bootstrap/3/dataTables.bootstrap.css')
        .pipe(rename('dataTables.bootstrap.less'))
        .pipe(gulp.dest('resources/assets/less/others/'));

    gulp.src(dtDir + 'bootstrap/3/dataTables.bootstrap.js')
        .pipe(gulp.dest('resources/assets/js/'));

    //copy jquery-file-upload
    gulp.src(paths.jquery_file_upload + '/js/**')
        .pipe(gulp.dest('public/js/jquery-file-upload'));

    gulp.src(paths.jquery_file_upload + '/css/**')
        .pipe(gulp.dest('public/css/jquery-file-upload'));

    gulp.src(paths.jquery_file_upload + '/img/**')
        .pipe(gulp.dest('public/img/'));


});

/**
 * Default gulp is to run this elixir stuff
 */
elixir(function(mix) {

    // Combine scripts
    mix.scripts([
            'jquery.js',
            'bootstrap.js',
            'jquery.dataTables.js',
            'dataTables.bootstrap.js'
        ],
        'public/js/app.js'
    );

    // Compile Less, default to public/css/app.css
    mix.less('app.less');

    //copy file: from resources/assets/js to public/js
    //All operations are relative to the project's root directory
    //mix.copy('resources/assets/js/jquery.fileupload.js', 'public/js/jquery.fileupload.js');

});
