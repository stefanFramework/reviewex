@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9">
            <input type="text"
                   id="companies"
                   name="companies"
                   class="form-control"
                   placeholder="{{ Lang::get('application.general.search') }}">
            <span id="search-icon" aria-hidden="true" class="input-loading fa "></span>
            <span class="small-text">
                {!! Lang::get('application.home.search_small_text', ['url' => route('companies.register')]) !!}
            </span>
            <p style="margin-top: 50px; margin-bottom: 50px;">
                {{ Lang::get('application.home.main_content') }}
            </p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="sidebar-widget"></div>
        </div>
    </div>

@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
@endsection

@section('javascript')
    <script type="text/javascript">
        var self = this;
        var searchUrl = "{{ route('home.search') }}";
        var redirectUrl = "{{ route('companies.information', ['code' => 'CODE']) }}";
        var token = "{{ csrf_token() }}";

        $(document).ready(function () {
            $("#companies").autocomplete({
                source: function(request, response) {
                    $('#search-icon').addClass('fa-spinner fa-spinn');
                    $.ajax({
                        type: "post",
                        url: self.searchUrl,
                        dataType: "json",
                        data: {
                            term: request.term,
                            _token: self.token
                        },
                        success: function(data){
                            $('#search-icon').removeClass('fa-spinner fa-spinn');
                            $(".ui-helper-hidden-accessible").hide();
                            response(data);
                        }
                    });
                },
                minLength: 2,
                select: function( event, ui ) {
                    var finalUrl = self.redirectUrl.replace('CODE', ui.item.code);
                    window.location.replace(finalUrl);
                }
            });
        });
    </script>
@endsection



