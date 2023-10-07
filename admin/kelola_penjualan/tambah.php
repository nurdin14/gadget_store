<div class="container-fluid">
    <div class="card" style="width: 50rem; margin-left:12%;">
        <h4 class="card-header"><i class="fas fa-clipboard-list" style="color: #f39c12;"></i> <small>Form Tambah</small> </h4>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ID Pesanan</label>
                    <div class="col-sm-10">
                    <input type="hidden" name="id_transaksi">
                    <select name="id_pesanan" class="form-control">
                        <?php 
                            $ambil = mysqli_query($koneksi, "SELECT id_pesanan, nama_barang FROM tb_pesanan");
                            while ($data1=mysqli_fetch_assoc($ambil)) : ?>
                            <option value="<?= $data1['id_pesanan']; ?>"><?= $data1['id_pesanan']; ?> -  <?= $data1['nama_barang']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    </div>
                </div>           
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" name="harga">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" name="jumlah">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-secondary" name="simpan">Simpan</button>
                    <a href="index.php?page=penjualan" class="btn" style="background-color:#e84118; color:white;">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

    if(isset($_POST['simpan']))
    {
        $id_transaksi = $_POST['id_transaksi'];
        $id_pesanan = $_POST['id_pesanan'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];
        $tanggal = date('y-m-d h:i:s');

        $query = mysqli_query($koneksi, "INSERT INTO tb_transaksi VALUES('$id_transaksi', '$id_pesanan', '$harga', '$jumlah', '$tanggal')");
        if($query)
        {
            echo "<script>
                    alert('Data Berhasil Ditambahkan');
                    window.location='index.php?page=penjualan'
                  </script>";
        } else {
            echo "<script>
            alert('Data Gagal Dimasukan');
            window.location='index.php?page=tambah_penjualan'
          </script>";
        }
    } 
?>    