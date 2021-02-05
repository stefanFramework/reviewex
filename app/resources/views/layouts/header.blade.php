<header id="header" class="header default">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 xs-mb-10">
                    <div class="topbar-call text-center text-md-left">
                        {{--                            <ul>--}}
                        {{--                                <li><i class="fa fa-envelope-o theme-color"></i> gethelp@webster.com</li>--}}
                        {{--                                <li><i class="fa fa-phone"></i> <a href="tel:+7042791249"> <span>+(704) 279-1249 </span> </a> </li>--}}
                        {{--                            </ul>--}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="topbar-social text-center text-md-right">
                        {{--                            <ul>--}}
                        {{--                                <li><a href="#"><span class="ti-facebook"></span></a></li>--}}
                        {{--                                <li><a href="#"><span class="ti-instagram"></span></a></li>--}}
                        {{--                                <li><a href="#"><span class="ti-google"></span></a></li>--}}
                        {{--                                <li><a href="#"><span class="ti-twitter"></span></a></li>--}}
                        {{--                                <li><a href="#"><span class="ti-linkedin"></span></a></li>--}}
                        {{--                                <li><a href="#"><span class="ti-dribbble"></span></a></li>--}}
                        {{--                            </ul>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="menu">
        <nav id="menu" class="mega-menu">
            <section class="menu-list-items">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <ul class="menu-logo">
                                <li>
{{--                                    <a href="{{ route('home') }}"><img id="logo_img" src="{{asset('images/logo.png')}}" alt="logo"> </a>--}}
                                </li>
                            </ul>
                            <div class="menu-bar">
                                <div class="search-cart">
                                    @if(\Illuminate\Support\Facades\Route::current()->getName() != 'home')
                                        <div class="search">
                                            <a class="search-btn not_click" href="javascript:void(0);"></a>
                                            <div class="search-box not-click">
                                                <form action="search.html" method="get">
                                                    <input type="text"  class="not-click form-control" name="search" placeholder="{{ Lang::get('application.general.search') }}" value="" >
                                                    <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </nav>
    </div>
</header>

<section class="page-title bg-overlay-black-60 parallax" data-jarallax='{"speed": 0.6}' style="background-image: url({{ asset('images/reviewex.png') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-name">
                    <h1>
                        <a href="{{ route('home') }}">
                        {{ Lang::get('application.general.title') }}
                        </a>
                    </h1>
                    <p>
                        {{ Lang::get('application.general.slogan') }}
                    </p>
                </div>
                {{--                    <ul class="page-breadcrumb">--}}
                {{--                        <li><a href="#"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>--}}
                {{--                        <li><a href="#">Blog</a> <i class="fa fa-angle-double-right"></i></li>--}}
                {{--                        <li><span>Blog classic right sidebar</span> </li>--}}
                {{--                    </ul>--}}
            </div>
        </div>
    </div>
</section>

