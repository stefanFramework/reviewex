@extends('backoffice.layout')

@section('content')
    <div class="modal fade show" id="loginModal" tabindex="-1" style="display: block;">
        <div class="modal-dialog modal-login" role="document">
            <div class="modal-content">
                <div class="card card-plain">
                    <div class="modal-header">
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">Log in</h4>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form id="login-form" class="form" method="post" action="{{ $loginRoute }}">
                            @if($errors->any())
                                <p class="description text-center">
                                    {{$errors->first()}}
                                </p>
                            @endif
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="card-body">
                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">email</i></div>
                                        </div>
                                        <input type="text" name="email" class="form-control" placeholder="Email...">
                                    </div>
                                </div>

                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                                        </div>
                                        <input type="password" id="password" name="password" placeholder="Password..." class="form-control">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#password').on('keyup', function (e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    $('#login-form').submit();
                }
            })
        });

    </script>
@endsection
