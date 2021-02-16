@extends('application.layouts.main')
@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>
                    {{ Lang::get('application.company.success.title') }}
                </h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">
                            {{ Lang::get('application.general.home') }}
                        </a>
                    </li>
                    <li>
                        {{ Lang::get('application.general.companies') }}
                    </li>
                    <li class="active">
                        <a href="{{ route('companies.register') }}">
                            {{ Lang::get('application.company.registration.title') }}
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
                        {!! Lang::get('application.company.success.body', ['company' => $companyName]) !!}
                    </p>
                </div>
                <div class="terms-content"></div>
            </div>
        </div>
    </section>
@endsection
