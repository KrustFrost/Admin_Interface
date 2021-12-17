const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.js('resources/js/app.js', 'public/js', [
    require('chart.js'),
])
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ]);
    mix.postCss('resources/css/profile.css', 'public/css', [
        require('tailwindcss'),
    ]);
    mix.postCss('resources/css/library.css', 'public/css', [
        require('tailwindcss'),
    ]);
    mix.js('resources/js/mainpage.js', 'public/js');
    mix.js('resources/js/ums.js', 'public/js');
    mix.js('resources/js/calendar.js', 'public/js');
    mix.js('resources/js/evo-calendar.min.js', 'public/js');
    mix.js('resources/js/jquery.min.js', 'public/js');
    mix.js('resources/js/dashboard.js', 'public/js');
    mix.js('resources/js//main.min.js', 'public/js');
    mix.postCss('resources/css/dashboard.css', 'public/css');
    mix.postCss('resources/css/ums_create.css', 'public/css');
    mix.postCss('resources/css/ums.css', 'public/css');
    mix.postCss('resources/css/main.min.css', 'public/css');
    mix.postCss('resources/css/evo-calendar.min.css', 'public/css');
    mix.postCss('resources/css/calendar.css', 'public/css');
    mix.postCss('resources/css/evo-calendar.midnight-blue.min.css', 'public/css');