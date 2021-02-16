@extends('application.layouts.main')
@section('content')
    <section class="services-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1"></div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <form class="search-form">
                        <input type="text"
                               id="companies"
                               name="companies"
                               class="form-control"
                               placeholder="{{ Lang::get('application.general.search') }}">
                        <span style="margin-top: 5px; font-size: 14px;">
                            {!! Lang::get('application.home.search_small_text', ['url' => route('companies.register')]) !!}
                        </span>
                        <p style="margin-top: 50px; margin-bottom: 50px;">
                            {{ Lang::get('application.home.main_content') }}
                        </p>
                    </form>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1"></div>
            </div>
        </div>
    </section>
    <section class="services-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="single-services">
                        <i class="{{ Lang::get('application.home.services_1.icon') }}"></i>
                        <h3>{{ Lang::get('application.home.services_1.title') }}</h3>
                        <p>{{ Lang::get('application.home.services_1.description') }}</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12">
                    <div class="single-services">
                        <i class="{{ Lang::get('application.home.services_2.icon') }}"></i>
                        <h3>{{ Lang::get('application.home.services_2.title') }}</h3>
                        <p>{{ Lang::get('application.home.services_2.description') }}</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12">
                    <div class="single-services">
                        <i class="{{ Lang::get('application.home.services_3.icon') }}"></i>
                        <h3>{{ Lang::get('application.home.services_3.title') }}</h3>
                        <p>{{ Lang::get('application.home.services_3.description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonials-area pt-100 pb-70" style="background-image:none;">
        <div class="container">
            <div class="testimonials-slider owl-carousel owl-theme">
                @foreach($reviews as $review)
                    <div class="single-testimonials-box">
                        <ul>
                            @for($i = 0; $i < $review->score; $i++)
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                            @endfor
                        </ul>
                        <p>
                            {{ $review->text }}
                        </p>
                        <h6>
                            {{ $review->company }}
                        </h6>
                        <span>
                            {{ $review->city }}, {{ $review->state }}
                        </span>
                        <div class="testimonials-img"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
