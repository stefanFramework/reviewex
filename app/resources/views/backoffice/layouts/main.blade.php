<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('backoffice/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('backoffice/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        {{ Lang::get('backoffice.general.name') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="{{ asset('backoffice/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('backoffice/img/sidebar-1.jpg') }}">
        <div class="logo">
            <span class="simple-text logo-normal">
                {{ Lang::get('backoffice.general.name') }}
            </span>
        </div>
        <div class="sidebar-wrapper">
            @include('backoffice.layouts.side_menu')
        </div>
    </div>
    <div class="main-panel">
        @php
            {{
                $currentEnvironment = strtoupper(\Illuminate\Support\Facades\Config::get('app.env'));
                $service = \Illuminate\Support\Facades\App::make(\App\Http\Services\Backoffice\AuthenticationService::class);
                $authUser = $service->getAuthenticatedUser();
                $userName = strtoupper($authUser->userName) ;
            }}
        @endphp

        @include('backoffice.layouts.navbar')
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('backoffice.layouts.footer')
    </div>
</div>

<script src="{{ asset('backoffice/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('backoffice/js/core/popper.min.js') }}"></script>
<script src="{{ asset('backoffice/js/core/bootstrap-material-design.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/moment.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/sweetalert2.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/jquery.validate.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/bootstrap-selectpicker.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/jasny-bootstrap.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/fullcalendar.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/jquery-jvectormap.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/nouislider.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="{{ asset('backoffice/js/plugins/arrive.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/chartist.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/bootstrap-notify.js') }}"></script>
<script src="{{ asset('backoffice/js/material-dashboard.js?v=2.1.2') }}"></script>
@yield('javascript')
</body>
</html>
