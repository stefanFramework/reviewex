<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
{{--    <meta name="keywords" content="HTML5 Template" />--}}
{{--    <meta name="description" content="Webster - Responsive Multi-purpose HTML5 Template" />--}}
{{--    <meta name="author" content="potenzaglobalsolutions.com" />--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />--}}
    <title>Reviewex</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
    <link rel="stylesheet" type="text/css" href="css/plugins-css.css" />
    <link rel="stylesheet" type="text/css" href="css/typography.css" />
    <link rel="stylesheet" type="text/css" href="css/shortcodes/shortcodes.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />

</head>

<body>

<div class="wrapper">

    @include('layouts.preloader')
    @include('layouts.header')

    <section class="blog white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <input type="text" class="form-control" placeholder="Search your company ...">
                    <p>
                        asdfasdfasdfsdf
                    </p>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar-widget"></div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layouts.pre_footer')
@include('layouts.footer')

<div id="back-to-top">
    <a class="top arrow" href="#top">
        <i class="fa fa-angle-up"></i>
        <span>TOP</span>
    </a>
</div>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/plugins-jquery.js"></script>
<script>var plugin_path = 'js/';</script>
<script src="js/custom.js"></script>

@yield('javascript')

</body>
</html>
