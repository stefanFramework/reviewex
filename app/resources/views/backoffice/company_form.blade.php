@extends('backoffice.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{ Lang::get('backoffice.company_validation_form.title') }}</h4>
                    <p class="card-category">{{ Lang::get('backoffice.company_validation_form.sub_title') }}</p>
                </div>
                <div class="card-body">
                    <form id="company_validation" method="POST" action="{{ route('backoffice.companies.update', ['id' => $company->id]) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">{{ Lang::get('backoffice.company_validation_form.name_title') }}</label>
                            <input type="text" id="name" name="name" class="form-control" disabled value="{{ $company->name }}">
                        </div>
                        <div class="form-group">
                            <label for="bussinessSector">{{ Lang::get('backoffice.company_validation_form.business_sector_title') }}</label>
                            <input type="text" id="bussinessSector" name="bussinessSector" class="form-control" disabled value="{{ $company->businessSector->name }}">
                        </div>
                        <div class="form-group">
                            <label for="bussinessSector">{{ Lang::get('backoffice.company_validation_form.website_title') }}</label>
                            <a href="{{ $company->website_url }}" class="form-control" target="_blank">{{ $company->website_url }}</a>
                        </div>
                        <div class="form-group">
                            <label for="state">{{ Lang::get('backoffice.company_validation_form.state_title') }}</label>
                            <input type="text" id="state" name="state" class="form-control" disabled value="{{ $company->state->name }}">
                        </div>
                        <div class="form-group">
                            <label for="country">{{ Lang::get('backoffice.company_validation_form.country_title') }}</label>
                            <input type="text" id="country" name="country" class="form-control" disabled value="{{ $company->state->country->name }}">
                        </div>

                        <button type="submit" id="submit" class="btn btn-primary">{{ Lang::get('backoffice.general.validate_and_publish') }}</button>
                        <a href="{{ route('backoffice.companies.dismiss', ['id' => $company->id]) }}" class="btn btn-default">{{ Lang::get('backoffice.general.dismiss') }}</a>
                        <a href="{{ route('backoffice.companies') }}" class="btn btn-secondary" >{{ Lang::get('backoffice.general.back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection




