const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// App
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
mix.copyDirectory('resources/images', 'public/images');

// Admin
mix.copyDirectory('resources/admindek/files', 'public/admin');
mix.copyDirectory('resources/admindek/files/assets/icon/feather/fonts', 'public/admin/fonts');
mix.copyDirectory('resources/admindek/files/assets/icon/font-awesome/fonts', 'public/admin/fonts');
mix.copyDirectory('resources/admindek/files/assets/icon/icofont/fonts', 'public/admin/fonts');
mix.copyDirectory('resources/admindek/files/assets/icon/simple-line-icons/fonts', 'public/admin/fonts');
mix.copyDirectory('resources/admindek/files/assets/icon/themify-icons/fonts', 'public/admin/fonts');
mix.copyDirectory('resources/admindek/files/assets/fonts', 'public/admin/fonts');
mix.copyDirectory('resources/admindek/files/vendor/summernote/font', 'public/admin/css/font');


mix.styles([
  'resources/admindek/files/bower_components/bootstrap/css/bootstrap.min.css',
  'resources/admindek/files/assets/pages/waves/css/waves.min.css',

  'resources/admindek/files/assets/icon/feather/css/feather.css',
  'resources/admindek/files/assets/icon/font-awesome/css/font-awesome.min.css',
  'resources/admindek/files/assets/icon/icofont/css/icofont.css',
  'resources/admindek/files/assets/icon/simple-line-icons/css/simple-line-icons.css',
  'resources/admindek/files/assets/icon/themify-icons/themify-icons.css',

  'resources/admindek/files/vendor/summernote/summernote-bs4.css',

  'resources/admindek/files/assets/css/font-awesome-n.min.css',
  'resources/admindek/files/bower_components/chartist/css/chartist.css',
  'resources/admindek/files/assets/css/style.css',
  'resources/admindek/files/assets/css/widget.css',
  'resources/admindek/files/assets/css/update.css',
], 'public/admin/css/all.css')
mix.scripts([
  'resources/admindek/files/assets/js/jquery-3.4.1.min.js',
  'resources/admindek/files/bower_components/popper.js/js/popper.min.js',
  'resources/admindek/files/bower_components/bootstrap/js/bootstrap.min.js',
  'resources/admindek/files/assets/pages/waves/js/waves.min.js',
  'resources/admindek/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js',
  'resources/admindek/files/assets/pages/chart/float/jquery.flot.js',
  'resources/admindek/files/assets/pages/chart/float/jquery.flot.categories.js',
  'resources/admindek/files/assets/pages/chart/float/curvedLines.js',
  'resources/admindek/files/assets/pages/chart/float/jquery.flot.tooltip.min.js',
  'resources/admindek/files/bower_components/chartist/js/chartist.js',
  'resources/admindek/files/assets/pages/widget/amchart/amcharts.js',
  'resources/admindek/files/assets/pages/widget/amchart/serial.js',
  'resources/admindek/files/assets/pages/widget/amchart/light.js',
  'resources/admindek/files/assets/js/pcoded.min.js',
  'resources/admindek/files/assets/js/vertical/vertical-layout.min.js',
  'resources/admindek/files/assets/pages/dashboard/custom-dashboard.min.js',

  'resources/admindek/files/vendor/summernote/summernote-bs4.min.js',
  'resources/admindek/files/assets/js/script.min.js',
], 'public/admin/js/all.js');