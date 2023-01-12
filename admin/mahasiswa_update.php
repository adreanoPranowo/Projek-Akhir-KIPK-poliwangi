<?php 
session_start();
include '../koneksi.php';
$id = $_POST['id'];
$email = $_POST['email'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kelamin = $_POST['kelamin'];
$kontak = $_POST['kontak'];
$password = md5($_POST['password']);
$pwd = $_POST['password'];



if($_FILES['foto']['name'] == ""){
	if($pwd==""){
		mysqli_query($koneksi,"UPDATE mahasiswa SET mahasiswa_email='$email', mahasiswa_nama='$nama',mahasiswa_alamat='$alamat',mahasiswa_kelamin='$kelamin', mahasiswa_kontak='$kontak' WHERE mahasiswa_id='$id'");
		header("location:mahasiswa.php?alert=update");
	}else{
		mysqli_query($koneksi,"UPDATE mahasiswa SET mahasiswa_email='$email', mahasiswa_nama='$nama',mahasiswa_alamat='$alamat',mahasiswa_kelamin='$kelamin', mahasiswa_kontak='$kontak',mahasiswa_password='$password' WHERE mahasiswa_id='$id'");
		header("location:mahasiswa.php?alert=update");
	}
	
}else{
	$rand = rand();
	$allowed =  array('gif','png','jpg');
	$filename = $_FILES['foto']['name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	if(!in_array($ext,$allowed) ) {
		header("location:mahasiswa.php.php?alert=gagal");
	}else{
		if($pwd==""){
			move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/'.$rand.'_'.$filename);
			$xx = $rand.'_'.$filename;
			mysqli_query($koneksi,"UPDATE mahasiswa SET mahasiswa_email='$email', mahasiswa_nama='$nama',mahasiswa_alamat='$alamat',mahasiswa_kelamin='$kelamin', mahasiswa_kontak='$kontak', mahasiswa_foto='$xx' WHERE mahasiswa_id='$id'");
			header("location:mahasiswa.php?alert=update");
		}else{
			move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/'.$rand.'_'.$filename);
			$xx = $rand.'_'.$filename;
			mysqli_query($koneksi,"UPDATE mahasiswa SET mahasiswa_email='$email', mahasiswa_nama='$nama',mahasiswa_alamat='$alamat',mahasiswa_kelamin='$kelamin', mahasiswa_kontak='$kontak', mahasiswa_foto='$xx',mahasiswa_password='$password' WHERE mahasiswa_id='$id'");
			header("location:mahasiswa.php?alert=update");
		}
		

	}

}

