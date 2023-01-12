<?php 
session_start();
include '../koneksi.php';
$id = $_SESSION['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$pwd = $_POST['password'];

if($_FILES['foto']['name'] == ""){
	if($pwd == ""){
		mysqli_query($koneksi,"update admin set admin_nama='$nama', admin_username='$username' where admin_id='$id'");
		header("location:index.php?pesan=x");
	}else{
		mysqli_query($koneksi,"update admin set admin_nama='$nama', admin_username='$username', admin_password='$password' where admin_id='$id'");
		header("location:index.php?pesan=xx");
	}
}else{
	$rand = rand();
	$allowed =  array('gif','png','jpg');
	$filename = $_FILES['foto']['name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	if(!in_array($ext,$allowed) ) {
		header("location:profil_edit.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/'.$rand.'_'.$filename);
		$xx = $rand.'_'.$filename;
		if($pwd == ""){
			move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/'.$rand.'_'.$filename);
			$xx = $rand.'_'.$filename;
			mysqli_query($koneksi,"update admin set admin_nama='$nama', admin_foto='$xx', admin_username='$username' where admin_id='$id'");
			header("location:index.php");
		}else{
			move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/'.$rand.'_'.$filename);
			$xx = $rand.'_'.$filename;
			mysqli_query($koneksi,"update admin set admin_nama='$nama', admin_foto='$xx', admin_username='$username', admin_password='$password' where admin_id='$id'");
			header("location:index.php");
		}

	}

}

