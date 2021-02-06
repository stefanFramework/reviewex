@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9">
            <h3>Thank you for your contribution!</h3>
            <p style="margin-top: 30px;">
                <strong>{{ $companyName }}</strong> was successfully registrated in our system.
                Now, our team is going to review the information you register, and make it public on the site for enyone to use.
                We thank you again for participate in this project, and hope to see you soon in our site.
                Have a nice day!
            </p>
            <p style="margin-bottom: 50px;">
                What? Wanna add a review for the company you just registered? Sure! Just click on the button below
            </p>
            <a href="{{ route('reviews.new', ['code' => $companyCode]) }}" class="btn btn-primary">Create review</a>
            <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
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



