@extends('application.layouts.main')
@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>
                    {{ Lang::get('application.company.registration.title') }}
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
                        {{ Lang::get('application.company.registration.title') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <section class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <form class="user-form" method="post" action="{{ route('companies.register') }}">
                        <div class="billing-details">
                            <span>
                                {{ Lang::get('application.company.registration.subtitle') }}
                            </span>
                            @if($errors && $errors->has('registration_error'))
                                <p class="form-error">{{ $errors->first('registration_error') }}</p>
                            @endif
                            <div class="row" style="margin-top: 20px;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">{{ Lang::get('application.company.registration.name') }}</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                                        @if ($errors && $errors->has('name'))
                                            <label for="name" class="form-error">{{ $errors->first('name') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="business_sector" class="form-label">{{ Lang::get('application.company.registration.business_sector') }}</label>
                                        <select id="business_sector" name="business_sector" class="form-control">
                                            <option value="">{{ Lang::get('application.company.registration.default_selection') }}</option>
                                            @foreach($businessSectors as $businessSector)
                                                @if(old('business_sector') == $businessSector->id)
                                                    <option value="{{ $businessSector->id }}" selected>{{ $businessSector->name }}</option>
                                                @else
                                                    <option value="{{ $businessSector->id }}">{{ $businessSector->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors && $errors->has('business_sector'))
                                            <label for="business_sector" class="form-error">{{ $errors->first('business_sector') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="countries" class="form-label">{{ Lang::get('application.company.registration.country') }}</label>
                                        <select id="countries" name="countries" class="form-control">
                                            <option value="">{{ Lang::get('application.company.registration.default_selection') }}</option>
                                            @foreach($countries as $country)
                                                @if(old('countries') == $country->id)
                                                    <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                                @else
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors && $errors->has('countries'))
                                            <label for="countries" class="form-error">{{ $errors->first('countries') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="states" class="form-label">{{ Lang::get('application.company.registration.state') }}</label>
                                        <select id="states" name="states" class="form-control">
                                            <option value="">{{ Lang::get('application.company.registration.default_selection') }}</option>
                                        </select>
                                        @if ($errors && $errors->has('states'))
                                            <label for="states" class="form-error">{{ $errors->first('states') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="city" class="form-label">{{ Lang::get('application.company.registration.city') }}</label>
                                        <input type="text" id="city" name="city" class="form-control" value="{{ old('city') }}" />
                                        @if ($errors && $errors->has('city'))
                                            <label for="city" class="form-error">{{ $errors->first('city') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="website" class="form-label">{{ Lang::get('application.company.registration.website') }}</label>
                                        <input type="text" id="website" name="website" class="form-control" value="{{ old('website') }}" >
                                        @if ($errors && $errors->has('website'))
                                            <label for="website" class="form-error">{{ $errors->first('website') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        {!! htmlFormSnippet() !!}
                                        @if ($errors && $errors->has('g-recaptcha-response'))
                                            <label for="website" class="form-error">{{ $errors->first('g-recaptcha-response') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="default-btn register" style="margin-top: 10px;" >
                                        {{ Lang::get('application.general.submit') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="widget-sidebar">
                        <div class="sidebar-widget recent-post">
                            <h3 class="widget-title">
                                {{ Lang::get('application.company.registration.sidebar_title') }}
                            </h3>
                            <ul class="company-registration-instructions">
                                <li>
                                <span>
                                    <i class="bx bx-edit"></i>
                                    {!! Lang::get('application.company.registration.sidebar_step_1') !!}
                                </span>
                                </li>
                                <li>

                                <span>
                                    <i class="bx bx-user-check"></i>
                                    {!! Lang::get('application.company.registration.sidebar_step_2') !!}
                                </span>
                                </li>
                                <li>
                                <span>
                                    <i class="bx bx-check-circle"></i>
                                    {!! Lang::get('application.company.registration.sidebar_step_3') !!}
                                </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>
        .form-error {
            margin-top: 5px;
            color: #b21f2d !important;
        }

        .company-registration-instructions {

        }

        .company-registration-instructions li {
            padding-left: 10px !important;

        }

        .company-registration-instructions i {
            font-size: 30px !important;
            margin-right: 10px;

        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #ebebeb;
            border-radius: 0px !important;
            height: 50px;
        }
    </style>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            var self = this;
            var locationUrl = "{{ route('location.states', ['countryId' => 'COUNTRY_ID']) }}";

            $('#business_sector').select2();
            $('#countries').select2();
            $('#states').select2();

            $('#countries').change(function () {
                var val = $(this).val();
                if (val === '') {
                    return;
                }

                $.ajax({
                    type: "get",
                    url: locationUrl.replace('COUNTRY_ID', val),
                    dataType: "json",
                    data: {},
                    success: function(data){
                        $('#states').empty();
                        $.each(data, function(index, element){
                            $('#states').append(new Option(element.name, element.id));
                        });
                    }
                });
            });
        });
    </script>
@endsection
