@extends('layouts.main')
@section('content')
    <div class="container-xxl my-md-3 bd-layout">
        <div class="row justify-content-md-center">
            <div class="col-md-12" style="margin-top: 50px; margin-bottom: 50px;">
                <h3>{{ $company->name  }}</h3>
                <span>{{ $company->businessSector->name }}, {{ $company->state->name }}, {{ $company->city }}</span>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                @foreach($company->reviews as $review)
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom: 25px;">
                            <h5>{{ $review->title }}</h5>
                            <p>{{ $review->text }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6">
                <ul>
                    @foreach($company->getSummarizedReviews() as $reviews)
                        <li>{{ $reviews->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('style')
@endsection

@section('javascript')
@endsection



