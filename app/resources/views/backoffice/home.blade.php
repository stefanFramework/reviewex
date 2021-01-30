@extends('backoffice.layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <a href="{{ route('backoffice.companies') }}">
                <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">business</i>
                    </div>
                    <p class="card-category"></p>
                    <h3 class="card-title">
                        {{ Lang::get('backoffice.home_form.companies_to_validate') }}
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i>
                        {{ Lang::get('backoffice.home_form.amount_pending', ['number' => $companiesPending]) }}
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">task</i>
                    </div>
                    <p class="card-category"></p>
                    <h3 class="card-title">
                        {{ Lang::get('backoffice.home_form.reviews_to_validate') }}
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i>
                        {{ Lang::get('backoffice.home_form.amount_pending', ['number' => $reviewsPending]) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">settings</i>
                    </div>
                    <p class="card-category"></p>
                    <h3 class="card-title">
                        {{ Lang::get('backoffice.home_form.settings') }}
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
