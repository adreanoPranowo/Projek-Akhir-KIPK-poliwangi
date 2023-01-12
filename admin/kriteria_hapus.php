<?php
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM bobot_kriteria WHERE bobot_kriteria='$id'");
mysqli_query($koneksi,"DELETE FROM nilai WHERE nilai_kriteria='$id'");
mysqli_query($koneksi,"DELETE FROM kriteria WHERE kriteria_id='$id'");

header("location:kriteria.php");