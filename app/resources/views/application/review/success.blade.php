@extends('application.layouts.main')
@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>
                    {{ Lang::get('application.review.success.title') }}
                </h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">
                            {{ Lang::get('application.general.home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('companies.information', ['code' => $companyCode]) }}">
                            {{ $companyName }}
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('reviews.new', ['code' => $companyCode]) }}">
                            {{ Lang::get('application.review.create') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <section class="terms-conditions-area ptb-100">
        <div class="container">
            <div class="terms-conditions">
                <div class="terms-content">
                    <p>
                        {!! Lang::get('application.review.success.body', ['company' => $companyName]) !!}
                    </p>
                </div>
                <div class="terms-content">
                    <p>
                        {!! Lang::get('application.review.success.after_message') !!}
                    </p>
                </div>
                <a href="{{ route('companies.information', ['code' => $companyCode]) }}" class="default-btn register">
                    {{ Lang::get('application.review.success.continue') }}
                </a>
            </div>
        </div>
    </section>
@endsection
