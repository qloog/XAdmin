var gulp       = require('gulp'),
    browserify = require('browserify'),
    babelify   = require('babelify'),
    source     = require('vinyl-source-stream'),
    rename     = require('gulp-rename'),
    elixir     = require('laravel-elixir'),
    glob       = require('glob'),
    es         = require('event-stream');

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
    'jquery_file_upload': 'resources/assets/bower/jquery-file-upload',
    'jquery_validate': 'resources/assets/bower/jquery-validate',
    'react': 'resources/assets/bower/react'
};

/**
 * Copy any needed files.
 *
 * 将resources/assets/bower 下的文件拷贝到 resources/assets/ 对应的目录下
 * 方便elixir做文件合并压缩
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

    //copy jquery-validate
    gulp.src(paths.jquery_validate + '/dist/jquery.validate.js')
        .pipe(gulp.dest('resources/assets/js/'));

    gulp.src(paths.jquery_validate + '/dist/additional-methods.js')
        .pipe(gulp.dest('resources/assets/js/'));

    //copy react
    gulp.src(paths.react + '/react.js').pipe(gulp.dest('resources/assets/js'));
    gulp.src(paths.react + '/react-dom.js').pipe(gulp.dest('resources/assets/js'));
});

/**
 * link: http://fettblog.eu/gulp-browserify-multiple-bundles/
 */
gulp.task('js', function(done) {
    glob('./resources/assets/js/backend/src/**.js', function(err, files) {
        if(err) done(err);

        var tasks = files.map(function(entry) {
            var arr = entry.split('/');
            var buildFile = arr[arr.length-1];

            return browserify({ entries: [entry] })
                .transform(babelify, {stage : 0})
                .bundle()
                .pipe(source(buildFile))    //Pass desired output filename to vinyl-source-stream
                .pipe(gulp.dest('./public/js/build'));  // Start piping stream to tasks!
        });
        es.merge(tasks).on('end', done);
    });
});

// Rerun tasks whenever a file changes.
gulp.task('watch', function(){
    var path = ['./resources/backend/src/*.js'];
    gulp.watch(path, ['js']);
});

/**
 * Default gulp is to run this elixir stuff
 */
//elixir(function(mix) {
//
    //mix.browserify('backend/src/commentBox.js', './public/js/build');
//
//    // Combine scripts
//    //mix.scripts([
//    //        'jquery.js',
//    //        'bootstrap.js',
//    //        'jquery.dataTables.js',
//    //        'dataTables.bootstrap.js'
//    //    ],
//    //    'public/js/app.js'
//    //);
//    //
//    //// Compile Less, default to public/css/app.css
//    //mix.less('app.less');
//
//    //copy file: from resources/assets/js to public/js
//    //All operations are relative to the project's root directory
//    //mix.copy('resources/assets/js/jquery.fileupload.js', 'public/js/jquery.fileupload.js');
//    //mix.copy('resources/assets/js/jquery.validate.js', 'public/js/jquery-validate/jquery.validate.js');
//    //mix.copy('resources/assets/js/additional-methods.js', 'public/js/jquery-validate/additional-methods.js');
//    //mix.copy('resources/assets/bower/jquery-validate/src/localization/messages_zh.js', 'public/js/jquery-validate/messages_zh.js');
//    //mix.copy('resources/assets/js/react.js', 'public/js/react/react.js');
//    //mix.copy('resources/assets/js/react-dom.js', 'public/js/react/react-dom.js');
//
//});
