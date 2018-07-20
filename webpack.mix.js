let mix = require('laravel-mix');
let packages = 'node_modules/';
let gentelella = packages+'gentelella/';
let vendors = gentelella+'vendors/';


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

mix.copy(vendors+'font-awesome/fonts/','public/fonts/');
mix.copy(vendors+'bootstrap/fonts/','public/fonts/');



mix.combine([
    vendors+'bootstrap/dist/css/bootstrap.css',
    vendors+'font-awesome/css/font-awesome.css',
    vendors+'pnotify/dist/pnotify.css',
    vendors+'select2/dist/css/select2.css',
    vendors+'nprogress/nprogress.css',
    vendors+'bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min',
    vendors+'iCheck/skins/flat/green.css',
    vendors+'jqvmap/dist/jqvmap.min.css',
    vendors+'bootstrap-daterangepicker/daterangepicker.css',
    vendors+'bootstrap-datetimepicker/build/css/datetimepicker.min.css',
    vendors+'datatables.net-bs/css/dataTables.bootstrap.min.css',
    vendors+'datatables.net-buttons-bs/css/buttons.bootstrap.min.css',
    vendors+'datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css',
    vendors+'datatables.net-responsive-bs/css/responsive.bootstrap.min.css',
    vendors+'datatables.net-scroller-bs/css/scroller.bootstrap.min.css',
    vendors+'cropper/dist/cropper.min.css',
    //Now lets add the custom css
    gentelella+'build/css/custom.css',//this is the default from gentelella
    'resources/assets/css/mycustom.css' //All your custom css can go here

],'public/css/dashboard.css');

mix.combine([
    vendors+'/jquery/dist/jquery.min.js',
    vendors+'bootstrap/dist/js/bootstrap.min.js',
    vendors+'bootstrap-progressbar/bootstrap-progressbar.min.js',
    vendors+'fastclick/lib/fastclick.js',
    vendors+'select2/dist/js/select2.js',
    vendors+'nprogress/nprogress.js',
    vendors+'icheck/icheck.js',
    vendors+'Chartjs/dist/Chart.min.js',
    vendors+'gauge.js/dist/gauge.min.js',
    vendors+'skycons/skycons.js',
    vendors+'Flot/jquery.flot.js',
    vendors+'Flot/jquery.flot.pie.js',
    vendors+'Flot/jquery.flot.time.js',
    vendors+'Flot/jquery.flot.stack.js',
    vendors+'Flot/jquery.flot.resize.js',
    vendors+'flot.orderbars/js/jquery.flot.orderBars.js',
    vendors+'flot-spline/js/jquery.flot.spline.min.js',
    vendors+'DateJS/build/date.js',
    vendors+'jqvmap/dist/jquery.vmap.js',
    vendors+'jqvmap/dist/maps/jquery.vmap.world.js',
    vendors+'jqvmap/examples/js/jquery.vmap.sampledata.js',
    vendors+'moment/min/moment.min.js',
    vendors+'bootstrap-daterangepicker/daterangepicker.js',
    vendors+'bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
    vendors+'jquery.hotkeys/jquery.hotkeys.js',
    vendors+'jquery.tagsinput/src/jquery.tagsinput.js',
    vendors+'devbridge-autocomplete/dist/jquery.autocomplete.min.js',
    vendors+'datatables.net/js/jquery.dataTables.min.js',
    vendors+'datatables.net-bs/js/dataTables.bootstrap.min.js',
    vendors+'datatables.net-buttons/js/dataTables.buttons.min.js',
    vendors+'datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
    vendors+'datatables.net-buttons/js/buttons.flash.min.js',
    vendors+'datatables.net-buttons/js/buttons.print.min.js',
    vendors+'datatables.net-buttons/js/buttons.html5.min.js',
    vendors+'datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
    vendors+'datatables.net-keytable/js/dataTables.keyTable.min.js',
    vendors+'datatables.net-responsive/js/dataTables.responsive.min.js',
    vendors+'datatables.net-responsive-bs/js/responsive.bootstrap.js',
    vendors+'datatables.net-scroller/js/dataTables.scroller.min.js',
    // vendors+'cropper/dist/cropper.min.js',
    //lets add custom scripts
    'resources/assets/js/custom.js',//this default from gentelella
],'public/js/dashboard.js');