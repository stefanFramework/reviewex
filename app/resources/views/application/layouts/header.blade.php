<header class="header-area">
    @php
        {{
            $currentRoute = \Illuminate\Support\Facades\Route::current();
        }}
    @endphp
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
                                <a href="{{ route('terms') }}" class="nav-link" target="_blank">
                                    {{ Lang::get('application.general.terms_and_conditions') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('privacy') }}" class="nav-link" target="_blank">
                                    {{ Lang::get('application.general.privacy_policy') }}
                                </a>
                            </li>
                        </ul>
                        <div class="others-options">
                            @if(!is_null($currentRoute) && $currentRoute->getName() != 'home')
                                <ul>
                                    <li>
                                        <button type="button" class="search-btn" data-bs-toggle="modal" data-bs-target="#exampleModalsrc">
                                            <i class="bx bx-search"></i>
                                        </button>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
@if(!is_null($currentRoute) && $currentRoute->getName() != 'home')
<div class="modal fade search-modal-area" id="exampleModalsrc">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button"
                    data-bs-dismiss="modal"
                    class="closer-btn"
                    style="background-color: #000000;">
                <i class="bx bx-x"></i>
            </button>
            <div class="modal-body">
                <div class="sidebar-widget search">
                    <h3>Search</h3>
                    <form class="search-form">
                        <input
                            type="text"
                            class="form-control"
                            id="companies"
                            name="companies"
                            placeholder="{{ Lang::get('application.general.search') }}" >
                        <span style="margin-top: 5px; font-size: 14px;">
                            {!! Lang::get('application.home.search_small_text', ['url' => route('companies.register')]) !!}
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
