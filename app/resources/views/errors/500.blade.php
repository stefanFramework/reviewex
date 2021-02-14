@extends('application.layouts.main')
@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>{{ Lang::get('application.errors.internal_error') }}</h2>

                <ul>
                    <li>
                        <a href="{{ route('home') }}">
                            {{ Lang::get('application.general.home') }}
                        </a>
                    </li>
                    <li class="active">
                        {{ Lang::get('application.errors.error_500') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="error-area ptb-100">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="error-content">
                    <h1>{{ Lang::get('application.errors.500') }}</h1>
                    <p>{{ Lang::get('application.errors.internal_error_text') }}</p>

                    <a href="{{ route('home') }}" class="default-btn two">
                        {{ Lang::get('application.general.home') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
