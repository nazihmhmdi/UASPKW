<?php
//koneksi database
include 'config.php';

//Menangkap data id yang di kirim dari url karena delete cuma membutuhkan id
$id = $_GET['id'];

//Menghapus data dari database
mysqli_query($koneksi, "delete from karyawan where id='$id'");

// Mengalihkan halaman kembali ke index.php
header("location:index.php");