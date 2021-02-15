@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9">
            <div style="margin-bottom: 50px;">
                <h3>Create a Review</h3>
                <span class="small-text">Some text that go in here</span>
            </div>
            @if($errors && $errors->has('registration_error'))
                <span class="form-error">{{ $errors->first('registration_error') }}</span>
            @endif
            <form method="post" action="{{ route('companies.register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                    @if ($errors && $errors->has('name'))
                        <label for="title" class="form-error">{{ $errors->first('title') }}</label>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Text</label>
                    <textarea id="text" name="text" class="form-control" style="resize: none;">
                        {{ old('text') }}
                    </textarea>
                    @if ($errors && $errors->has('text'))
                        <label for="text" class="form-error">{{ $errors->first('text') }}</label>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="features" class="form-label">Features</label>
                    @foreach($features as $feature)
                        <input type="checkbox" name="features[]" class="form-control" value="{{ $feature->id }}"> {{ $feature->name }}
                    @endforeach
{{--                    <select id="countries" name="countries" class="form-control">--}}
{{--                        <option value="">{{ Lang::get('application.company.registration.default_selection') }}</option>--}}
{{--                        @foreach($countries as $country)--}}
{{--                            @if(old('countries') == $country->id)--}}
{{--                                <option value="{{ $country->id }}" selected>{{ $country->name }}</option>--}}
{{--                            @else--}}
{{--                                <option value="{{ $country->id }}">{{ $country->name }}</option>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    @if ($errors && $errors->has('countries'))--}}
{{--                        <label for="countries" class="form-error">{{ $errors->first('countries') }}</label>--}}
{{--                    @endif--}}
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
@endsection



