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
        </div>
    </div>
</div>
<section class="shop-details-area ptb-100">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="shop-details-desc">
                    <ul class="company-list">
                        <li>
                            <i class="bx bx-briefcase"></i>
                            <span>{{ $company->businessSector }}</span>
                        </li>
                        <li >
                            <i class="bx bx-location-plus"></i>
                            <span>{{ $company->state }}, {{ $company->city }}</span>
                        </li>
                        <li >
                            <i class="bx bx-world"></i>
                            <span>{{ $company->website }}</span>
                        </li>
                    </ul>
                    <a href="#" class="default-btn" style="margin-top: 20px;">
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
                                                        <span>
                                                            <strong>{{ $review->date }}</strong>
                                                        </span>
                                                        <p>{{ $review->text }}</p>
                                                        <div class="review-report-link" style="font-size: 32px; text-decoration: none;">
                                                            <a href="#" title="Vot Si!">
                                                                <i class="bx bx-plus-circle"></i>
                                                            </a>
                                                            <a href="#" title="">
                                                                <i class="bx bx-minus-circle"></i>
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
    </style>
@endsection

@section('javascript')
    <script type="text/javascript">
    </script>
@endsection