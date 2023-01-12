<?php
include 'koneksi.php';
$email = $_POST['email'];
$password = md5($_POST['password']);


$cek = mysqli_query($koneksi, "select * from mahasiswa where mahasiswa_email='$email' and mahasiswa_password='$password'");
$d = mysqli_fetch_array($cek);
if(mysqli_num_rows($cek) > 0){	
	session_start();	
	$_SESSION['id'] = $d['mahasiswa_id'];		
	$_SESSION['email'] = $d['mahasiswa_email'];						
	$_SESSION['nama'] = $d['mahasiswa_nama'];						
	$_SESSION['status'] = "mahasiswa";						
	header("location:mahasiswa/");
}else{
	header("location:index.php?pesan=gagal");	
}
