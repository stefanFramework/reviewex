<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reviewex</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="{{ Lang::get('application.metadata.keywords') }}" />
    <meta name="description" content="{{ Lang::get('application.metadata.description') }}" />
    <meta name="author" content="{{ Lang::get('application.metadata.author') }}" />
    <meta name="viewport" content="{{ Lang::get('application.metadata.viewport') }}" />

    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins-css.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/typography.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shortcodes/shortcodes.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
    <style>
        .form-error {
            margin-top: 5px;
            color: #b21f2d;
        }
        .input-loading {
            position: absolute;
            top: 15px;
            right: 30px;
            text-align: center;
            pointer-events: none;
            font-size: 20px !important;
        }
        .small-text {
            position: absolute;
            margin-top: 5px;
            margin-bottom: 10px;
            font-size: 12px;
        }
    </style>
    @yield('style')
</head>

<body>

<div class="wrapper">

    @include('layouts.preloader')
    @include('layouts.header')

    <section class="blog white-bg page-section-ptb">
        <div class="container">
            @yield('content')
        </div>
    </section>
    @include('layouts.pre_footer')
    @include('layouts.footer')
</div>

{{--<div id="back-to-top">--}}
{{--    <a class="top arrow" href="#top">--}}
{{--        <i class="fa fa-angle-up"></i>--}}
{{--        <span>{{ Lang::get('application.general.back_to_top') }}</span>--}}
{{--    </a>--}}
{{--</div>--}}

<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
{{--<script src="{{ asset('js/plugins-jquery.js') }}"></script>--}}
{{--<script>var plugin_path = 'js/';</script>--}}
{{--<script src="{{ asset('js/custom.js') }}"></script>--}}

@yield('javascript')

</body>
</html>
