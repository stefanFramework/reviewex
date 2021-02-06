@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9">
            <div style="margin-bottom: 50px;">
                <h3>{{ Lang::get('application.company.registration.title') }}</h3>
                <span class="small-text">{{ Lang::get('application.company.registration.subtitle') }}</span>
            </div>
            @if($errors && $errors->has('registration_error'))
                <span class="form-error">{{ $errors->first('registration_error') }}</span>
            @endif
            <form method="post" action="{{ route('companies.register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="mb-3">
                    <label for="name" class="form-label">{{ Lang::get('application.company.registration.name') }}</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                    @if ($errors && $errors->has('name'))
                        <label for="name" class="form-error">{{ $errors->first('name') }}</label>
                    @endif
                </div>
                <div class="mb-3">
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
                <div class="mb-3">
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
                <div class="mb-3">
                    <label for="states" class="form-label">{{ Lang::get('application.company.registration.state') }}</label>
                    <select id="states" name="states" class="form-control">
                        <option value="">{{ Lang::get('application.company.registration.default_selection') }}</option>
                    </select>
                    @if ($errors && $errors->has('states'))
                        <label for="states" class="form-error">{{ $errors->first('states') }}</label>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">{{ Lang::get('application.company.registration.city') }}</label>
                    <input type="text" id="city" name="city" class="form-control" value="{{ old('city') }}" />
                    @if ($errors && $errors->has('city'))
                        <label for="city" class="form-error">{{ $errors->first('city') }}</label>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">{{ Lang::get('application.company.registration.website') }}</label>
                    <input type="text" id="website" name="website" class="form-control" value="{{ old('website') }}" >
                    @if ($errors && $errors->has('website'))
                        <label for="website" class="form-error">{{ $errors->first('website') }}</label>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">{{ Lang::get('application.general.submit') }}</button>
                <a href="{{ route('home') }}" class="btn btn-secondary" style="margin-left: 10px;">{{ Lang::get('application.general.cancel') }}</a>
            </form>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="sidebar-widget">
                <h6 class="mt-40 mb-20">{{ Lang::get('application.company.registration.sidebar_title') }}</h6>
                <div class="widget-categories">
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa fa-angle-double-right"></i>
                            {{ Lang::get('application.company.registration.sidebar_step_1') }}
                            </a>
                        <li>
                            <a href="#">
                                <i class="fa fa-angle-double-right"></i>
                                {{ Lang::get('application.company.registration.sidebar_step_2') }}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-angle-double-right"></i>
                                {{ Lang::get('application.company.registration.sidebar_step_3') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            var self = this;
            var locationUrl = "{{ route('location.states', ['countryId' => 'COUNTRY_ID']) }}";
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



