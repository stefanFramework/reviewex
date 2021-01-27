<!doctype html>
<html lang="en">
<head>
    <title>Reviewex</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('backoffice/css/material-dashboard.min.css') }}">

</head>
<body>
@yield('content')
<!--   Core JS Files   -->
<script src="{{ asset('backoffice/js/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backoffice/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backoffice/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backoffice/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/moment.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/sweetalert2.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/jquery.validate.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/bootstrap-selectpicker.js') }}" ></script>
<script src="{{ asset('backoffice/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/jquery.datatables.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/jasny-bootstrap.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/fullcalendar.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/jquery-jvectormap.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/nouislider.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="{{ asset('backoffice/js/plugins/arrive.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/chartist.min.js') }}"></script>
<script src="{{ asset('backoffice/js/plugins/bootstrap-notify.js') }}"></script>
<script src="{{ asset('backoffice/js/material-dashboard.min.js?v=2.1.2" type="text/javascript') }}"></script>
@yield('javascript')
</body>
</html>
