<?php 
include '../koneksi.php';
$kriteria = $_POST['kriteria'];
$keterangan = $_POST['keterangan'];
$nilai = $_POST['nilai'];

mysqli_query($koneksi,"INSERT INTO bobot_kriteria VALUES(NULL,'$kriteria','$keterangan','$nilai')");
header("location:kriteria.php?alert=tambah");