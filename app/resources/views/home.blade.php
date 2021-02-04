@extends('layouts.main')
@section('content')
{{--<div class="container-xxl my-md-3 bd-layout">--}}
{{--    <div class="row justify-content-md-center">--}}
{{--        <div class="col-md-12" style="margin-top: 50px;">--}}
{{--            <h3>Find your company</h3>--}}
{{--            <input type="text" id="companies" class="form-control" value="" placeholder="Search your company ...">--}}
{{--            <span>No luck findin your company? Yo can add it <a href="{{ route('companies.register') }}">here!</a></span>--}}
{{--        </div>--}}
{{--        <div class="col-md-12" style="margin-top: 50px;">--}}
{{--            <p>--}}
{{--                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,--}}
{{--            </p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection

@section('style')
    <style>
        .all-white {
            background: white;
            border: 1px solid black;
        }
    </style>
@endsection

@section('javascript')
    <script type="text/javascript">
        var self = this;
        var searchUrl = "{{ route('home.search') }}";
        var token = "{{ csrf_token() }}";

        $(document).ready(function () {
            $("#companies").autocomplete({
                source: function(request, response ) {
                    $.ajax({
                        type: "post",
                        url: self.searchUrl,
                        dataType: "json",
                        data: {
                            term: request.term,
                            _token: self.token
                        },
                        success: function(data){
                            $("#ui-id-1").addClass('all-white');
                            $(".ui-helper-hidden-accessible").hide();
                            response(data);
                        }
                    });
                },
                minLength: 2,
                select: function( event, ui ) {

                    console.log(ui);
                }
            });
        });
    </script>
@endsection



