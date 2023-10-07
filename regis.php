<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Celuller Phone | Registrasi</title>

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
  <div class="card" style="background-color:#2c3e50; width:50rem; margin-left:-60%;">
      <h6 class="card-header" style="border-bottom:none; text-align:center; color:#dfe6e9;">Dafar Sebagai Member Baru</h6>
      <div class="card-body mt-2">
      <form action="" method="post">
          <div class="row">
              <div class="col-md-6" style="color:#dfe6e9;">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-6">
                    <input type="hidden" name="id_user">
                    <input type="text" class="form-control" name="nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" name="password">
                    </div>
                </div>
              </div>
              <div class="col-md-6" style="color:#dfe6e9;">
               <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-6">
                    <select name="jk" class="form-control">
                    <option value="l">Laki - Laki</option>
                    <option value="p">Perempuan</option>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">No. Telpon</label>
                    <div class="col-sm-6">
                    <input type="number" class="form-control" name="no_telp">
                    </div>
                </div>
               </div>
            </div>
            <div class="form-group row" style="color:#dfe6e9;">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-4">
                <textarea name="alamat" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>

            <div class="social-auth-links text-center mb-3">
                <button type="submit" name="simpan" class="btn btn-block" style="background-color: #e67e22; color:#ecf0f1; border-radius:9px">
                <i class="fas fa-save mr-2"></i> Simpan
            </button>
                <a href="login.php" class="btn btn-block" style="background-color: #e74c3c; color:#ecf0f1; border-radius:9px">
                <i class="fas fa-address-card mr-2"></i> Sudah Punya Akun ?
                </a>
            </div>
          </div>
        </form>
      </div>
  </div>
<?php

    require 'koneksi/koneksi.php';

    if(isset($_POST['simpan']))
    {
        $id_user = $_POST['id_user'];
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $jk = $_POST['jk'];
        $role = "Pelanggan";
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];

        $query = mysqli_query($koneksi, "INSERT INTO user VALUES('$id_user', '$nama', '$password', '$jk', '$role', '$no_telp', '$alamat')");
        if($query)
        {
            echo "<script>
                    alert('Data Berhasil Dimasukan');
                    window.location='Login.php'
                  </script>";
        } else {
            echo "<script>
            alert('Data Gagal Dimasukan');
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