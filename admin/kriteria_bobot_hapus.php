<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM bobot_kriteria WHERE bobot_id='$id'");
header("location:kriteria.php?alert=hapus");