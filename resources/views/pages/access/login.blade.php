<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | JBL</title>
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<!-- 
| =================================================================================
| LOGIN PAGE - body tag must have .login-page and .bg-white class
| =================================================================================
-->
<body class="hold-transition login-page bg-white">
    <div class="login-box">
        <div class="login-logo">
            <div class="">JBL</div>
        </div>
        <div class="card shadow-none">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Log in to start your session</p>
                <!-- Login form -->
                <form id="loginForm" action="{{url('user-login')}}" method="post">
                @csrf
                    <!-- username -->
                    @include('pages.flashMessage')
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <input type="username" id="username" class="form-control" value="{{ old('username') }}" name="username" placeholder="Type your username here">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <div class="d-flex align-items-center justify-content-between">
                            <label for="password">Password</label>
                            <a class="mb-3" href="#">I forgot my password</a>
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Type your password here">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- User Actions -->
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" id="loginBtn">
                                <span>Log in</span>
                                <i class="fas fa-sign-in-alt ml-1"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="dropdown-divider mt-5 mb-1"></div>
                <!-- Quick Links -->
                <div class="d-flex justify-content-between text-sm">
                    <div>
                        <a href="./home.html">Home</a>
                    </div>
                    <div>
                        <span class="text-secondary">&middot;</span>
                        <a href="#">Terms and Policies</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery Validation -->
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

</body>
</html>