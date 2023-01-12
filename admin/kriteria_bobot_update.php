<?php 
include '../koneksi.php';
$id = $_POST['id'];
$keterangan = $_POST['keterangan'];
$nilai = $_POST['nilai'];

mysqli_query($koneksi,"UPDATE bobot_kriteria set bobot_keterangan='$keterangan', bobot_nilai='$nilai' WHERE bobot_id='$id'");
header("location:kriteria.php?alert=edit");