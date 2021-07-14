<?php
//koneksi database
include './config.php';

//menangkap data yang dikirim dari form
$id =$_POST['id'];
$nama = $_POST['nama'];
$ktp = $_POST['ktp'];
$telpon = $_POST['telpon'];
$tahun_masuk = $_POST['tahun_masuk'];
$year = idate("Y");
$masa_kerja = $year-$tahun_masuk;

// udpate data ke Database
mysqli_query($koneksi, "update karyawan set nama='$nama', ktp='$ktp', telpon='$telpon', tahun_masuk='$tahun_masuk', masa_kerja='$masa_kerja' where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:home.php");