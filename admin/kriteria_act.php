<?php 
include '../koneksi.php';
$inisial = $_POST['inisial'];
$keterangan = $_POST['keterangan'];
$bobot = $_POST['bobot'];
$sifat = $_POST['sifat'];

mysqli_query($koneksi,"INSERT INTO kriteria VALUES(NULL,'$inisial','$keterangan','$bobot','$sifat')");
header("location:kriteria.php?alert=tambah");