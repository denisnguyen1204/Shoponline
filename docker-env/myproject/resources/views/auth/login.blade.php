<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V19</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">

					<span class="login100-form-title p-b-33">
						TÀI KHOẢN ĐĂNG NHẬP
					</span>
{{--    @if ( Session::has('success') )--}}
{{--        <div class="alert alert-success alert-dismissible" role="alert">--}}
{{--            <strong>{{ Session::get('success') }}</strong>--}}
{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--                <span class="sr-only">Close</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    @if ( Session::has('error') )--}}
{{--        <div class="alert alert-danger alert-dismissible" role="alert">--}}
{{--            <strong>{{ Session::get('error') }}</strong>--}}
{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--                <span class="sr-only">Close</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger alert-dismissible" role="alert">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--                <span class="sr-only">Close</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}
    <div class="container" style="margin-top: 10%">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p style="color:red">{{$error}}</p>
                            @endforeach
                        @endif
                        <form role="form" action="{{ url('/login') }}" method="POST">
                            {!! csrf_field() !!}
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-12 col-md-10  col-md-offset-1 ">
{{--                                        <div class="form-group">--}}
{{--                                            <div class="input-group">--}}
{{--                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>--}}
{{--                                                <input class="form-control" placeholder="Email" name="email" type="text" value="{{ old('email') }}" autofocus>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="wrap-input100 validate-input" data-validate = "Email bắt buộc có dạng: ex@abc.xyz">
                                            <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                                            <span class="focus-input100-1"></span>
                                            <span class="focus-input100-2"></span>
                                        </div>
{{--                                        <div class="form-group">--}}
{{--                                            <div class="input-group">--}}
{{--                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>--}}
{{--                                                <input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="wrap-input100 rs1 validate-input" data-validate="Password yêu cầu">
                                            <input class="input100" type="password" name="password" placeholder="Password">
                                            <span class="focus-input100-1"></span>
                                            <span class="focus-input100-2"></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-lg btn-primary btn-block" value="Đăng nhập">
                                        </div>
{{--                                        <div class="container-login100-form-btn m-t-20">--}}
{{--                                            <button class="login100-form-btn">--}}
{{--                                                Đăng nhập--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
                                        <div class="login-help">
                                            <a href="{{ url('/register') }}" >Đăng ký</a>
                                            <a href="#" >Quên mật khẩu</a>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body{
            background: #17568C;
        }
        .panel{
            border-radius: 5px;
        }
        .panel-heading {
            padding: 10px 15px;
        }
        .panel-title{
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            color: #17568C;
        }
        .panel-footer {
            padding: 1px 15px;
            color: #A0A0A0;
        }
        .profile-img {
            width: 120px;
            height: 120px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
    </style>
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

        </div>
    </div>
</div>
</body>
</html>
