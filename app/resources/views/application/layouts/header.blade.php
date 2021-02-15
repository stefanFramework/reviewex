<header class="header-area">
{{--    <div class="top-header">--}}
{{--        <div class="container">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="header-left-content">--}}
{{--                        <ul class="contact-info">--}}
{{--                            <li>--}}
{{--                                <i class="bx bx-envelope"></i>--}}
{{--                                <a href="mailto:info@lixa.com">--}}
{{--                                    info@lixa.com--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="offer-content">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">--}}
{{--                    <div class="header-right-content">--}}
{{--                        <ul class="social-link">--}}
{{--                            <li>--}}
{{--                                <a href="https://www.facebook.com/" target="_blank">--}}
{{--                                    <i class="bx bxl-facebook"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="https://www.instagram.com/" target="_blank">--}}
{{--                                    <i class="bx bxl-instagram"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="navbar-area">
        <div class="mobile-responsive-nav">
            <div class="container">
                <div class="mobile-responsive-menu">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="desktop-nav" style="margin-top: 20px;">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                    </a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link">
                                    {{ Lang::get('application.general.home') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('about') }}" class="nav-link">
                                    {{ Lang::get('application.general.about') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('terms') }}" class="nav-link">
                                    {{ Lang::get('application.general.terms_and_conditions') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('privacy') }}" class="nav-link">
                                    {{ Lang::get('application.general.privacy_policy') }}
                                </a>
                            </li>
                        </ul>
                        <div class="others-options">
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
