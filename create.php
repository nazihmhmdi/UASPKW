<?php
// Include koneksi Database
include './config.php';

// Menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$ktp = $_POST['ktp'];
$telpon = $_POST['telpon'];
$tahun_masuk = $_POST['tahun_masuk'];
$year = idate("Y");
$masa_kerja = $year-$tahun_masuk;

// Menginput data ke database
mysqli_query($koneksi, "insert into karyawan values(NULL,'$nama','$ktp','$telpon','$tahun_masuk','$masa_kerja')");
// Mengembalikan ke halaman awal
header("location:./home.php");