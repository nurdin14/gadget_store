<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Celuller Phone | Log in</title>

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
      <p class="login-box-msg" style="color:#dfe6e9;">Masukan Username Untuk Mencari Password Anda</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Masukan Username Anda" name="nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user" style="color: #f39c12;"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-block" name="cari" style="background-color: #e74c3c; color:#ecf0f1;">Cari</button>
          </div>
          <!-- /.col -->
          <?php
            require 'koneksi/koneksi.php';
            if(isset($_POST['cari'])) {
              $username = $_POST['nama'];
              $query = mysqli_query($koneksi, "SELECT nama, password FROM user where nama='$username'");
              $cek = mysqli_num_rows($query); 
              if($cek > 0)
              {
                $data = mysqli_fetch_assoc($query);
          ?>

          <table style="color:#dfe6e9; margin-top:17%; margin-left:-31%;">
            <tbody>
              <tr>
                <td>Username</td>
                <td>:</td>
                <td><?= $data['nama'] ?></td>
              </tr>
              <tr>
                <td>Password</td>
                <td>:</td>
                <td><?= $data['password'] ?></td>
              </tr>
            </tbody>
          </table>
          <?php } else { echo "<span style='color:#dfe6e9; margin-top:17%; margin-left:-31%;'>Maaf Data Tidak Ditemukan</span>"; } } ?>
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <a href="login.php" class="btn btn-block" style="background-color: #e67e22; color:#ecf0f1;">
          <i class="fas fa-sign-in-alt mr-2"></i> Login
        </a>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
