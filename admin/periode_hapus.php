<?php
include '../koneksi.php';
$id = $_GET['id'];
$cek = mysqli_query($koneksi,"select * from periode where periode_id='$id'");
$c = mysqli_fetch_assoc($cek);
$berkas = $c['periode_file'];
if($c['periode_file']==""){
	mysqli_query($koneksi,"DELETE FROM periode WHERE periode_id='$id'");
	mysqli_query($koneksi,"DELETE FROM nilai WHERE nilai_periode='$id'");
	mysqli_query($koneksi,"DELETE FROM periode_mahasiswa where pm_periode='$id'");
	header("location:periode.php?alert=hapus");
}else{
	mysqli_query($koneksi,"DELETE FROM periode WHERE periode_id='$id'");
	mysqli_query($koneksi,"DELETE FROM nilai WHERE nilai_periode='$id'");
	mysqli_query($koneksi,"DELETE FROM periode_mahasiswa where pm_periode='$id'");
	unlink("../file/$berkas");
	header("location:periode.php?alert=hapus");
}
