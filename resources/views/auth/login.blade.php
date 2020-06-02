<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.partials.head')


</head>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#">Strategic Performance Management System <b>(SPMS)</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        @if (count($errors) > 0)
            <div class="alert alert-danger">

                <strong>Whoops!</strong>There are problems in your inputs

                <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form

                role="form"
                method="POST"
                action="{{ url('login') }}">

            <input type="hidden"
                   name="_token"
                   value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="text"
                       class="form-control"
                       name="email"
                      
                       >
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password"
                       class="form-control password"
                       name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me

                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit"
                            class="btn btn-primary btn-block btn-flat submit">
                        Login

                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- /.social-auth-links -->
<!-- 
        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>
 -->
    </div>
    <!-- /.login-box-body -->
</div>

@include('admin.partials.javascripts')

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
        $(".password").keyup(function(event) {
            if (event.keyCode === 13) {
                $(".submit").click();
            }
        });
    });
</script>
</body>



