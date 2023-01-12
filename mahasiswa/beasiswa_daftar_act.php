<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');
session_start();
$mahasiswa = $_SESSION['id'];
$periode = $_POST['periode'];
$kriteria = $_POST['kriteria'];
$nilai = $_POST['nilai'];
$tanggal = date('Y-m-d');
$status = "Daftar";

for($i=0;$i<count($kriteria);$i++){		
	$k = $kriteria[$i];
	$n = $nilai[$i];
	// $f = $filename[$i];
	$rand = rand();
	$allowed =  array('pdf');
	$filename = $_FILES['bukti']['name'][$i];
	$tmp_name = $_FILES['bukti']['tmp_name'][$i];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	move_uploaded_file($tmp_name, '../bukti/'.$rand.'_'.$filename);
	$xx = $rand.'_'.$filename;		
	
	if(!in_array($ext,$allowed) ) {
		header("location:daftar_beasiswa.php?alert=gagal");
	}else{		
		mysqli_query($koneksi,"insert into nilai values(NULL,'$periode','$mahasiswa','$k','$n','$xx')");
	}
}
mysqli_query($koneksi,"INSERT INTO periode_mahasiswa VALUES(NULL,'$periode','$mahasiswa','$tanggal','$status')");
header("location:daftar_beasiswa.php?alert=daftar");