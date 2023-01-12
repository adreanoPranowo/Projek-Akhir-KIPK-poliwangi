<?php
include '../koneksi.php';
$id = $_POST['id'];
$periode = $_POST['periode'];
$status = $_POST['status'];

mysqli_query($koneksi,"UPDATE periode_mahasiswa SET pm_status='$status' WHERE pm_id='$id'");
header("location:periode_peserta.php?id=$periode");