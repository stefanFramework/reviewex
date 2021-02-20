@extends('application.layouts.main')
@section('content')
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>{{ $company->name  }}</h2>
            @if($company->score > 0)
                @for($i = 0; $i < $company->score; $i++)
                    <i class='bx bxs-star' style="font-size: 20px;"></i>
                @endfor
                <p>
                    {{ Lang::get('application.company.information.reviews_summary_amount', ['number' => count($reviews)]) }}
                </p>
            @endif
            <ul style="margin-top: 20px;">
                <li>
                    <a href="{{ route('home') }}">
                        {{ Lang::get('application.general.home') }}
                    </a>
                </li>
                <li>
                    {{ Lang::get('application.general.companies') }}
                </li>
                <li class="active">
                    {{ $company->name }}
                </li>
            </ul>
        </div>
    </div>
</div>
<section class="shop-details-area ptb-100">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="shop-details-desc" style="margin-bottom: 10px;">
                    <ul class="company-list">
                        <li>
                            <i class="bx bx-briefcase"></i>
                            <span>{{ $company->businessSector }}</span>
                        </li>
                        <li>
                            <i class="bx bx-location-plus"></i>
                            <span>{{ $company->state }}, {{ $company->city }}</span>
                        </li>
                        <li>
                            <i class="bx bx-world"></i>
                            <a href="{{ $company->website }}" target="_blank">
                                {{ $company->website }}
                            </a>
                        </li>
                    </ul>
                    <a href="{{ route('reviews.new', ['code' => $company->code]) }}" class="default-btn" style="margin-top: 20px;">
                        {{ Lang::get('application.review.create') }}
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="sidebar-widget tags">
                    <h3>{{ Lang::get('application.company.information.tags_title') }}</h3>
                    @if(empty($company->tags))
                        <ul>
                            <li>
                                <p>{{ Lang::get('application.company.information.tags_no_content') }}</p>
                            </li>
                        </ul>
                    @else
                        <ul>
                            @foreach($company->tags as $tag)
                                <li><a href="#">{{ $tag }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="tab shop-details-tab">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="tab_content">
                                <div class="tabs_item">
                                    <div class="shop-details-tab-content">
                                        <div class="shop-review-form">
                                            <h3>{{ Lang::get('application.company.information.reviews_title') }}</h3>
                                            <div class="review-comments">
                                                @foreach($reviews as $review)
                                                    <div class="review-item">
                                                        <div class="rating">
                                                            @for($i = 0; $i < $review->score; $i++)
                                                                <i class="bx bxs-star"></i>
                                                            @endfor
                                                        </div>

                                                        <h3>{{ $review->title }}</h3>
                                                        <span style="font-size: 18px;">
                                                            <i class="bx bx-calendar"></i>
                                                            <strong>{{ $review->date }}</strong>
                                                        </span>
                                                        <p>{{ $review->text }}</p>
                                                        <div id="social-{{ $review->id }}" class="review-report-link" style="font-size: 32px; text-decoration: none;">
                                                            <a href="#"
                                                               class="review-like"
                                                               data-id="{{ $review->id }}"
                                                               title="{{ Lang::get('application.company.information.review_agree') }}">
                                                                <i class="bx bx-like"></i>
                                                            </a>
                                                            <a href="#"
                                                               class="review-unlike"
                                                               style="display: none;"
                                                               data-id="{{ $review->id }}"
                                                               title="{{ Lang::get('application.company.information.review_agree') }}">
                                                                <i class="bx bxs-like"></i>
                                                            </a>
                                                            <a href="#"
                                                               class="review-dislike"
                                                               data-id="{{ $review->id }}"
                                                               title="{{ Lang::get('application.company.information.review_disagree') }}">
                                                                <i class="bx bx-dislike"></i>
                                                            </a>
                                                            <a href="#"
                                                               class="review-undislike"
                                                               style="display: none;"
                                                               data-id="{{ $review->id }}"
                                                               title="{{ Lang::get('application.company.information.review_disagree') }}">
                                                                <i class="bx bxs-dislike"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="confirmation-alert"
             class="alert alert-secondary alert-dismissible fade show"
             style="width: 250px; background-color: #000000; color:#ffffff; display: none;">
            Reaction registered!
        </div>
    </div>
</section>
@endsection

@section('style')
    <style>
        .company-list {
            list-style-type: none;
            margin-left: -30px;
        }

        .company-list li {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .company-list span {
            margin-left: 5px;
        }

        .company-list a {
            margin-left: 5px;
        }
    </style>
@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('assets/js/application/request_maker.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/application/review_reaction.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {

        var requestMaker = new window.reviewex.utils.RequestMaker();
        var reactionManager = new  window.reviewex.review.ReviewReactionManager();

        reactionManager.requestMaker = requestMaker;
        reactionManager.likeUrl = "{{ route('reviews.like', ['id' => 'ID']) }}";
        reactionManager.dislikeUrl = "{{ route('reviews.dislike', ['id' => 'ID']) }}";
        reactionManager.unlikeUrl = "{{ route('reviews.unlike', ['id' => 'ID']) }}";
        reactionManager.undislikeUrl = "{{ route('reviews.undislike', ['id' => 'ID']) }}";
        reactionManager.securityToken = "{{ csrf_token() }}";
        reactionManager.init();
    });
</script>
@endsection
