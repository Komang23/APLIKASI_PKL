<?php
require 'function.php';

//cek login, terdaftar atau tidak
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // cocokin dengan database cari ada atau tidak itu data
    $cekdatabase = mysqli_query($conn, "SELECT * FROM `login` where email='$email' and password='$password'");
    //hitung jumlah data
    $hitung = mysqli_num_rows($cekdatabase);

    if($hitung>0){
      $ambildaterole = mysqli_fetch_array($cekdatabase);
      $role = $ambildaterole['role'];

      if($role =='admin'){
        //kalau user admin
        $_SESSION['log'] = 'Logged';
        $_SESSION['role'] = 'Admin';
        header('location: index.php');
      }else {
        // kalau dia bukan admin
        //kalau user admin
        $_SESSION['log'] = 'Logged';
        $_SESSION['role'] = 'User';
        header('location: login-user.php');
      }
    }
    
}
;


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
        <input id="inputEmail" name="email" type="text" class="form-control" placeholder="User">
          
        </div>
        <div class="input-group mb-3">
          <input id="inputPassword" name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button name="login" type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery
<script src="plugins/jquery/jquery.min.js"></script>
Bootstrap 4 
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 AdminLTE App 
<script src="dist/js/adminlte.min.js"></script>-->
</body>
</html>
