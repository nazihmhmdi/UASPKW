<?php
//koneksi ke database ("" merupakan password phpmyadmin)
$koneksi = mysqli_connect("localhost", "ucp2pkw_NazihMahmudi", "Nazih12052001", "ucp2pkw_karyawan115");

//cek koneksi ke Database
//Apabila Error
if (mysqli_connect_errno()) {
  echo "Koneksi database gagal : " . mysqli_connect_error();
}