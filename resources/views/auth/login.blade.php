<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/validation/validate.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/login_validation.js')}}"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container login-cover" id="app">

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content ">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-body ">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <form action="{{ route('login') }}" method="POST" id="admin_login" class="form-validate">
                                {{ csrf_field() }}
                                <div class="text-center">
                                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                                    <h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
                                    <p class="text text-danger" id="e-msg"></p>
                                    <p class="text text-success" id="s-msg"></p>
                                </div>
                                <div class="form-group has-feedback has-feedback-left">
                                    <input type="text" class="form-control" placeholder="Username" name="identity" required="required">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>
                                <div class="form-group has-feedback has-feedback-left">
                                    <input type="password" class="form-control" placeholder="Password" name="password" minlength="6" required="required">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</div>
<!-- Footer -->
<div class="navbar navbar-default navbar-fixed-bottom">
    <ul class="nav navbar-nav no-border visible-xs-block">
        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-up2"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-second">
        <div class="navbar-text">
            &copy;2019. <span>Design And Develop By:</span> <a href="http://brainchildsoft.com" target="__blank">Brain Child Software</a> <small>Your Ultimate Web Solution</small>
        </div>

        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="#" class="text-semibold">Email: laravel.devbose@gmail.com</a></li>
                <li><a href="#" class="text-semibold">Phone No: +880 1571-721910</a></li>

            </ul>
        </div>
    </div>
</div>
<!-- /footer -->
<!-- /page container -->
<script>
    $(document).ready(function(){
        $('#admin_login').submit(function(e) {
            e.preventDefault();
            $('#e-msg').html('');
            $('#s-msg').html('');

            if($('input[name="identity"]').val() != '' && $('input[name="password"]').val() != '' && $('input[name="password"]').val().length >=6){
                $.ajax({
                    url:'{{ route('login') }}',
                    type:'POST',
                    dataType:'json',
                    data:$(this).serialize(),
                    success:function(data){

                        if(data.status == 1){
                            $('#s-msg').html(data.msg);
                            location.href='{{ route('home') }}';
                        }else{
                            $('#e-msg').html(data.msg);
                        }
                    }
                })
            }else {
                $('#e-msg').html('User name Or Email and Password Required');
            }
        });
    });
</script>
</body>
</html>
