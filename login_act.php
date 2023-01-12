<?php 
include'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);

$cek = mysqli_query($koneksi, "select * from admin where admin_username='$username' and admin_password='$password'");
$d = mysqli_fetch_array($cek);
if(mysqli_num_rows($cek) > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['id'] = $d['admin_id'];		
	$_SESSION['nama'] = $d['admin_nama'];		
	$_SESSION['status'] = "admin";				
	header("location:admin/");
}else{
	header("location:login.php?alert=gagal");
}
