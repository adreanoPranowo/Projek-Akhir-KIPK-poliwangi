<?php 
include 'koneksi.php';
$email = $_POST['email'];
$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$password = md5($_POST['password']);

$cek = mysqli_query($koneksi,"select * from mahasiswa where mahasiswa_email='$email'");
if(mysqli_num_rows($cek)>0){
	header("location:index.php?alert=gagal");
}else{
	mysqli_query($koneksi,"insert into mahasiswa (mahasiswa_id,mahasiswa_email,mahasiswa_nama,mahasiswa_kontak,mahasiswa_password) values (NULL, '$email','$nama','$kontak','$password')");
	header("location:index.php?alert=daftar");
}