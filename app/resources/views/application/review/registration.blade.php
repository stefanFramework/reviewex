@extends('application.layouts.main')
@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>
                    {{ Lang::get('application.review.create') }}
                </h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">
                            {{ Lang::get('application.general.home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('companies.information', ['code' => $company->code]) }}">
                            {{ $company->name }}
                        </a>
                    </li>
                    <li class="active">
                        {{ Lang::get('application.review.create') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <section class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <form class="user-form" method="post" action="{{ route('reviews.new', ['code' => $company->code]) }}">
                        <div class="billing-details">
                            <span>
                                {{ Lang::get('application.review.subtitle') }}
                            </span>
                            @if($errors && $errors->has('review_registration_error'))
                                <p class="form-error">{{ $errors->first('review_registration_error') }}</p>
                            @endif
                            <div class="row" style="margin-top: 20px;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title" class="form-label">
                                            {{ Lang::get('application.review.title_label') }}
                                        </label>
                                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                                        @if ($errors && $errors->has('title'))
                                            <label for="title" class="form-error">{{ $errors->first('title') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="text" class="form-label">
                                            {{ Lang::get('application.review.text_label') }}
                                        </label>
                                        <textarea id="text" name="text" class="form-control" rows="5" style="resize: none;">{{ old('text') }}</textarea>
                                        @if ($errors && $errors->has('text'))
                                            <label for="text" class="form-error">{{ $errors->first('text') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="text" class="form-label">
                                            {{ Lang::get('application.review.score_label') }}
                                        </label>
                                        <div id="score-slider" class="price-range-bar"></div>
                                        <div class="price-range-filter">
                                            <div class="price-range-filter-item">
                                                <input type="hidden" id="score" name="score" value="1" readonly>
                                                <div id="score-stars">
                                                    <i class='bx bxs-star fs-3'></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <div id="1-star">
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star empty-star'></i>
                                            <i class='bx bxs-star empty-star'></i>
                                            <i class='bx bxs-star empty-star'></i>
                                            <i class='bx bxs-star empty-star'></i>
                                            <p class="star-description">
                                                {{ Lang::get('application.review.1_star_description') }}
                                            </p>
                                        </div>
                                        <div id="2-star" style="display: none;">
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star empty-star'></i>
                                            <i class='bx bxs-star empty-star'></i>
                                            <i class='bx bxs-star empty-star'></i>
                                            <p class="star-description">
                                                {{ Lang::get('application.review.2_star_description') }}
                                            </p>
                                        </div>
                                        <div id="3-star" style="display: none;">
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star empty-star'></i>
                                            <i class='bx bxs-star empty-star'></i>
                                            <p class="star-description">
                                                {{ Lang::get('application.review.3_star_description') }}
                                            </p>
                                        </div>
                                        <div id="4-star" style="display: none;">
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star empty-star'></i>
                                            <p class="star-description">
                                                {{ Lang::get('application.review.4_star_description') }}
                                            </p>
                                        </div>
                                        <div id="5-star" style="display: none;">
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <p class="star-description">
                                                {{ Lang::get('application.review.5_star_description') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="text" class="form-label">
                                            {{ Lang::get('application.review.tags_label') }}
                                        </label>
                                        <ul class="tag-list">
                                            @foreach($tags as $tag)
                                                <li>
                                                    <input type="checkbox" value="{{ $tag->id }}" name="tags[]" style="margin-right: 5px;" /> {{ $tag->name  }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="default-btn register" style="margin-top: 10px;" >
                                        {{ Lang::get('application.general.submit') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="widget-sidebar">
                        <div class="sidebar-widget recent-post">
                            <h3 class="widget-title">
                                {{ Lang::get('application.review.sidebar_title') }}
                            </h3>
                            <ul class="registration-instructions">
                                <li>
                                <span>
                                    <i class="bx bx-edit"></i>
                                    {!! Lang::get('application.review.sidebar_step_1') !!}
                                </span>
                                </li>
                                <li>

                                <span>
                                    <i class="bx bx-user-check"></i>
                                    {!! Lang::get('application.review.sidebar_step_2') !!}
                                </span>
                                </li>
                                <li>
                                <span>
                                    <i class="bx bx-check-circle"></i>
                                    {!! Lang::get('application.review.sidebar_step_3') !!}
                                </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>
        .form-error {
            margin-top: 5px;
            color: #b21f2d !important;
        }

        .registration-instructions {

        }

        .registration-instructions li {
            padding-left: 10px !important;

        }

        .registration-instructions i {
            font-size: 30px !important;
            margin-right: 10px;

        }

        .empty-star {
            color: #ccced2 !important;
        }

        .star-description {
            margin-top: 10px;
        }

        .tag-list {
            list-style-type: none;
            margin-left: -25px;
        }

        .tag-list li {
            margin-bottom: 5px;
        }
    </style>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $( "#score-slider").slider({
                range: false,
                min: 1,
                max: 5,
                values: [1],
                slide: function( event, ui ) {
                    let score = ui.values[0];

                    $( "#score" ).val(score);

                    $("#score-stars").html('');

                    for(i = 0; i < score; i++) {
                        $("#score-stars").append("<i class='bx bxs-star fs-3'></i>");
                    }

                    $("#1-star").hide();
                    $("#2-star").hide();
                    $("#3-star").hide();
                    $("#4-star").hide();
                    $("#5-star").hide();
                    $("#" + score + "-star").show();
                }
            })
        });
    </script>
@endsection
