@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9">
            <h3>{{ Lang::get('application.company.success.title') }}</h3>
            <p style="margin-top: 30px;">
                {!! Lang::get('application.company.success.body', ['company' => $companyName]) !!}
            </p>
            <p style="margin-bottom: 50px;">
                {!! Lang::get('application.company.success.after_message') !!}
            </p>
            <a href="{{ route('reviews.new', ['code' => $companyCode]) }}" class="btn btn-primary">{{ Lang::get('application.review.create') }}</a>
            <a href="{{ route('home') }}" class="btn btn-secondary">{{ Lang::get('application.general.back_home') }}</a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="sidebar-widget">

            </div>
        </div>
    </div>
@endsection

@section('style')
@endsection

@section('javascript')
@endsection



