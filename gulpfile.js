const gulp = require('gulp');
const elixir = require('laravel-elixir');


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
 * Default gulp is to run this elixir stuff
 */
elixir(function(mix) {
    //app.scss includes app css, Boostrap and Ionicons
    mix.copy('resources/assets/bower/font-awesome/fonts/*.*','public/fonts/')
        .copy('resources/assets/bower/Ionicons/fonts/*.*','public/fonts/')
        .copy('resources/assets/bower/AdminLTE/bootstrap/fonts/*.*','public/fonts/')
        //css
        .copy('resources/assets/bower/AdminLTE/bootstrap/css/bootstrap.min.css','public/css')
        .copy('resources/assets/bower/font-awesome/css/font-awesome.min.css','public/css')
        .copy('resources/assets/bower/AdminLTE/dist/css/AdminLTE.min.css','public/css')
        .copy('resources/assets/bower/AdminLTE/dist/css/skins/*.*','public/css/skins')
        .copy('resources/assets/bower/font-awesome/css/font-awesome.min.css','public/css')
        .copy('resources/assets/bower/Ionicons/css/ionicons.min.css','public/css')
        //img
        .copy('resources/assets/bower/AdminLTE/dist/img','public/img')
        //js
        .copy('resources/assets/bower/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js','public/js')
        .copy('resources/assets/bower/AdminLTE/bootstrap/js/bootstrap.min.js','public/js')
        .copy('resources/assets/bower/AdminLTE/dist/js/app.min.js','public/js')
        //plugins
        .copy('resources/assets/bower/AdminLTE/plugins','public/plugins')
        // bootstrap-fileinput
        .copy('resources/assets/bower/bootstrap-fileinput','public/plugins/bootstrap-fileinput')

});
