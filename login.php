<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Celuller Phone | Lupa Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background-color:#222f3e;">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b style="color: #f39c12;">Celuller</b> <span style="color:#dfe6e9;">Phone</span> </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body" style="background-color:#2c3e50;">
      <p class="login-box-msg" style="color:#dfe6e9;">Masuk Untuk Memulai Sesi Anda</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user" style="color: #f39c12;"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key" style="color: #f39c12;"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <a href="lupa_password.php" style="color:#F79F1F;">Lupa Password ?</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-block" name="login" style="background-color: #e74c3c; color:#ecf0f1;">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p style="color:#dfe6e9;">- Belum Punya Akun ? -</p>
        <a href="regis.php" class="btn btn-block" style="background-color: #e67e22; color:#ecf0f1;">
          <i class="fas fa-user-plus mr-2"></i> Mulai Buat Akun
        </a>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php

    require 'koneksi/koneksi.php';
    session_start();
    error_reporting(0);

    if($_SESSION['role'] == 'Pegawai')
    {
        echo "<script>
                alert('Silahkan logout terlebih dahulu');
                window.location='logout.php'
            </script>";
    } else if($_SESSION['role'] == 'Admin')
    {
        echo "<script>
                alert('Silahkan logout terlebih dahulu');
                window.location='logout.php'
            </script>";
    } else if($_SESSION['role'] == 'Pelanggan')
    {
        echo "<script>
                alert('Silahkan logout terlebih dahulu');
                window.location='logout.php'
            </script>";
    }


    if(isset($_POST['login']))
    {
        $username = $_POST['nama'];
        $password = $_POST['password'];

        if(strlen($password) <= 6)
        {
            $query = mysqli_query($koneksi, "SELECT * FROM user where nama='$username' and password='$password'");
            $cek = mysqli_num_rows($query);

            if($cek > 0) {
                $data = mysqli_fetch_assoc($query);

                if($data['role'] == 'Admin'){
                    $_SESSION['role'] = 'Admin';
                    $_SESSION['nama'] = $username;
                    header('location:admin/index.php?page=home');
                } else if($data['role'] == 'Pegawai'){
                    $_SESSION['role'] = 'Pegawai';
                    $_SESSION['nama'] = $username;
                    header('location:pegawai/index.php?page=home');
                } else if($data['role'] == 'Pelanggan'){
                    $_SESSION['role'] = 'Pelanggan';
                    $_SESSION['nama'] = $username;
                    header('location:pelanggan/index.php?page=home');
                }
            } else {
                echo "<script>
                        alert('Maaf username dan password belum terdaftar, Silahkan melakukan registrasi terlebih dahulu');
                        window.location='regis.php'
                    </script>";
            }
        } else {
            echo "<script>
                        alert('Password Harus 6 Karakter, Silahkan coba lagi');
                        window.location='regis.php'
                    </script>";
        }
    }
?>

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
