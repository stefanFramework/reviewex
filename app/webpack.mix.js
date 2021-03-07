const mix = require('laravel-mix');

mix.sass('resources/assets/css/style.scss', 'public/assets/css/style.css')
    .sass('resources/assets/css/responsive.scss', 'public/assets/css/responsive.css')
    .copy('resources/assets/css/animate.min.css', 'public/assets/css/animate.min.css', false)
    .copy('resources/assets/css/bootstrap.min.css', 'public/assets/css/bootstrap.min.css', false)
    .copy('resources/assets/css/boxicons.min.css', 'public/assets/css/boxicons.min.css', false)
    .copy('resources/assets/css/flaticon.css', 'public/assets/css/flaticon.css', false)
    .copy('resources/assets/css/meanmenu.min.css', 'public/assets/css/meanmenu.min.css', false)
    .copy('resources/assets/css/owl.carousel.min.css', 'public/assets/css/owl.carousel.min.css', false)
    .copy('resources/assets/css/owl.theme.default.min.css', 'public/assets/css/owl.theme.default.min.css', false)
    .copy('resources/assets/js/', 'public/assets/js/', false)
    .copy('resources/assets/images/', 'public/assets/images/', false)
    .copy('resources/assets/fonts/', 'public/assets/fonts/', false);
