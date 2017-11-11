<?php 
  session_start();
  require_once("../autoload/autoload.php");
?>
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login</title>
      <?php require_once __DIR__.('/template/head.php'); ?>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href=""><b>Đăng nhập</b>Admin</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="" method="post">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label class="mgl-20" >
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>
                        </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                    </div>
                </form>

                <!-- /.social-auth-links -->
                <a href="#">I forgot my password</a><br>
                <a href="register.html" class="text-center">Register a new membership</a>
            </div>
          <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
        <?php require_once __DIR__.('/template/link-java-script.php'); ?>
    </body>
</html>
