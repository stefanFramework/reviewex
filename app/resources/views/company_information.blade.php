@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9">
            <div style="margin-bottom: 20px;">
                <h3>{{ $company->name  }}</h3>
                <span>{{ $company->businessSector->name }}, {{ $company->state->name }}, {{ $company->city }}</span>
            </div>

            @foreach($company->reviews as $review)
                <div class="blog-entry mb-50">
                    <div class="entry-image clearfix"></div>
                    <div class="blog-detail">
                        <div class="entry-title mb-10">
                            <a href="#">{{ $review->title }}</a>
                        </div>
                        <div class="entry-meta mb-10">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-calendar-o"></i>
                                        {{ $review->created_at->format('d.m.Y') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="entry-content">
                            <p>
                                {{ $review->text }}
                            </p>
                        </div>
                        <div class="entry-share clearfix">
{{--                            <div class="entry-button">--}}
{{--                                <a class="button arrow" href="#">Read More<i class="fa fa-angle-right" aria-hidden="true"></i></a>--}}
{{--                            </div>--}}
{{--                            <div class="social list-style-none float-right">--}}
{{--                                <strong>Share : </strong>--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="#"> <i class="fa fa-facebook"></i> </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#"> <i class="fa fa-twitter"></i> </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#"> <i class="fa fa-pinterest-p"></i> </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#"> <i class="fa fa-dribbble"></i> </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="sidebar-widget">
                <h6 class="mt-40 mb-20">What people are saying:</h6>
                <div class="widget-tags">
                    <ul>
                        @foreach($company->getSummarizedReviews() as $reviews)
                            <li><a href="#">{{ $reviews->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
        </div>
    </div>
@endsection










{{--@extends('layouts.main')--}}
{{--@section('content')--}}
{{--    <div class="container-xxl my-md-3 bd-layout">--}}
{{--        <div class="row justify-content-md-center">--}}
{{--            <div class="col-md-12" style="margin-top: 50px; margin-bottom: 50px;">--}}
{{--                <h3>{{ $company->name  }}</h3>--}}
{{--                <span>{{ $company->businessSector->name }}, {{ $company->state->name }}, {{ $company->city }}</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row justify-content-md-center">--}}
{{--            <div class="col-md-6">--}}
{{--                @foreach($company->reviews as $review)--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12" style="margin-bottom: 25px;">--}}
{{--                            <h5>{{ $review->title }}</h5>--}}
{{--                            <p>{{ $review->text }}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <ul>--}}
{{--                    @foreach($company->getSummarizedReviews() as $reviews)--}}
{{--                        <li>{{ $reviews->name }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

{{--@section('style')--}}
{{--@endsection--}}

{{--@section('javascript')--}}
{{--@endsection--}}



