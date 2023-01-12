<?php 
include '../koneksi.php';
$id = $_POST['id'];
$buka = $_POST['buka'];
$tutup = $_POST['tutup'];
$status = $_POST['status'];

$rand = rand();
$allowed =  array('pdf','docx','xlsx ');
$filename = $_FILES['pengumuman']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename==""){	
	mysqli_query($koneksi,"UPDATE periode SET periode_tanggal_buka='$buka', periode_tanggal_tutup='$tutup',periode_status='$status' WHERE periode_id='$id'");
	header("location:periode.php?alert=edit");
}else{	
	if(!in_array($ext,$allowed) ) {
		header("location:periode.php?alert=gagal");
	}else{
		// hapus file sebelumnya
		$cek = mysqli_query($koneksi,"select * from periode where periode_id='$id'");
		$c = mysqli_fetch_assoc($cek);
		$file_sebelumnya = $c['periode_file'];
		unlink("../file/$file_sebelumnya");

		move_uploaded_file($_FILES['pengumuman']['tmp_name'], '../file/'.$rand.'_'.$filename);
		$xx = $rand.'_'.$filename;
		mysqli_query($koneksi,"UPDATE periode SET periode_tanggal_buka='$buka', periode_tanggal_tutup='$tutup',periode_status='$status',periode_file='$xx' WHERE periode_id='$id'");
		header("location:periode.php?alert=edit");
	}

}
