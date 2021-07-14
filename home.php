<!DOCTYPE html>
<html lang="en">  
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="style.css" type="text/css">
  <title>Data Karyawan</title>
</head>

<body>
  <?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}
	?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Data Karyawan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" aria-current="page" href="home.php">Tambah Karyawan</a>
          <a class="nav-link" href="logout.php">Logout</a>
        </div> 
      </div>
    </div> 
  </nav>

  <div class="container data-karyawan mt-5">
    <table class="table table-striped table-dark" id="tabelKaryawan">
      <thead>
        <tr>
          <th scope="col">No. </th>
          <th scope="col">Nama</th>
          <th scope="col">No KTP</th>
          <th scope="col">No Telpon</th>
          <th scope="col">Tahun Masuk</th>
          <th scope="col">Masa Kerja</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <tbody>
        <?php
        //Memanggil config.php yang sudah kita buat
        include 'config.php';
        //Membuat variabel untuk nomor mahasiswa yang kaan diincrement
        $no = 1;
        //Melakukan query
        $karyawan = mysqli_query($koneksi, "select * from karyawan");
        //Looping data mahasiswa yang
        while ($data = mysqli_fetch_array($karyawan)) {
        ?>
          <!-- Menampilkan data mahasiswa ke dalam tabel -->
          <tr class="table-secondary">
            <!-- Increment nomor baris $no++ -->
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['ktp']; ?></td>
            <td><?php echo $data['telpon']; ?></td>
            <td><?php echo $data['tahun_masuk']; ?></td>
            <td><?php echo $data['masa_kerja']; ?></td>

            <!-- Kolom ini untuk aksi data mahasiswa -->
            <td>
              <!-- Aksi Edit dan Delete, disini menggunakan btn-sm agar tombolnya kecil -->
              <!-- Link untuk masuk ke halmaan edit-->
              <!-- edit.php?id=</?php echo $data['id']; ?> Mengirimkan id dari data mahasiswa ke halaman edit -->
              <a href="detail.php?id=<?php echo $data['id']; ?>" class="material-icons btn-secondary">find_in_page</a>
              <a href="edit.php?id=<?php echo $data['id']; ?>" class="material-icons btn-secondary">mode_edit</a>
              <!-- Link untuk delete berdasarkan id, akan keluar confirm terlebih dahulu -->
              <a href="delete.php?id=<?php echo $data['id']; ?>" class="material-icons btn-secondary" onclick="return confirm('Confirm to Delete Data?')">delete</a>
            </td>
          </tr>
        <?php
        }
        ?>

        <div class="container data-mahasiswa mt-5">
         <!-- Button trigger modal -->
        <button type="button" class="btn btn-secondary mb-4" data-bs-toggle="modal" data-bs-target="#tambahData">
          Tambah Data
        </button>
        <!-- Modal -->
        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
          <div class="modal-dialog" >
            <div class="modal-content">
            <!-- Membuat form dengan method post untuk memanggil file store.php -->
              <form method="post" action="create.php" name="form">
                <div class="modal-header">
                  <h5 class="modal-title" id="tambahDataLabel">Tambah Data Karyawan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <!-- Input nama -->
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Karyawan" name="nama" required>
                  </div>
                <!-- Input nim -->
                  <div class="mb-3">
                    <label for="ktp" class="form-label">No KTP</label>
                    <input type="text" class="form-control" id="ktp" placeholder="Masukkan No KTP Karyawan" name="ktp" required>
                  </div>
                <!-- Input Alamat -->
                  <div class="mb-3">
                    <label for="telpon" class="form-label">No Telpon</label>
                    <input type="text" class="form-control" id="telpon" placeholder="Masukkan No Telpon Karyawan" name="telpon" required>
                  </div>
                <!-- Input nim -->
                <div class="mb-3">
                    <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                    <input type="text" class="form-control" id="tahun_masuk" placeholder="Masukkan Tahun Masuk Karyawan" name="tahun_masuk" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-light" value="SIMPAN">Tambah</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#tabelKaryawan').DataTable();
    });
  </script>
</body>

</html>