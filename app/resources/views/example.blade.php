<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('backoffice/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('backoffice/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Reviewex
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="{{ asset('backoffice/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
    <link href="{{ asset('backoffice/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="">
<div class="wrapper">
{{--    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('backoffice/img/sidebar-1.jpg') }}">--}}
{{--        <div class="logo">--}}
{{--            <a href="http://www.creative-tim.com" class="simple-text logo-normal">--}}
{{--                Reviewex--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="sidebar-wrapper">--}}
{{--            @include('backoffice.layouts.side_menu')--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="main-panel" style="width: 100% !important;">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:;" style="font-size: 50px;">
                        <i class="material-icons" style="font-size: 50px;">change_history</i>
                        Reviewex
                    </a>
                </div>
{{--                <div class="collapse navbar-collapse justify-content-end">--}}
{{--                    <ul class="navbar-nav">--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <i class="material-icons">person</i>--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">--}}
{{--                                <a class="dropdown-item" href="#">Profile</a>--}}
{{--                                <a class="dropdown-item" href="#">Settings</a>--}}
{{--                                <div class="dropdown-divider"></div>--}}
{{--                                <a class="dropdown-item" href="#">Log out</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Buscar Empresa</h4>
                                <p class="category">
                                    No esta la empresa que buscas?? <a>Agregala aca!</a>
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
{{--                                    <label for="exampleInputEmail1">Email address</label>--}}
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{--                <div class="row">--}}
                {{--                </div>--}}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/arrive.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/chartist.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/bootstrap-notify.js') }}"></script>
<script src="{{ asset('backoffice/js/material-dashboard.js?v=2.1.2') }}" type="text/javascript"></script>
<script src="{{ asset('backoffice/demo/demo.js') }}"></script>
</body>
</html>
