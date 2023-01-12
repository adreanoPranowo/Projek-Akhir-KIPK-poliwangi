<?php
include '../koneksi.php';
$buka = $_POST['buka'];
$tutup = $_POST['tutup'];
$status = $_POST['status'];

$rand = rand();
$allowed =  array('pdf','docx','xlsx ');
$filename = $_FILES['pengumuman']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename==""){	
	mysqli_query($koneksi,"INSERT INTO periode (periode_id,periode_tanggal_buka,periode_tanggal_tutup,periode_status) VALUES(NULL, '$buka','$tutup','$status')");
	header("location:periode.php?alert=tambah");
}else{

	if(!in_array($ext,$allowed) ) {
		header("location:periode.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['pengumuman']['tmp_name'], '../file/'.$rand.'_'.$filename);
		$xx = $rand.'_'.$filename;
		mysqli_query($koneksi,"INSERT INTO periode VALUES(NULL,'$buka','$tutup','$status','$xx')");
		header("location:periode.php?alert=tambah");
	}

}
