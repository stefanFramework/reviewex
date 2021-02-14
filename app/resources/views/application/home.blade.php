@extends('application.layouts.main')
@section('content')
    <section class="services-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1"></div>
                <div class="col-lg-10 col-md-10 col-sm-10">
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
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1"></div>
            </div>
        </div>
    </section>
    <section class="testimonials-area pt-100 pb-70">
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

@section('style')
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
    </style>
@endsection

@section('javascript')
    <script type="text/javascript">
        var self = this;
        var searchUrl = "{{ route('home.search') }}";
        var redirectUrl = "{{ route('companies.information', ['code' => 'CODE']) }}";
        var token = "{{ csrf_token() }}";

        $(document).ready(function () {
            $("#companies").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        type: "post",
                        url: self.searchUrl,
                        dataType: "json",
                        data: {
                            term: request.term,
                            _token: self.token
                        },
                        success: function(data){
                            $(".ui-helper-hidden-accessible").hide();
                            response(data);
                        }
                    });
                },
                minLength: 2,
                select: function( event, ui ) {
                    var finalUrl = self.redirectUrl.replace('CODE', ui.item.code);
                    window.location.replace(finalUrl);
                }
            });
        });
    </script>
@endsection
