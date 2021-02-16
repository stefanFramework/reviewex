<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="{{ Lang::get('application.metadata.viewport') }}">
    <meta name="keywords" content="{{ Lang::get('application.metadata.keywords') }}" />
    <meta name="description" content="{{ Lang::get('application.metadata.description') }}" />
    <meta name="author" content="{{ Lang::get('application.metadata.author') }}" />

    <title>{{ Lang::get('application.metadata.title') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <style>
        .ui-corner-all
        {
            -moz-border-radius: 4px 4px 4px 4px;
        }
        .ui-widget-content
        {
            border: 1px solid #c4ab90;
            color: #222222;
            background-color: #ffffff;
        }
        .ui-widget
        {
            font-family: Verdana,Arial,sans-serif;
            font-size: 15px;
        }
        .ui-menu
        {
            display: block;
            float: left;
            list-style: none outside none;
            margin: 0;
            padding: 2px;
        }
        .ui-autocomplete
        {
            cursor: default;
            position: absolute;
        }
        .ui-menu .ui-menu-item
        {
            clear: left;
            float: left;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        .ui-menu .ui-menu-item a
        {
            display: block;
            padding: 3px 3px 3px 3px;
            text-decoration: none;
            cursor: pointer;
            background-color: Green;
        }
        .ui-menu .ui-menu-item a:hover
        {
            display: block;
            padding: 3px 3px 3px 3px;
            text-decoration: none;
            color: White;
            cursor: pointer;
            background-color: ButtonText;
        }
        .ui-widget-content a
        {
            color: #222222;
        }

        .ui-autocomplete-term {
            font-weight: bold;
            color: #000000;
        }
    </style>
    @yield('style')
    {!! htmlScriptTagJsApi(['lang' => 'en']) !!}
</head>

<body>
@include('application.layouts.header')
@yield('content')
@include('application.layouts.footer')
<div class="go-top">
    <i class="bx bx-chevrons-up"></i>
    <i class="bx bx-chevrons-up"></i>
</div>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/meanmenu.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
<script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
<script src="{{ asset('assets/js/ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/js/range-slider.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/application/company_finder.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var self = this;
        var searchUrl = "{{ route('home.search') }}";
        var redirectUrl = "{{ route('companies.information', ['code' => 'CODE']) }}";
        var token = "{{ csrf_token() }}";

        var companyFinder = new  window.reviewex.company.CompanyFinder(searchUrl, redirectUrl, token);
        companyFinder.noResultsMessage = "{{ Lang::get('application.general.no_results_search') }}"
        companyFinder.init();
    });
</script>
@yield('javascript')
</body>
</html>
