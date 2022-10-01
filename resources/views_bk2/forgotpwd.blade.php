<!DOCTYPE html>
<html>

<head>
    {{--<meta charset="utf-8">--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot_password</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link href="{{ asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <!--end of global css-->
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/forgot.css') }}">
    <!--end of page level css-->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link href="{{ asset('vendors/iCheck/css/minimal/blue.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/pages/login2.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class=" col-10 col-offset-1 col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4 mx-auto">
                <div class="card ">
                    <div class="card-header bg-default ">
                        <h3 class="text-center">Forgot Password</h3>
                    </div>
                    <!-- <img src="{{ asset('images/josh-new.png') }}" alt="logo" class="img-responsive mar"> -->
                    <!-- <h3 class="text-primary">Forgot Password</h3> -->
                    <div class="card-body">
                        <div id="notific">
                            @include('notifications')
                        </div>
                        <form action="{{ route('forgot-password') }}" class="omb_loginForm" autocomplete="off" method="POST">
                            {!! Form::token() !!}
                            <div class="form-group">
                                <label class="sr-only"></label>
                                <input type="email" class="form-control email" name="email" placeholder="Enter your email to reset your password" value="{!! old('email') !!}">
                                <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                            </div>
                            <div class="form-group">
                                <input class="form-control btn btn-primary btn-block" type="submit" value="Reset Your Password">
                            </div>
                        </form>

                        Back to login page?<a href="{{ route('login') }}"> Click here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--global js starts-->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript">
    </script>
    <script type="text/javascript" src="{{ asset('js/frontend/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/frontend/forgotpwd_custom.js') }}"></script>
    <!--global js end-->
    <script src="{{ asset('js/admin.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js-->
    <script src="{{ asset('js/TweenLite.min.js') }}"></script>
    <script src="{{ asset('vendors/iCheck/js/icheck.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/login2.js') }}" type="text/javascript"></script>
    <!-- end of page level js-->
</body>

</html>