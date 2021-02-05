@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-9">
            <input type="text"
                   id="companies"
                   name="companies"
                   class="form-control"
                   placeholder="Search your company ...">
            <span id="search-icon" aria-hidden="true" class="input-loading fa "></span>
            <p style="margin-top: 25px;">
                asdfasdfasdfsdf
            </p>
        </div>
        <div class="col-lg-3">
            <div class="sidebar-widget"></div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .input-loading {
            position: absolute;
            top: 15px;
            right: 30px;
            text-align: center;
            pointer-events: none;
            font-size: 20px !important;
        }
    </style>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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



