<?php
include '../koneksi.php';
$id = $_POST['id'];
$inisial = $_POST['inisial'];
$keterangan = $_POST['keterangan'];
$bobot = $_POST['bobot'];
$sifat = $_POST['sifat'];

mysqli_query($koneksi,"UPDATE kriteria SET kriteria_inisial='$inisial',kriteria_keterangan='$keterangan',kriteria_bobot='$bobot',kriteria_sifat='$sifat' WHERE kriteria_id='$id'");
header("location:kriteria.php?alert=edit");