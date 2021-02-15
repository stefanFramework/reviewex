@extends('application.layouts.main')
@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>{{ Lang::get('application.general.about') }}</h2>

                <ul>
                    <li>
                        <a href="{{ route('home') }}">
                            {{ Lang::get('application.general.home') }}
                        </a>
                    </li>
                    <li class="active">
                        {{ Lang::get('application.general.about') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <section class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>
                        {{ Lang::get('application.general.about_content') }}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
